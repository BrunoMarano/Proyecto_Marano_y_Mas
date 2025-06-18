<?php
namespace App\Models;
use CodeIgniter\Model;

class producto_model extends Model{
    protected $tablet ='categoria';
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = ['descripcion', 'activo'];
}