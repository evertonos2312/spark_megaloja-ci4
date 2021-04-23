<?php

namespace App\Controllers\Admin;
use App\Models\CategoriasModel;

class Categorias extends \App\Controllers\BaseController
{
    private $categoriasModel;
    public function __construct()
    {
        $this->categoriasModel = new CategoriasModel();
    }

    public function index()
    {
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }

        $categorias = $this->categoriasModel->getAll();
        if(!empty($categorias)){
            foreach($categorias as $key => $categoria){
                $categorias[$key]['created_on'] = date('d/m/Y',$categorias[$key]['created_on']);
				if($categorias[$key]['active'] == 1){
                    $categorias[$key]['active'] = "Ativo";
                    $categorias[$key]['status'] = "success";
                }else{
                    $categorias[$key]['active'] = "Inativo";
                    $categorias[$key]['status'] = "danger";
                }
			}
        }
        $data = [
            'categorias' => $categorias,
            'title' => 'Categorias cadastradas',
        ];
        // 

        $this->display_adm('admin/categorias/index', $data);
    }

    public function core($categoria_id = NULL){
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }

        if(!$categoria_id){
            $data = [
                'title' => 'Criar Categoria',
            ];
            $categoria = [
                'id' => '',
                'name' => '',
                'meta_link' => '',
            ];

            $this->display_adm('admin/categorias/core', $data, $categoria);

        }else{
            $categoria = $this->categoriasModel->getId($categoria_id);
            if(!$categoria){
                $this->session->setFlashdata('msg', 'Ops, não encontrei essa categoria.');
                return redirect()->to('/admin/categorias');
            }else{
                $data = [
                    'title' => 'Editar Categoria',

                ];

                $this->display_adm('admin/categorias/core', $data, $categoria);
            }

        }
    }

    public function save($categoria_id = NULL){
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }
        $categoriaPost = $this->request->getPost();
        if(!$categoria_id){
            if(!empty($categoriaPost)){
                $categoria = [
                    'name' => $categoriaPost['name'],
                    'meta_link' => $categoriaPost['meta_link'],
                    'active' =>$categoriaPost['status'],
                    'deleted' => '0',
                ];
                $saved = $this->categoriasModel->saveCategoria($categoria);
                if($saved){
                    $this->session->setFlashdata('msg', 'Categoria criada com sucesso');
                    $this->session->setFlashdata('msg_type', 'success');
                    return redirect()->to(base_url().'/admin/categorias/index');
                }else{
                    $this->session->setFlashdata('msg', 'Ops, não consegui criar essa categoria.');
                    $this->session->setFlashdata('msg_type', 'danger');
                    return redirect()->to(base_url().'/admin/categorias/index');
                }
                
            }
        }
        if(!empty($categoriaPost)){
            $categoria = [
                'id' => $categoria_id,
                'name' => $categoriaPost['name'],
                'meta_link' => $categoriaPost['meta_link'],
                'active' =>$categoriaPost['status'],
                'deleted' => '0',
            ];
        
            $saved = $this->categoriasModel->saveCategoria($categoria);
            if($saved){
                $this->session->setFlashdata('msg', 'Categoria atualizada com sucesso');
                $this->session->setFlashdata('msg_type', 'success');
                return redirect()->to(base_url().'/admin/categorias/index');

            }else{
                $this->session->setFlashdata('msg', 'Ops, não consegui atualizar essa categoria.');
                $this->session->setFlashdata('msg_type', 'danger');
                return redirect()->to(base_url().'/admin/categorias/index');
            }
        }
    }

    public function delete()
    { 
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }
        
        $categoriaPost = $this->request->getPost('ctg_id');
        if(!empty($categoriaPost)){
            $categoria = $this->categoriasModel->getId($categoriaPost);

            $categoria['deleted'] = '1';

            $saved = $this->categoriasModel->saveCategoria($categoria);
            if($saved){
                
                $data = [
                    'status' => 'success',
                    'detail' => [
                            'id' => $categoriaPost,
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