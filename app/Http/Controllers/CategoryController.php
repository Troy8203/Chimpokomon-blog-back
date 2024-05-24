<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //GET
        return new CategoryCollection(Category::where( 'status', 'ACTIVO')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //POST
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:categories,name',
            //el nomnbre debe ser unico
            'description' => 'string|max:250',
        ]);
        //Errores de validacion
        if ($validator->fails()) {
            //retornamos un error
            return response()->json([
                'message' => 'Existen errores de validacion',
                'errors' => $validator->errors(),
                'status' => 422
            ], 422);
        }
        //Creando la Categoria
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->descripction
        ]);
        //Si ocurrio un error la crear la Categoria
        if (!$category) {
            $data = [
                'message' => 'error al crear la Categoria',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        //Categoria creado con éxito

        if ($category) {
            return response()->json([
                "message" => "Categoria registrado!",
                "status" => 200
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //GET CON ID  /category/{id}
        $category = Category::find($id);
        if ($category) {
            return response()->json([
                'message' => 'Categoria encontrada..!',
                'status' => 200,
                'data' => [
                    'name' => $category->name,
                    'description' => $category->description,
                    'estado' => $category->status
                ]
            ], 200);
        } else {
            return response()->json([
                'message' => 'Categoria no encontrado',
                'status' => 404
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //patch
        if ($request->isMethod('put')) {
            return response()->json([
                'message' => 'El método PUT no está permitido en esta ruta, INTENTA CON PATCH :)',
                'status' => 405
            ], 405);
        }
        $category = Category::find($id);
        if ($category) {
            $validator = Validator::make($request->all(), [
                'name' => 'string|max:100|unique:categories,name,' . $id . ',id',
                'description' => 'string|max:250',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Existen errores de validación',
                    'errors' => $validator->errors(),
                    'status' => 422,
                ], 422);
            }
            //Actualizando la categoriaa
            try{
            $respuesta = $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }catch (QueryException $e) {
            // Capturar y manejar la excepción de la base de datos
            return response()->json([
                'message' => 'Ocurrió un error al actualizar: ' . $e->getMessage(),
                'status' => 500
            ], 500);
        }

            if ($respuesta) {
                return response()->json([
                    'message' => 'Categoria actualizado con éxito.!',
                    'status' => 200
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Ocurrió un error al actualizar los datos. :(',
                    'status' => 422
                ], 422);
            }
        } else {
            return response()->json([
                "message" => 'No se ha encontrado el registro',
                "status" => 404
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //DELETE
        //Cambiando el estado a inactivo
        try {
            // Buscar la categoria
            $categoria = Category::findOrFail($id);

            // Actualizar el estado a "INACTIVO"
            $categoria->status = 'INACTIVE';
            $categoria->save();
            return response()->json([
                'message' => 'Categoria inactivado con éxito',
                'status' => 200
            ], 200);
        } catch (QueryException $e) {
            // Capturar y manejar la excepción de la base de datos
            return response()->json([
                'message' => 'Ocurrió un error al actualizar el estado: ' . $e->getMessage(),
                'status' => 500
            ], 500);
        } catch (ModelNotFoundException $e) {
            // Manejar el caso donde no se encuentra el registro
            return response()->json([
                'message' => 'Categoria no encontrado en la BD',
                'status' => 404
            ], 404);
        }
    }
}
