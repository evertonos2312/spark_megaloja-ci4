<?php namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\CategoriasModel;
use App\Models\ProdutosModel;

class Produto extends BaseController
{
    private $produtoModel;
    private $bannersModel;
    private $categoriasModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutosModel();
        $this->bannersModel = new BannerModel();
        $this->categoriasModel = new CategoriasModel();
    }

    public function index()
    {
        
        $produtos = $this->produtoModel->get();
		if($produtos){
			foreach($produtos as $key => $produto){
				$valorProduto = $produtos[$key]['valor'];
				$desconto = $produtos[$key]['desconto'];
				$produtos[$key]['valor_final'] = formata_valor($valorProduto - ($valorProduto * $desconto / 100));
				$produtos[$key]['parcelas'] = formata_valor($valorProduto / 10);
			}
		}
        
        
        $dados = [
            'categorias' => $this->categoriasModel->findAll(),
            'banners' => $this->bannersModel->findAll(),
            'produtos_chunk' => $produtos,
            'titulo' => ':: Todos produtos',
            'descricao_categoria' => 'Todos'
        ];

        $this->display('produtos/index', $dados);
	
    }

    public function porCategoria($id_categoria)
    {
        $produtosPorCategoria = $this->produtoModel->getByIdCategoria($id_categoria);
        $descricaoCategoria = $this->categoriasModel->find($id_categoria)['descricao'];

        if($produtosPorCategoria){
			foreach($produtosPorCategoria as $key => $produto){

				$valorProduto = $produtosPorCategoria[$key]['valor'];
				$desconto = $produtosPorCategoria[$key]['desconto'];
				$produtosPorCategoria[$key]['valor_final'] = formata_valor($valorProduto - ($valorProduto * $desconto / 100));
				$produtosPorCategoria[$key]['parcelas'] = formata_valor($valorProduto / 10);

			}
		}
        $dados = [
            'categorias' => $this->categoriasModel->findAll(),
            'banners' => $this->bannersModel->findAll(),
            'produtos_chunk' => $produtosPorCategoria,
            'titulo' => !is_null($descricaoCategoria) ? $descricaoCategoria : ':: Produtos',
            'id_categoria' => $id_categoria,
            'descricao_categoria' => $descricaoCategoria,
        ];


        $this->display('produtos/index', $dados);
    }

    public function detalhes($id_produto)
    {
        $dados = [
            'categorias' => $this->categoriasModel->findAll(),
            'banners' => $this->bannersModel->findAll(),
        ];

        $produto = $this->produtoModel->find($id_produto);

        $this->display('produtos/detalhes', $dados, $produto);
    }

    //retorna uma foto do sistema
    public function getFoto($id_produto = null)
    {
        $dadosProduto = $this->produtoModel->getById($id_produto);
        if(!is_null($dadosProduto)){
            $foto = $dadosProduto['foto'];
            if(!is_null($foto)){
                $filename = WRITEPATH . 'uploads/' . $foto;
                if(!file_exists($filename)){
                    return redirect()->to('/mensagem/erro')->with('mensagem', 'Imagem não encontrada.');
                } else{
                    $imgInfo = getimagesize($filename);
                    $this->response->setHeader('Content-Type', $imgInfo['mime']);
                    echo file_get_contents($filename);
                }
            }else{
                return redirect()->to('/mensagem/erro')->with('mensagem', 'Produto sem foto cadastrada.');
            }
        }else{
           return redirect()->to('/mensagem/erro')->with('mensagem', 'Produto não encontrado');
        }
    }

    public function getPromocao()
    {
        $produtos = $this->produtoModel->getPromocao();
		if($produtos){
			foreach($produtos as $key => $produto){
				$valorProduto = $produtos[$key]['valor'];
				$desconto = $produtos[$key]['desconto'];
				$produtos[$key]['valor_final'] = formata_valor($valorProduto - ($valorProduto * $desconto / 100));
				$produtos[$key]['parcelas'] = formata_valor($valorProduto / 10);
			}
		}
		$data = [
			'banners' => $this->bannersModel->findAll(),
			'categorias' => $this->categoriasModel->findAll(),
			'produtos_chunk' => $produtos,
            'titulo' => 'Produtos em Promoção'
		];


		$this->display('produtos/index', $data);
    }
}