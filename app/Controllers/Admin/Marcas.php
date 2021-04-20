<?php

namespace App\Controllers\Admin;
use App\Models\MarcasModel;

class Marcas extends \App\Controllers\BaseController
{
    private $marcasModel;
    public function __construct()
    {
        $this->marcasModel = new MarcasModel();
    }

    public function index()
    {
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }
        $marcas = $this->marcasModel->getAll();
        if(!empty($marcas)){
            foreach($marcas as $key => $marca){
                $marcas[$key]['created_on'] = date('d/m/Y',$marcas[$key]['created_on']);
				if($marcas[$key]['active'] == 1){
                    $marcas[$key]['active'] = "Ativo";
                    $marcas[$key]['status'] = "success";
                }else{
                    $marcas[$key]['active'] = "Inativo";
                    $marcas[$key]['status'] = "danger";
                }
			}
        }
        $data = [
            'marcas' => $marcas,
            'title' => 'Marcas cadastradas',
        ];

        $this->display_adm('admin/marcas/index', $data);

    }

    public function core($marca_id = NULL){
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }

        if(!$marca_id){
            $data = [
                'title' => 'Criar Marca',
            ];
            $marca = [
                'id' => '',
                'name' => '',
                'meta_link' => '',
            ];

            $this->display_adm('admin/marcas/core', $data, $marca);

        }else{
            $marca = $this->marcasModel->getId($marca_id);
            if(!$marca){
                $this->session->setFlashdata('msg', 'Ops, não encontrei essa marca.');
                return redirect()->to('/admin/marcas');
            }else{
                $data = [
                    'title' => 'Editar Marca',

                ];

                $this->display_adm('admin/marcas/core', $data, $marca);
            }

        }
    }

    public function save($marca_id = NULL){
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }
        $marcaPost = $this->request->getPost();
        if(!$marca_id){
            if(!empty($marcaPost)){
                $marca = [
                    'name' => $marcaPost['name'],
                    'meta_link' => $marcaPost['meta_link'],
                    'active' =>$marcaPost['status'],
                    'deleted' => '0',
                ];
                $saved = $this->marcasModel->saveMarca($marca);
                if($saved){
                    $this->session->setFlashdata('msg', 'Marca criada com sucesso');
                    $this->session->setFlashdata('msg_type', 'success');
                    return redirect()->to(base_url().'/admin/marcas/index');
                }else{
                    $this->session->setFlashdata('msg', 'Ops, não consegui criar essa marca.');
                    $this->session->setFlashdata('msg_type', 'danger');
                    return redirect()->to(base_url().'/admin/marcas/index');
                }
                
            }
        }
        if(!empty($marcaPost)){
            $marca = [
                'id' => $marca_id,
                'name' => $marcaPost['name'],
                'meta_link' => $marcaPost['meta_link'],
                'active' =>$marcaPost['status'],
                'deleted' => '0',
            ];
        
            $saved = $this->marcasModel->saveMarca($marca);
            if($saved){
                $this->session->setFlashdata('msg', 'Marca atualizada com sucesso');
                $this->session->setFlashdata('msg_type', 'success');
                return redirect()->to(base_url().'/admin/marcas/index');

            }else{
                $this->session->setFlashdata('msg', 'Ops, não consegui atualizar essa marca.');
                $this->session->setFlashdata('msg_type', 'danger');
                return redirect()->to(base_url().'/admin/marcas/index');
            }
        }
    }

    public function delete()
    { 
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }
        
        $marcaPost = $this->request->getPost('mrc_id');
        if(!empty($marcaPost)){
            $marca = $this->marcasModel->getId($marcaPost);

            $marca['deleted'] = '1';

            $saved = $this->marcasModel->saveMarca($marca);
            if($saved){
                
                $data = [
                    'status' => 'success',
                    'detail' => [
                            'id' => $marcaPost,
                        ],
                ];
                return $this->response->setJSON($data);
            }else{
                return $this->response->setJSON('falha');
            }
        }
        return $this->response->setJSON('falha');

    }
}