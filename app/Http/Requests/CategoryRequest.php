<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories,name,'.$this->id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'É obrigatório informar o NOME da Categoria',
            'name.unique' => 'O NOME informado já está cadastrado',
        ];
    }
}
