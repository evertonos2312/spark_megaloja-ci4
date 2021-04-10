<?php namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\CategoriaModel;
use App\Models\ProdutoModel;

class Promocao extends BaseController
{
    public function index()
    {
        $produtoModel = new ProdutoModel();
        $bannersModel = new BannerModel();
        $categoriasModel = new CategoriaModel();

        $produtosEmPromocao = $produtoModel->produtosEmPromocao();
        $dados = [
            'categorias' => $categoriasModel->findAll(),
            'banners' => $bannersModel->findAll(),
            'produtos_chunk' => count($produtosEmPromocao) > 0 ? array_chunk($produtosEmPromocao, 3) : []
        ];

        echo view('promocoes/index', $dados);
    }
}