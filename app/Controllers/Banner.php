<?php namespace App\Controllers;

use App\Models\BannerModel;

class Banner extends BaseController
{
    public function getFoto($tipo = null)
    {
        $bannerModel = new BannerModel();
        $dadosBanner = $bannerModel->getByTipo($tipo);

        if(!is_null($dadosBanner)){
            $foto = $dadosBanner['banner'];
            if(!is_null($foto)){
                $filename = WRITEPATH . 'uploads/' . $foto;
                if(!file_exists($filename)){
                    return redirect()->to('/mensagem/erro')->with('mensagem', 'Banner não encontrado.');
                } else{
                    $imgInfo = getimagesize($filename);
                    $this->response->setHeader('Content-Type', $imgInfo['mime']);
                    echo file_get_contents($filename);
                }
            }else{
                return redirect()->to('/mensagem/erro')->with('mensagem', 'ERRO - Banner sem imagem cadastrada.');
            }
        }else{
           return redirect()->to('/mensagem/erro')->with('mensagem', 'Banner não encontrado');
        }
    }
}