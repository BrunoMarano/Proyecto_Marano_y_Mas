<?php
namespace App\Models;
use CodeIgniter\Model;

class contacto_Model extends Model{
    protected $table      = 'contactos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre', 'email', 'telefono', 'mensaje', 'fecha','respondido'];
    protected $useTimestamps = true;
    protected $createdField  = 'fecha';
    protected $updatedField  = '';
}