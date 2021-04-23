<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriasModel extends Model
{
    protected $table = 'categorias';
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
        'descricao' => [
            'label'=> 'Descrição',
            'rules' => 'required',
        ]
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

    public function saveCategoria($categoria){

        if(array_key_exists('id', $categoria) == false){
            $data = [
                'id' => create_guid(),
                'name' => $categoria['name'],
                'meta_link' => $categoria['meta_link'],
                'active' =>  $categoria['active'],
                'created_on' => time(),
                'deleted' => 0,
            ];
            $save = $this->db->table($this->table)->insert($data);
            if($save){
                return $data; 
            }
        }else{

            $data = [
                'id' => $categoria['id'],
                'name' => $categoria['name'],
                'meta_link' => $categoria['meta_link'],
                'active' =>  $categoria['active'],
                'deleted' => $categoria['deleted'],
                'data_alteracao' => time(),
            ];

            
            $save = $this->save($data);
            if($save){
                return $save; 
            }
        }
    }
}