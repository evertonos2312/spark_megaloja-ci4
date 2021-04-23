<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutosModel extends Model
{
    protected $table = 'products';
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

    /**
     * Retorna os produtos em promoção
     *
     * @return array
     */
    public function produtosEmPromocao() : array
    {
        return $this->where('promocao', true)->findAll();
    }
    
    /**
     * Retorna todos os registros do banco de dados.
     *
     * @return array
     */
    public function get()
    {
        return $this->select("id, foto, nome_produto, valor, desconto")->findAll();
    }
    
    /**
     * Retorna todos os destaques do banco de dados.
     *
     * @return array
     */
    public function getDestaque()
    {
        return $this->select("id, foto, nome_produto, valor, desconto")->
        where(['destaque' => 1])->findAll();
    }
    /**
     * Retorna todos as promoções do banco de dados.
     *
     * @return array
     */
    public function getPromocao()
    {
        return $this->select("id, foto, nome_produto, valor, desconto")->
        where(['promocao' => 1])->findAll();
    }

    /**
     * Retorna um registro pelo seu ID
     *
     * @param [type] $id
     * @return array
     */
    public function getById($id){
        return $this->where('id', $id)->first();
    }

    public function getByIdCategoria($id_categoria)
    {
        return $this->where([
            'categorias_id' => $id_categoria,
            'ativo' => true
        ])->orderBy('nome_produto')->findAll();
    }
}