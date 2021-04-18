<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;

class Usuarios extends \App\Controllers\BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->getAll();
        if(!empty($users)){
            foreach($users as $key => $produto){
                $users[$key]['created_on'] = date('d/m/Y',$users[$key]['created_on']);
				if($users[$key]['active'] == 1){
                    $users[$key]['active'] = "Ativo";
                    $users[$key]['status'] = "success";
                }else{
                    $users[$key]['active'] = "Inativo";
                    $users[$key]['status'] = "danger";
                }
			}
        }
        $data = [
            'usuarios' => $users,
            'title' => 'Usuários',
        ];
        $this->display_adm('admin/usuarios/index', $data);
    }

    public function core($user_id = NULL){

        if(!$user_id){
            $data = [
                'title' => 'Criar Usuário',
            ];
            $user = [
                'id' => '',
                'name' => '',
                'username' => '',
                'email' => '',
                'password' => '',
                'senha' => 'sim',
            ];

            $this->display_adm('admin/usuarios/core', $data, $user);

        }else{
            $user = $this->userModel->getId($user_id);
            if(!$user){
                $this->session->setFlashdata('msg', 'Ops, não encontrei esse usuário');
                return redirect()->to('/admin/usuarios');
            }else{
                $data = [
                    'title' => 'Editar Usuário',

                ];
                $user['senha'] = 'nao';

                $this->display_adm('admin/usuarios/core', $data, $user);
            }

        }
    }

    public function save($user_id = NULL){
        $userPost = $this->request->getPost();
        if(!$user_id){
            if(!empty($userPost)){
                $user = [
                    'name' => $userPost['name'],
                    'username' => $userPost['username'],
                    'email' => $userPost['email'],
                    'password' => $userPost['password'],
                    'confirm_password' => $userPost['password'],
                    'active' =>$userPost['status'],
                    'is_admin' =>$userPost['is_admin']
                ];
                if($userPost['password'] === $userPost['password'] ){
                    $saved = $this->userModel->saveUser($user);
                    if($saved){
                        $this->session->setFlashdata('msg', 'Usuário criado com sucesso');
                        $this->session->setFlashdata('msg_type', 'success');
                        return redirect()->to(base_url().'/admin/usuarios/index');
                    }else{
                        $this->session->setFlashdata('msg', 'Ops, não consegui criar esse usuário.');
                        $this->session->setFlashdata('msg_type', 'danger');
                        return redirect()->to(base_url().'/admin/usuarios/index');
                    }
                }
            }
        }
        if(!empty($userPost)){
            $user = [
                'id' => $user_id,
                'name' => $userPost['name'],
                'username' => $userPost['username'],
                'email' => $userPost['email'],
                'active' =>$userPost['status'],
                'is_admin' =>$userPost['is_admin']
            ];
            $saved = $this->userModel->saveUser($user);
            if($saved){
                $this->session->setFlashdata('msg', 'Usuário atualizado com sucesso');
                $this->session->setFlashdata('msg_type', 'success');
                return redirect()->to(base_url().'/admin/usuarios/index');

            }else{
                $this->session->setFlashdata('msg', 'Ops, não consegui atualizar esse usuário.');
                $this->session->setFlashdata('msg_type', 'danger');
                return redirect()->to(base_url().'/admin/usuarios/index');
            }
        }
    }

    public function delete($user_id)
    {
        $ajax = new \App\Libraries\Sys\AjaxLib();
		$ajax->CheckIncoming();
		$ajax->CheckRequired(['id', 'deleted']);
		$bodyAjax = $ajax->GetData();

		
		$user['id'] = $bodyAjax['id'];
		$user['deleted'] = $bodyAjax['deleted'];
        $this->userModel->saveUser($user);
		$return = [];

		$ajax->setSuccess($bodyAjax);
    }
}