<?php

namespace App\Controllers\Admin;

class Home extends \App\Controllers\BaseController
{
    public function __construct()
    {

    }

    public function index()
    {
        $this->display_adm('admin/home/index');
    }
}