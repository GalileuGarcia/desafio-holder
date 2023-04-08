<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransacaoRequest;
use App\Models\Transacao;
use DateTime;

class RecebimentoDados extends Controller
{
    private $transacao;

    public function __construct(Transacao $transacao)
    {
        $this->transacao  = $transacao;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(StoreTransacaoRequest $request)
    {
        //

    }

    public function update(StoreTransacaoRequest $request, $id)
    {
        // VERIFICA SE O REGISTRO EXISTE
        $transacao  = $this->transacao->find($id);
        $data = $request->all();
        
        if ($transacao != null) {
            // CALCULA A DIFERENÇA ENTRE AS DATAS
            $diff = $this->diferencaDatas($data['data_inicio'],$data['data_fim']);

            $dados = [
                'data_inicio' => $data['data_inicio'],
                'data_fim'    => $data['data_fim'],
                'valor_compra' => $data['valor_compra'],
                'valor_venda' => $data['valor_venda'],
                'descricao'   => $data['descricao'],
                'duracao' => $diff,
                'resultado' => $data['valor_venda'] - $data['valor_compra']
            ];
            // ATUALIZA O REGISTRO NO BD
            $transacao->update($dados);
            
            return array('status' => 1, 'mensagem' => 'Operacao realizada com sucessso', 'dados' => $transacao);
        } else {
            return array('status' => 0, 'mensagem' => 'Registro nao encontrado');
        }
    }

    private function diferencaDatas($dataInicial, $dataFinal)
    {
        $data1 = new DateTime($dataInicial);
        $data2 = new DateTime($dataFinal);

        return $data1->diff($data2)->format("%d").' dias';
    }
}
