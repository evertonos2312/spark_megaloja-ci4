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

		if($produtosEmPromocao){
			foreach($produtosEmPromocao as $key => $produto){
				$valorProduto = $produtosEmPromocao[$key]['valor'];
				$desconto = $produtosEmPromocao[$key]['desconto'];
				$produtosEmPromocao[$key]['valor_final'] = $valorProduto - ($valorProduto * $desconto / 100);
				$produtosEmPromocao[$key]['parcelas'] = $valorProduto / 10;
			}
		}
        $dados = [
            'categorias' => $categoriasModel->findAll(),
            'banners' => $bannersModel->findAll(),
            'produtos_chunk' => $produtosEmPromocao,
            'titulo' => '::Promoções'
        ];

        $this->display('promocoes/index', $dados);
    }
}