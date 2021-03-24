<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nome_produto',
        'descricao_produto',
        'valor',
        'desconto',
        'categorias_id',
        'foto',
        'link_pagamento',
        'destaque',
        'promocao',
        'ativo'
    ];

    protected $validationRules = [
        'nome_produto' => [
            'label' => 'Nome Produto',
            'rules' => 'required'
        ],
        'descricao_produto' => [
            'label' => 'Descrição do Produto',
            'rules' => 'required'
        ],
        'valor' => [
            'label' => 'Valor',
            'rules' => 'required'
        ],
        'desconto' => [
            'label' => 'Desconto',
            'rules' => 'required|numeric'
        ],
        'categorias_id' => [
            'label' => 'Categoria',
            'rules' => 'required'
        ]
    ];

    /*
    Retorna todos os registros do banco de dados
    @return array
    */

    public function get()
    {
        return $this->select("id, foto, nome_produto, valor, desconto")->findAll();
    }
}