<?php

namespace App\Controllers\Admin;

use App\Models\UsuarioModel;

class Usuarios extends \App\Controllers\BaseController
{
    private $usuarioModel;
    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        $users = $this->usuarioModel->get(); 
        if(!empty($users)){
            foreach($users as $key => $produto){
				if($users[$key]['active'] == 1){
                    $users[$key]['active'] = "Ativo";
                    $users[$key]['status'] = "success";
                }else{
                    $users[$key]['active'] = "Inativo";
                    $users[$key]['status'] = "danger";
                }
			}
            $data = [
                'usuarios' => $users,
            ];
        }
        // echo '<pre>';
        // print_r($users);
        // echo '</pre>';
        // die();
        $this->display_adm('admin/usuarios/index', $data);
    }
}