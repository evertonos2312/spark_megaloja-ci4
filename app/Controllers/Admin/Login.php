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
        if($this->session->get('auth_user')){
            return redirect()->to(base_url().'/admin/home/index');
        }

        $userPost = $this->request->getPost();
        if(!empty($userPost)){
            $usuario = [
                'username' => $userPost['username'],
                'password' => $userPost['password'],
            ];
            $userExists = $this->userModel->SearchLogin($usuario);
            if($userExists){
                $this->session->set('auth_user', ['id' => $userExists['id'], 'name' => $userExists['name'], 'email' => $userExists['email']]); 
                return redirect()->to(base_url().'/admin/home/index');

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