<?php

namespace App\Controllers\Admin;

class Home extends \App\Controllers\BaseController
{
    public function __construct()
    {

    }

    public function index()
    {
        if(!$this->session->get('adm_user')){
            return redirect()->to(base_url().'/admin/login/index');
        }
        $this->display_adm('admin/home/index');
    }
}