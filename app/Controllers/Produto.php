<?php namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\CategoriaModel;
use App\Models\ProdutoModel;

class Produto extends BaseController
{
    private $produtoModel;
    private $bannersModel;
    private $categoriasModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
        $this->bannersModel = new BannerModel();
        $this->categoriasModel = new CategoriaModel();
    }

    public function index()
    {
        
        $produtos = $this->produtoModel->get();
		if($produtos){
			foreach($produtos as $key => $produto){
				$valorProduto = $produtos[$key]['valor'];
				$desconto = $produtos[$key]['desconto'];
				$produtos[$key]['valor_final'] = $valorProduto - ($valorProduto * $desconto / 100);
				$produtos[$key]['parcelas'] = $valorProduto / 10;
			}
		}
        
        
        $dados = [
            'categorias' => $this->categoriasModel->findAll(),
            'banners' => $this->bannersModel->findAll(),
            'produtos_chunk' => $produtos,
            'titulo' => ':: Produtos'
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
				$produtosPorCategoria[$key]['valor_final'] = $valorProduto - ($valorProduto * $desconto / 100);
				$produtosPorCategoria[$key]['parcelas'] = $valorProduto / 10;
			}
		}
        $dados = [
            'categorias' => $this->categoriasModel->findAll(),
            'banners' => $this->bannersModel->findAll(),
            'produtos_chunk' => $produtosPorCategoria,
            'titulo' => !is_null($descricaoCategoria) ? ':: Produtos da Categoria ' . $descricaoCategoria : ':: Produtos'
        ];

        $this->display('produtos/index', $dados);
    }

    public function mostraProduto($id_produto)
    {
        $dados = [
            'categorias' => $this->categoriasModel->findAll(),
            'banners' => $this->bannersModel->findAll(),
        ];

        // echo '<pre>';
        // print_r($dados['categorias']);
        // echo '</pre>';
        // die();

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
}