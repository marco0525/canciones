<?php

namespace App\Models;

use CodeIgniter\Model;

class GeneroModel extends Model
{
    protected $table = 'genero';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id', 'nombre'];
}