<?php

namespace App\Http\Controllers;

use App\Filters\TagFilter;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Http\Resources\TagCollection;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$tags = Tag::where('status','ACTIVO')->orderBy('id','desc')->paginate(2);
        /* $tags = Tag::with('posts')->get();
        return response()->json([
            'message' => 'Listado de tags',
            'data' => $tags,
        ]); */
        $filter = new TagFilter();
        $queryItems = $filter->transform($request);
        $tags = Tag::where($queryItems);
        if ($tags->count() === 0) {
            return response()->json([
                'message' => 'No se encontraron resultados en la busqueda.'
            ], 404);
        }
        $includePosts = $request->query('includePosts');
        if ($includePosts) {
            $tags = $tags->with('posts');
        }
        
        //return new TagCollection($tags->paginate()->appends($request->query())); //paginado
        return new TagCollection($tags->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagStoreRequest $tag)
    {
        // Crear el nuevo recurso utilizando los datos de la solicitud
        $tag = Tag::create($tag->all());
        $tag->status = $tag->status ?? 'ACTIVO';
        // Construir la respuesta con el mensaje personalizado y los datos del nuevo registro
        return response()->json([
            'message' => 'Tag creado correctamente',
            'data' => new TagResource($tag)
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$tag = Tag::where('id', $id)->where('status', 'ACTIVO')->first();
        $tag = Tag::find($id);
        if ($tag) {
            return response()->json([
                'message' => 'Tag encontrado',
                'data' => new TagResource($tag)
            ]);
        } else {
            return response()->json([
                'message' => 'El tag no existe o se encuentra en un estado INACTIVO',
            ], 412);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->update($request->all());
        return response()->json([
            'message' => 'Tag actualizado correctamente',
            'data' => new TagResource($tag)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //eliminar el Tag
        $tag->delete();
        return response()->json([
            'message' => 'Tag eliminado correctamente'
        ]);
    }
}
