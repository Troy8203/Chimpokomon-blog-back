<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TagUpdateRequest extends FormRequest
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

        if ($method === 'PUT') {
            return [
                'name' => 'required|string|unique:tags,name,' . $this->tag->id,
                'status' => 'required|string|in:ACTIVO,INACTIVO'
            ];
        } else {
            return [
                'name' => 'sometimes|required|string|unique:tags,name,' . $this->tag->id,
                'status' => 'sometimes|required|string|in:ACTIVO,INACTIVO'
            ];
        }
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre debe ser un texto',
            'name.unique' => "El nombre ':input' ya ha sido registrado",
        ];
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
