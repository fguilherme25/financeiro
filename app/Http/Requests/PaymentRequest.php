<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'creditcard_id' => 'required',
            'expense_id' => 'required',
            'date' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'invoiceMonth' => 'required',
            'invoiceYear' => 'required',
            'last' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'creditcard_id.required' => 'É obrigatório informar o CARTÃO DE CRÉDITO.',
            'expense_id.required' => 'É obrigatório informar a DESPESA.',
            'date.required' => 'É obrigatório informar a DATA da Despesa.',
            'description.required' => 'É obrigatório informar a DESCRIÇÃO da Despesa.',
            'amount.required' => 'É obrigatório informar o VALOR da Despesa.',
            'invoiceMonth.required' => 'É obrigatório informar o MÊS da Fatura.',
            'invoiceYear.required' => 'É obrigatório informar o ANO da Fatura.',
            'last.required' => 'É obrigatório informar a ÚLTIMA Parcela.',
            'last.numeric' => 'A ÚLTIMA Parcela precisa ser um número.',
        ];
    }
}
