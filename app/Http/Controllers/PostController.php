<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostCollection;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Filters\PostFilter;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PostFilter();
        $queryItems = $filter->transform($request);
        $posts = Post::where($queryItems);
        if ($posts->count() === 0) {
            return response()->json([
                'message' => 'No se encontraron resultados en la busqueda.'
            ], 404);
        }
        $includeCategories = $request->query('includeCategory');
        $includeTags = $request->query('includeTags');
        $includeUser = $request->query('includeUser');
        $paginate = $request->query('paginate');
        if ($includeCategories) {
            $posts = $posts->with('category');
        }
        if ($includeTags) {
            $posts = $posts->with('tags');
        }
        if ($includeUser) {
            $posts = $posts->with('user');
        }
        if($paginate){
            return new PostCollection($posts->paginate()->appends($request->query()));
        }else{
            return new PostCollection($posts->get());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $post)
    {
        try {
            //Iniciar una transaccion para guardar tags
            DB::beginTransaction();
            $nuevoPost = Post::create([
                'title' => $post->title,
                'content' => $post->content,
                'description' => $post->description,
                'slug' => Str::slug($post->title),
                'user_id' => $post->user_id,
                'category_id' => $post->category_id,
                'status' => $post->status ?? 'ACTIVO'
            ]);
            $nuevoPost->save();
            //Sincronizando los tags del post
            $nuevoPost->tags()->sync($post->tags);
            DB::commit();
            return response()->json([
                'message' => 'Post creado correctamente',
                'data' => new PostResource($nuevoPost)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear el post',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            $response = [
                'message' => 'No se encontraron resultados en la búsqueda.'
            ];
            return new JsonResponse($response, 404);
        }

        $includeCategory = request()->query('includeCategory');
        $includeTags = request()->query('includeTags');
        if ($includeCategory) {
            $post->load('category');
        }
        if ($includeTags) {
            $post->load('tags');
        }
        return new PostResource($post);
    }

    
    public function update(PostUpdateRequest $request, Post $post)
{
    try {
        // Iniciando trnasaccion
        DB::beginTransaction();

        $post->update($request->except('tags'));

        // Actualizar el slug si se modificó el título
        if ($request->has('title')) {
            $post->slug = Str::slug($post->title);
            $post->save();
        }

        // Actualizar los tags
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        DB::commit();
        $post->load('tags', 'category', 'user');
        return response()->json([
            'message' => 'Post actualizado correctamente',
            'data' => new PostResource($post)
        ]);
    } catch (\Exception $e) {

        DB::rollBack();
        return response()->json([
            'message' => 'Error al actualizar el post',
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function destroy(Post $post)
    {   
        //eliminar el Post
        $post->delete();
        return response()->json([
            'message' => 'Post eliminado correctamente',
        ]);
    }
}
