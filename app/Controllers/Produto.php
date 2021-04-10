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
        $dados = [
            'categorias' => $this->categoriasModel->findAll(),
            'banners' => $this->bannersModel->findAll(),
            'produtos_chunk' => count($this->produtoModel->get()) > 0 ? array_chunk($this->produtoModel->get(), 3) : [],
            'titulo' => ':: Produtos'
        ];

        echo view('produtos/index', $dados);
    }

    public function porCategoria($id_categoria)
    {
        $produtosPorCategoria = $this->produtoModel->getByIdCategoria($id_categoria);
        $descricaoCategoria = $this->categoriasModel->find($id_categoria)['descricao'];
        $dados = [
            'categorias' => $this->categoriasModel->findAll(),
            'banners' => $this->bannersModel->findAll(),
            'produtos_chunk' => count($produtosPorCategoria) > 0 ? array_chunk($produtosPorCategoria, 3) : [],
            'titulo' => !is_null($descricaoCategoria) ? ':: Produtos da Categoria ' . $descricaoCategoria : ':: Produtos'
        ];

        echo view('produtos/index', $dados);
    }

    public function mostraProduto($id_produto)
    {
        $dados = [
            'categorias' => $this->categoriasModel->findAll(),
            'banners' => $this->bannersModel->findAll(),
            'produto' => $this->produtoModel->find($id_produto),
        ];

        echo view('produtos/produto', $dados);
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