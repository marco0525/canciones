<?php

namespace App\Models;

use CodeIgniter\Model;

class CancionModel extends Model
{
    protected $table = 'cancion';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id', 'titulo','grupo','anio','idGenero'];
}