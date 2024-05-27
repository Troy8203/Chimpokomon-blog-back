<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
                'title' => 'required|string',
                'content' => 'required|string',
                'slug' => 'required|string|unique:posts,slug,'.$this->post->id,
                'user_id' => 'required|numeric',
                'category_id' => 'required|numeric',
            ];
        }else{
            //Metodo patch solo editamos lo requerido 
            return [
                'title' => 'sometimes|required|string',
                'content' => 'sometimes|required|string',
                'slug' => 'sometimes|required|string|unique:posts,slug',
                'user_id' => 'sometimes|required|numeric',
                'category_id' => 'sometimes|required|numeric',
            ];
        }
    }
}
