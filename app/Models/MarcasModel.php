<?php

namespace App\Models;

use CodeIgniter\Model;

class MarcasModel extends Model
{

    protected $table = 'marcas';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'meta_link',
        'active',
        'created_on',
        'data_alteracao',
        'deleted',
    
    ];

    protected $validationRules = [
        'name' => [
            'label' => 'Nome',
            'rules' => 'required'
        ],
        'active' => [
            'label' => 'Status',
            'rules' => 'required'
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

    public function saveMarca($marca){

        if(array_key_exists('id', $marca) == false){
            $data = [
                'id' => create_guid(),
                'name' => $marca['name'],
                'meta_link' => $marca['meta_link'],
                'active' =>  $marca['active'],
                'created_on' => time(),
                'deleted' => 0,
            ];
            $save = $this->db->table($this->table)->insert($data);
            if($save){
                return $data; 
            }
        }else{

            $data = [
                'id' => $marca['id'],
                'name' => $marca['name'],
                'meta_link' => $marca['meta_link'],
                'active' =>  $marca['active'],
                'deleted' => $marca['deleted'],
                'data_alteracao' => time(),
            ];

            
            $save = $this->save($data);
            if($save){
                return $save; 
            }
        }
    }

}