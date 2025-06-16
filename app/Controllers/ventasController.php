<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuarios_model;
use App\Models\Productos_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;

class Ventascontroller extends Controller{

    public function registrar_venta(){
        $session = session();
        require(APPPATH . 'Controllers/carrito_controller.php');
        $cartController = new carrito_controller();
        $carrito_contents = $cartController->devolcer_carrito();

        $productoModel = new Producto_model();
        $ventasModel = new Ventas_cabecera_model();
        $detalleModel = new Ventas_detalle_model();

        $prodcutos_validos = [];
        $prodcutos_sin_stock = [];
        $total = 0;

        foreach($carrito_contents as $item){
            $producto = $productoModel->getProducto($item['id']);

            if($producto && $producto['stock'] >= $item['qty']) {
                $prodcutos_validos[] = $item;
                $total += $item['subtotal'];
            } else {
                $prodcutos_sin_stock[] = $item['name'];
                $cartController->elimitar_item($item['rowid']);
            }
        }
        if(!empty($prodcutos_sin_stock)) {
            $mensaje = 'Los sigguientes productos no tienen stock suficientes y fueron eliminados del carrito: <br>' . implode(',', $prodcutos_sin_stock);
            $session->setFlashdata('mensaje'$mensaje);
            return redirect()->to(base_url('muestro'));        
        }

        if(empty($prodcutos_validos)) {
            $session->setFlashdata('mensaje', 'No hay productos válidos para egistrar la venta.');
            return redirect()->to(base_url('muestro'));  
        }

        $nueva_venta = [
            'usuario_id' => $session->get('id_usuario'),
            'total_venta' => $total
        ];
        $venta_id = $ventasModel->insert($nueva_venta);

        foreach ($prodcutos_validos as $item){
            $detalle = [
                'venta_id' => $venta_id,
                'producto_id' => $item['id'],
                'cantidad' => $item['qty'],
                'precio' => $item['subtotal']

            ];
            $detalleModel->insert($detalle);

            $producto = $productoModel->getProducto($item['id']);
            $productoModel->updateStock($item['id'], $producto['stock'] - $item['qty']);
        }

        $cartController->borrar_carrito();
        $session->setFlashdata('mensajee', 'Venta registrada exitosamente.');
        return redirect()->to(base_url('vista_compras/' . $venta_id));
    }

    public function ver_factura($venta_id){
        $detalle_ventas = new Ventas_detalle_model();
        $data['venta'] = $detalle_ventas->getDetalles($venta_id);

        $dato['titulo'] = "Mi compra";

        echo view('front/head_view_crud',dato);
        echo view('front/platilla/nav_view');
        echo view('back/compras/vista_compras', $data);
        echo view('front/footer_view');
    }

    public function ver_favturas_usuario(){
        $ventas = new ventas_cabecera_model;

        $data['ventas'] = $ventas->getVentas($id_usuario);
        $dato['titulo'] = "Todas mis compras";

        echo view('front/head_view_crud',dato);
        echo view('front/platilla/nav_view');
        echo view('back/compras/ver_facturas_usuario', $data);
        echo view('front/footer_view');
    }
}