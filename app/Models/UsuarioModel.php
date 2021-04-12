<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'username',
        'password',
        'email',
        'active',
        'phone',
        'created_on'
    ];

    protected $beforeInsert = ['hashPassword'];

    protected $validationRules = [
        'name' => [
            'label' => 'Nome',
            'rules' => 'required'
        ],
        'username' => [
            'label' => 'Usuário',
            'rules' => 'required'
        ],
        'email' => [
            'label' => 'E-mail',
            'rules' => 'required|valid_email'
        ],
        'endereco' => [
            'label' => 'Endereço',
            'rules' => 'required'
        ],
        'password' => [
            'label' => 'Senha',
            'rules' => 'required'
        ],
        'repita_senha' => [
            'label' => 'Repita a Senha',
            'rules' => 'required|matches[password]'
        ],

    ];

    /**
     * Retorna todos os registros do banco de dados.
     *
     * @return array
     */
    public function get()
    {
        return $this->findAll();
    }
}