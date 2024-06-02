<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostStoreRequest extends FormRequest
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
        return [
            'title' => 'required|string|unique:posts,title',
            'content' => 'required|string',
            'description'=> 'required|string',
            'user_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'tags' => 'required|array',
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
