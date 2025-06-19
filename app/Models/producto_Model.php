<?php
namespace App\Models;
use CodeIgniter\Model;

class producto_Model extends Model {
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'imagen', 'categoria_id', 'costo', 'precio', 'stock', 'stock_min', 'eliminado'];
    
    public function getProductoAll() {
        return $this->findAll();
    }

       public function getProducto($id) {
        return $this->asArray()->find($id);
    }

    public function updateStock($id, $nuevoStock) {
        return $this->update($id, ['stock' => $nuevoStock]);
    }

}
