<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class BankRequest extends FormRequest
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
            'code' => 'required|unique:banks,code,'.$this->id,
            'name' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'É obrigatório informar o CÓDIGO do Banco',
            'code.unique' => 'O CÓDIGO informado já está cadastrado',
            'name.required' => 'É obrigatório informar o NOME do Banco',
        ];
    }

}
