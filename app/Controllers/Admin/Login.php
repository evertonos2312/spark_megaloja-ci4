<?php

namespace App\Controllers\Admin;
use App\Models\UserModel;

class Login extends \App\Controllers\BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        if($this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/home/index');
        }

        $userPost = $this->request->getPost();
        if(!empty($userPost)){
            $remember = ($this->request->getPost('remember') ? 1 : 0 );
            $usuario = [
                'username' => $userPost['username'],
                'password' => $userPost['password'],
            ];

            $userExists = $this->userModel->SearchLogin($usuario);
            if($userExists){
                if($userExists['is_admin'] != 1){
                    $this->session->setFlashdata('msg', 'Usuário e/ou senha inválidos.');
                    $this->session->setFlashdata('msg_type', 'danger');
                    return redirect()->to(base_url().'/admin/login/index');
                }
                $this->session->set('adm_user', ['id' => $userExists['id'], 'name' => $userExists['name'], 'email' => $userExists['email']]); 
                return redirect()->to(base_url().'/admin/home/index');

            }else{
                $this->session->setFlashdata('msg', 'Usuário e/ou senha inválido.');
                $this->session->setFlashdata('msg_type', 'danger');
                return redirect()->to(base_url().'/admin/login/index');
            }

        }
        
        $data = [
            'title' => 'Área de Admin',

        ];

        $this->display_adm('admin/login/index', $data);
    }

    

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url().'/admin/login/index');
    }

}