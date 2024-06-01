<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Info(
 *             title="BLOG - El diario de Chimpokomon", 
 *             version="1.0",
 *             description="Documentación del Proyecto ChimpoBlog"
 * )
 *
 * @OA\Server(url="http://localhost:8000")
 */
class CategoryController extends Controller
{
    /**
     * Listado de todos los registros de Categorias
     * @OA\Get (
     *     path="/api/categories",
     *     tags={"Categorias"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="data",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="Tecnología"
     *                     ),
     *                     @OA\Property(
     *                         property="description",
     *                         type="string",
     *                         example="Todo sobre lo último en tecnología y gadgets."
     *                     ),
     *                     @OA\Property(
     *                         property="status",
     *                         type="string",
     *                         example="ACTIVE"
     *                     ),
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        //GET
        return new CategoryCollection(Category::where( 'status', 'ACTIVO')->get());
    }

    /**
     * Registrar la información de una Categoria
     * @OA\Post (
     *     path="/api/categories",
     *     tags={"Categorias"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="description",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"TENOLOGIA",
     *                     "description":"Todo sobre lo último en tecnología y gadgets."
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Categoria registrado!"),
     *              @OA\Property(property="status", type="string", example="200")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Errores de validación",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Existen errores de validación"),
     *              @OA\Property(property="errors", type="object", example={"name": {"El campo nombre es requerido"}, "description": {"El campo description debe ser menor que 250 caracteres."}}),
     *              @OA\Property(property="status", type="string", example="422"),
     *          )
     *      ),
     *      @OA\Response(
     *         response=500,
     *        description="Error al crear la Categoria",
     *       @OA\JsonContent(
     *         @OA\Property(property="message", type="string", example="error al crear la Categoria"),
     *       @OA\Property(property="status", type="string", example="500")
     *    )
     * )
     * )
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
     * Mostrar la información de una Categoria
     * @OA\Get (
     *     path="/api/categories/{id}",
     *     tags={"Categorias"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="Tecnología"),
     *              @OA\Property(property="description", type="string", example="Todo sobre lo último en tecnología y gadgets."),
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Categoria no encontrado"),
     *          )
     *      )
     * )
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
     * Actualizar la información de una Categoria
     * 
     * @OA\Put (
     *     path="/api/categories/{id}",
     *     tags={"Categorias"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     type="object",
     *                     @OA\Property(
     *                         property="name",
     *                         type="string"
     *                     ),
     *                     @OA\Property(
     *                         property="description",
     *                         type="string"
     *                     )
     *                 ),
     *                 example={
     *                     "name": "Tecnología Editado",
     *                     "description": "Todo sobre lo último en tecnología y gadgets. Editado"
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Categoria actualizado con éxito"),
     *             @OA\Property(property="status", type="string", example="200")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="NOT FOUND",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="No se ha encontrado el registro"),
     *             @OA\Property(property="status", type="string", example="404")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Errores de validación",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Existen errores de validación"),
     *             @OA\Property(property="errors", type="object", example={"name": {"El campo nombre es requerido"}, "description": {"El campo description debe ser menor que 250 caracteres."}}),
     *             @OA\Property(property="status", type="string", example="422")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error al actualizar la Categoria",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Ocurrió un error al actualizar los datos."),
     *             @OA\Property(property="status", type="string", example="500")
     *         )
     *     )
     * )
     */

    public function update(Request $request, string $id)
    {
        //patch
        if ($request->isMethod('patch')) {
            return response()->json([
                'message' => 'El método PATCH no está permitido en esta ruta, INTENTA CON PUT :)',
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
            try {
                $respuesta = $category->update([
                    'name' => $request->name,
                    'description' => $request->description,
                ]);
            } catch (QueryException $e) {
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
     * Inactivar una Categoría
     * 
     * @OA\Delete (
     *     path="/api/categories/{id}",
     *     tags={"Categorias"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Categoria inactivado con éxito"),
     *             @OA\Property(property="status", type="string", example="200")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="NOT FOUND",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Categoria no encontrado en la BD"),
     *             @OA\Property(property="status", type="string", example="404")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error al inactivar la Categoria",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Ocurrió un error al inactivar la Categoria"),
     *             @OA\Property(property="status", type="string", example="500")
     *         )
     *     )
     * )
     */

    public function destroy(string $id)
    {
        //DELETE
        //Cambiando el estado a inactivo
        try {
            // Buscar la categoria
            $categoria = Category::findOrFail($id);

            // Actualizar el estado a "INACTIVO"
            $categoria->status = 'INACTIVO';
            $categoria->save();
            return response()->json([
                'message' => 'Categoria inactivado con éxito',
            ], 200);
        } catch (QueryException $e) {
            // Capturar y manejar la excepción de la base de datos
            return response()->json([
                'message' => 'Ocurrió un error al actualizar el estado: ' . $e->getMessage(),
            ], 500);
        } catch (ModelNotFoundException $e) {
            // Manejar el caso donde no se encuentra el registro
            return response()->json([
                'message' => 'Categoria no encontrado en la BD'
            ], 404);
        }
    }
}
