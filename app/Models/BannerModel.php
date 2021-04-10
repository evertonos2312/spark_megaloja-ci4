<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table = 'banners';
    protected $primaryKey = 'tipo';

    protected $allowedFields = [
        'tipo',
        'banner',
        'link'
    ];

    protected $validationRules = [
        'banner' => [
            'label' => 'Banner',
            'rules' => 'required'
        ],
        'link' => [
            'label' => 'Link',
            'rules' => 'required'
        ]
    ];

    public function getByTipo($tipo)
    {
        return $this->where('tipo', $tipo)->first();
    }
}
