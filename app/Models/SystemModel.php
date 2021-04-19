<?php

namespace App\Models;

use CodeIgniter\Model;

class SystemModel extends Model
{

    protected $table = 'system';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'razao_social',
        'nome_fantasia',
        'password',
        'cnpj',
        'ie',
        'telefone_fixo',
        'site_url',
        'cep',
        'endereco',
        'numero',
        'cidade',
        'estado',
        'endereco',
        'produtos_destaques',
        'texto',
        'data_alteracao',
    ];

     /**
     * Retorna todos os registros do banco de dados.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->first();
    }

    public function saveSystem($system)
    {
        $data = [
            'id' => $system['id'],
            'razao_social' => $system['razao_social'],
            'nome_fantasia' => $system['nome_fantasia'],
            'cnpj' => $system['cnpj'],
            'ie' =>$system['ie'],
            'telefone_fixo' =>$system['telefone_fixo'],
            'email' => $system['email'],
            'site_url' => $system['site_url'],
            'cep' => $system['cep'],
            'endereco' => $system['endereco'],
            'numero' => $system['numero'],
            'cidade' => $system['cidade'],
            'estado' => $system['estado'],
            'produtos_destaques' => $system['produtos_destaques'],
            'texto' => $system['texto'],
            'data_alteracao' => time(),
        ];
        
        $save = $this->save($data);
        if($save){
            return $save; 
        }
    }

}