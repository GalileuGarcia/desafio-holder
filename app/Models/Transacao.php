<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;
    protected $table    = 'transacoes';
    protected $primaryKey = 'id_transacao';
    public $timestamps  = false;
    protected $fillable = ['data_inicio', 'data_fim', 'valor_compra', 'valor_venda', 'descricao', 'duracao', 'resultado'];
}
