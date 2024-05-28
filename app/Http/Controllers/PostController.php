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

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* $posts = Post::where('content', 'LIKE', '%omnis%')->get();

        return new PostCollection($posts); */
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
        if ($includeCategories) {
            $posts = $posts->with('category');
        }
        if ($includeTags) {
            $posts = $posts->with('tags');
        }
        return new PostCollection($posts->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        //validar
        /* return response()->json([
            'message' => 'Existen errores de validacion',
            'status' => 422
        ], 422);
 */
        $datos = $request->validated();
        return new PostResource(Post::create($datos));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        $includeCategory = request()->query('includeCategory');
        $includeTags = request()->query('includeTags');
        if ($includeCategory) {
            return new PostResource($post->loadMissing('category'));
        }
        if (!$post) {
            $response = [
                'message' => 'No se encontraron resultados en la búsqueda.'
            ];
            return new JsonResponse($response, 404);
        }
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
