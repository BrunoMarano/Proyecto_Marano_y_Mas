<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model{
    protected $tablet ='Usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'mail', 'pass', 'perfil_id', 'baja'];
}