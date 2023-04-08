<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // SE DEIXAR COMO FALSE, TODA A REQUISIÇÃO VAI SER BARRADA
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data_inicio'  => 'required|date_format:Y-m-d',
            'data_fim'     => 'required|date_format:Y-m-d',
            'valor_compra' => 'required|regex:/^[\d,.?!]+$/',
            'valor_venda'  => 'required|regex:/^[\d,.?!]+$/',
            'descricao'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'data_inicio.required'  => 'O campo nome e um parametro obrigatorio',
            'data_inicio.date_format'  => 'A data deve ser no formato americano Y-m-d',
            'data_fim.required'  => 'O campo nome e um parametro obrigatorio',
            'data_fim.date_format'  => 'A data deve ser no formato americano Y-m-d',
            'valor_compra.required'  => 'O campo valor_compra e um parametro obrigatorio',
            'valor_compra.regex'  => 'O campo valor_compra nao esta no formato correto',
            'valor_venda.required'  => 'O campo valor_venda e um parametro obrigatorio',
            'valor_venda.regex'  => 'O campo valor_venda nao esta no formato correto',
            'descricao.required'  => 'O campo descricao e um parametro obrigatorio',
        ];
    }
}
