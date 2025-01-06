<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditcardRequest extends FormRequest
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
            'flag' => 'required',
            'name' => 'required',
            'category' => 'required',
            'duedate' => 'required|numeric',
            'limit' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'flag.required' => 'É obrigatório informar a BANDEIRA do Cartão',
            'name.required' => 'É obrigatório informar o NOME do Cartão',
            'category.required' => 'É obrigatório informar a CATEGORIA do Cartão',
            'duedate.required' => 'É obrigatório informar o DIA DO VENCIMENTO do Cartão',
            'duedate.numeric' => 'O VENCIMENTO do Cartão precisa ser um valor numérico',
            'limit.required' => 'É obrigatório informar o LIMITE do Cartão',
        ];
    }
}
