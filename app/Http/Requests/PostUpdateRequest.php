<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if($method === 'PUT'){
            return [
                'title' => 'required|string|unique:posts,slug,'.$this->post->id,
                'content' => 'required|string',
                'user_id' => 'required|numeric',
                'category_id' => 'required|numeric',
                'tags' => 'required|array',
            ];
        }else{
            //Metodo patch solo editamos lo requerido 
            return [
                'title' => 'sometimes|required|string',
                'content' => 'sometimes|required|string',
                'user_id' => 'sometimes|required|numeric',
                'category_id' => 'sometimes|required|numeric',
                'tags' => 'sometimes|required|array',
                'status' => 'sometimes|string|in:ACTIVO,INACTIVO'
            ];
        }
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Existen errores de validación',
                'errors' => $validator->errors(),
                'status' => 422
            ], 422)
        );
    }
}
