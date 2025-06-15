<?php
namespace App\Models;
use CodeIgniter\Model;

class producto_Model extends Model {
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = [
        'nombre_prod', 'imagen', 'categoria_id', 'costo', 'precio', 'stock', 'stock_min', 'eliminado'
    ];
}
