<?php

namespace App\Controllers\Admin;
use App\Models\SystemModel;

class System extends \App\Controllers\BaseController
{
    private $systemModel;
    public function __construct()
    {
        $this->systemModel = new SystemModel();
    }

    public function index($system_id = NULL)
    {
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }

        $systemPost = $this->request->getPost();
        if(!empty($systemPost)){
            $system_update = [
                'id' => $system_id,
                'razao_social' => $systemPost['razao_social'],
                'nome_fantasia' => $systemPost['nome_fantasia'],
                'cnpj' => $systemPost['cnpj'],
                'ie' =>$systemPost['ie'],
                'telefone_fixo' =>$systemPost['telefone_fixo'],
                'email' => $systemPost['email'],
                'site_url' => $systemPost['site_url'],
                'cep' => $systemPost['cep'],
                'endereco' => $systemPost['endereco'],
                'numero' => $systemPost['numero'],
                'cidade' => $systemPost['cidade'],
                'estado' => $systemPost['estado'],
                'produtos_destaques' => $systemPost['produtos_destaques'],
                'texto' => $systemPost['texto'],
            ];

            $saved = $this->systemModel->saveSystem($system_update);
            if($saved){
                $this->session->setFlashdata('msg', 'Loja atualizada com sucesso');
                $this->session->setFlashdata('msg_type', 'success');
                return redirect()->to(base_url().'/admin/system/index');

            }else{
                $this->session->setFlashdata('msg', 'Ops, não consegui atualizar a loja neste momento.');
                $this->session->setFlashdata('msg_type', 'danger');
                return redirect()->to(base_url().'/admin/system/index');
            }


        }
        
        $system = $this->systemModel->getAll();

        $data = [
            'title' => 'Informações da Loja',
        ];
        $this->display_adm('admin/system/index', $data, $system);


    }

}