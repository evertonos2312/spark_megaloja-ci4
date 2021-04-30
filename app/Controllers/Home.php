<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\CategoriasModel;
use App\Models\ProdutosModel;

class Home extends BaseController
{
	public function index()
	{
		
		$dadosCategorias = new CategoriasModel();
		$dadosProdutos = new ProdutosModel();

		
		$produtos = $dadosProdutos->getDestaque();
		if($produtos){
			foreach($produtos as $key => $produto){
				$valorProduto = $produtos[$key]['valor'];
				$desconto = $produtos[$key]['desconto'];
				$produtos[$key]['valor_final'] = formata_valor($valorProduto - ($valorProduto * $desconto / 100));
				$produtos[$key]['parcelas'] = formata_valor($valorProduto / 10);
			}
		}
		$data = [
			'title' => 'Home',
			'categorias' => $dadosCategorias->findAll(),
			'produtos_chunk' => $produtos
		];


		$this->display('home/index', $data);
	}
}
