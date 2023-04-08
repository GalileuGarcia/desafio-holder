<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransacaoRequest;
use App\Models\Transacao;

class TransacaoController extends Controller
{
    private $transacao;

    public function __construct(Transacao $transacao)
    {
        $this->transacao  = $transacao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransacaoRequest $request)
    {
        
        $dados = Transacao::create($request->all());

        return array('status' => 1, 'mensagem' => 'Operacao realizada com sucessso','dados' => $dados);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transacao  $transacao
     * @return \Illuminate\Http\Response
     */
    public function show(Transacao $transacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transacao  $transacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Transacao $transacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTransacaoRequest $request, $id)
    {
        $transacao = $this->transacao->find($id);
        if ($transacao != null) {
            $transacao->update($request->all());
            return array('status' => 1, 'mensagem' => 'Operacao realizada com sucessso', 'dados' => $transacao);
        } else {
            return array('status' => 0, 'mensagem' => 'Registro nao encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        
        $transacao = $this->transacao->find($id);
        if ($transacao != null) {
            $transacao->delete();
            return array('status' => 1, 'mensagem' => 'Operacao realizada com sucessso');
        } else {
            return array('status' => 0, 'mensagem' => 'Registro nao encontrado');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recebimento(StoreTransacaoRequest $request) {
        dd('AQUI');
    }
}
