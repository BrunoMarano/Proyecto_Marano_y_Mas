<?php

namespace App\Controllers;

date_default_timezone_set('America/Argentina/Buenos_Aires');

use CodeIgniter\Controller;
use App\Models\Usuarios_model;
use App\Models\producto_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Controllers\carrito_controller;  

class VentasController extends Controller
{
    public function registrar_venta()
    {
        $session = session();
        $cartController = new carrito_controller();
        $carrito_contents = $cartController->devolver_carrito();

        $productoModel = new producto_Model();
        $ventasModel = new Ventas_cabecera_model();
        $detalleModel = new Ventas_detalle_model();

        $productos_validos = [];
        $productos_sin_stock = [];
        $total = 0;

        foreach ($carrito_contents as $item) {
            $producto = $productoModel->getProducto($item['id']);

            if ($producto) {
                $stock_actual = $producto['stock'];
                $stock_minimo = $producto['stock_min'];
                $cantidad_a_comprar = $item['qty'];
                $stock_resultante = $stock_actual - $cantidad_a_comprar;

                if ($cantidad_a_comprar <= $stock_actual && $stock_resultante >= $stock_minimo) {
                    // Stock suficiente y no viola mínimo
                    $productos_validos[] = $item;
                    $total += $item['subtotal'];
                } else {
                    // Stock insuficiente o violación de stock mínimo
                    $productos_sin_stock[] = $item['name'] . " (stock insuficiente o stock mínimo violado)";
                    $cartController->eliminar_item($item['rowid']);
                }
            } else {
                // Producto no encontrado
                $productos_sin_stock[] = $item['name'] . " (producto no encontrado)";
                $cartController->eliminar_item($item['rowid']);
            }
        }

        if (!empty($productos_sin_stock)) {
            $mensaje = 'Los siguientes productos fueron eliminados del carrito por problemas de stock:<br>' . implode(', ', $productos_sin_stock);
            $session->setFlashdata('mensaje', $mensaje);
            return redirect()->to(base_url('muestro'));
        }

        if (empty($productos_validos)) {
            $session->setFlashdata('mensaje', 'No hay productos válidos para registrar la venta.');
            return redirect()->to(base_url('muestro'));
        }

        // Insertar cabecera de la venta
        $nueva_venta = [
            'fecha' => date('Y-m-d H:i:s'),
            'usuario_id' => $session->get('id_usuario'),
            'total_venta' => $total
        ];
        $venta_id = $ventasModel->insert($nueva_venta);

        // Insertar detalle de venta y actualizar stock
        foreach ($productos_validos as $item) {
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
        $session->setFlashdata('mensaje', 'Venta registrada exitosamente.');
        return redirect()->to(base_url('vista_compras/' . $venta_id));
    }

    public function ver_factura($venta_id)
    {
        $detalle_ventas = new Ventas_detalle_model();
        $data['venta'] = $detalle_ventas->getDetalles($venta_id);

        $data['titulo'] = "Mi compra";

        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/compras/vista_compras', $data);
        echo view('front/footer_view');
    }

    public function ver_facturas_usuario()
    {
        $session = session();
        $id_usuario = $session->get('id_usuario');

        $ventas = new Ventas_cabecera_model();

        $data['ventas'] = $ventas->getVentas($id_usuario);
        $data['titulo'] = "Todas mis compras";

        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/compras/ver_factura_usuario', $data);
        echo view('front/footer_view');
    }

    public function ventas()
    {
        $venta_id = $this->request->getGet('id');

        $detalle_ventas = new Ventas_detalle_model();
        $data['venta'] = $detalle_ventas->getDetalles($venta_id);

        $ventasCabecera = new Ventas_cabecera_model();
        $data['usuarios'] = $ventasCabecera->getBuilderVentas_cabecera();

        $dato['titulo'] = "ventas";
        echo view('front/head_view', $dato);
        echo view('front/plantilla/nav_view');
        echo view('back/ventas/ventas', $data);
        echo view('front/footer_view');
    }

    public function misFacturas()
    {
        $id = session('id_usuario');
        return redirect()->to(base_url('ver_factura_usuario/' . $id));
    }
}
