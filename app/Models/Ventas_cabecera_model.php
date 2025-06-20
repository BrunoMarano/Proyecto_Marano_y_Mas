<?php
namespace App\Models;
use CodeIgniter\Model;

class Ventas_cabecera_model extends Model {

    protected $table = "ventas_cabecera";
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','fecha', 'usuario_id', 'total_venta'];

    public function getBuilderVentas_cabecera(){
        $db = \Config\Database::connect();
        $builder = $db->table('ventas_cabecera');
        $builder->join('usuario','usuario.id_usuario = ventas_cabecera.usuario_id');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getVentas($id_usuario = null){
        if($id_usuario === null){
            return $this->getBuilderVentas_cabecera();
        } else{
            $db =\Config\Database::connect();
            $builder = $db->table('ventas_cabecera');
            $builder->select('*');
            $builder->join('usuario','usuario.id_usuario = ventas_cabecera.usuario_id');
            $builder->where('ventas_cabecera.usuario_id', $id_usuario);
            $query = $builder->get();
            return $query->getResultArray();
        }
    }

}
