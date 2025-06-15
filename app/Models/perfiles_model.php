<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model{
    protected $tablet ='Usuarios';
    protected $primaryKey = 'perfil_id';
    protected $allowedFields = ['descripcion', 'activo'];
}