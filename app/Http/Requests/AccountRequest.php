<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'type' => 'required',
            'scope' => 'required',
            'bank_id' => 'required',
            'agency' => 'required|numeric',
            'number' => 'required|numeric',
            'digit' => 'required|numeric',
            'limit' => 'required|numeric',
            'balance' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'É obrigatório informar o TIPO da Conta',
            'type.required' => 'É obrigatório informar o ESCOPO da Conta',
            'bank_id.required' => 'É obrigatório informar o NOME do Banco',
            'agency.required' => 'É obrigatório informar o número da AGÊNCA da Conta',
            'agency.numeric' => 'O número da AGÊNCA da Conta precisa ser um valor numérico',
            'number.required' => 'É obrigatório informar o NÚMERO da Conta',
            'number.numeric' => 'O NÚMERO da Conta precisa ser um valor numérico',
            'digit.required' => 'É obrigatório informar o DÍGITO da Conta',
            'digit.numeric' => 'O DÍGITO da Conta precisa ser um valor numérico',
            'limit.required' => 'É obrigatório informar o LIMITE da Conta',
            'limit.numeric' => 'O LIMITE da Conta precisa ser um valor numérico',
            'balance.required' => 'É obrigatório informar o SALDO da Conta',
            'balance.numeric' => 'O SALDO da Conta precisa ser um valor numérico',
        ];
    }
}
