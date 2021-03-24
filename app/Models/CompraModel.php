<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraModel extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'usuarios_id',
        'produtos_id'
    ];

}
