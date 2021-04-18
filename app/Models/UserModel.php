<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
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
    public function getAll()
    {
        return $this->where('deleted', 0)->findAll();
    }

    public function getId($id)
    {
        return $this->where('id', $id)->first();
    }

    public function saveUser($user){

        if(array_key_exists('id', $user) == false){
            $data = [
                'id' => create_guid(),
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => md5($user['password']),
                'active' =>  $user['active'],
                'is_admin' => $user['is_admin'],
                'created_on' => time(),
            ];
            $save = $this->db->table($this->table)->insert($data);
            if($save){
                return $data; 
            }
        }else{
            $data = [
                'id' => $user['id'],
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'active' =>  $user['active'],
                'is_admin' => $user['is_admin'],
            ];
            
            $save = $this->save($data);
            if($save){
                return $save; 
            }
        }
    }
}