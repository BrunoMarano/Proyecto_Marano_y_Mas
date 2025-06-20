<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuarios_model;
use App\Models\producto_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;

class carrito_controller extends BaseController{

    public function __construct(){

        helper(['form','url','cart']);
        $cart = \Config\Services::cart();
        $session = session();
    }

    public function catalogo(){
        $productoModel = new producto_Model();
        $data['productos'] = $productoModel->orderBy('id','DESC')->findAll();
        $data['titulo'] = 'Todos los Productos';
        echo view('front/head_view', $data);
        echo view("front/plantilla/nav_view");
        echo view('back/productos_catalogo_view',$data);
        echo view('front/footer_view');
    }

    public function muestra(){
        $cart = \Config\Services::cart();
        $cart = $cart->contents();
        $data['cart'] = $cart;

        $data['titulo'] = 'Confirmar compra';
        echo view('front/head_view', $data);
        echo view("front/plantilla/nav_view");
        echo view('back/carrito/carrito_parte_view',$data);
        echo view('front/footer_view');
    }
    

    public function add(){
        
        $cart = \Config\Services::cart();
        $request =  \Config\Services::request();

        $cart->insert(array(
            'id' => $request->getPost('id'),
            'qty' => 1,
            'name' => $request->getPost('nombre'),
            'price' => $request->getPost('precio'),
            'imagen' => $request->getPost('imagen'),
        ));
        return redirect()->back()->withInput();
    }

    public function eliminar_item($rowid){

        $cart = \Config\Services::Cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('muestro'));


    }

    public function borrar_carrito(){

        $cart = \Config\Services::Cart();
        $cart->destroy();
        return redirect()->to(base_url('muestro'));
    }

    public function remove($rowid){

        $cart = \Config\Services::cart();
        if($rowid == "all"){
            $cart->destroy();
        } else{

            $cart->remove($rowid);
        }
        return redirect()->back()->withInput();

    }

    public function actualizar_carrito(){
        
        $cart = \Config\Services::cart();
        $request =  \Config\Services::request();

        $cart->update(array(
            'id' => $request->getPost('id'),
            'qty' => 1,
            'name' => $request->getPost('nombre'),
            'price' => $request->getPost('precio'),
            'imagen' => $request->getPost('imagen'),
        ));
        return redirect()->back()->withInput();


    }

    public function devolver_carrito(){

        $cart = \Config\Services::cart();
        return $cart->contents();
    }

    public function carrito_resta($rowid){
        
    $cart = \Config\Services::cart();
    $item = $cart->getItem($rowid);

    if ($item) {
        if ($item['qty'] > 1) {
            $nuevaCantidad = $item['qty'] - 1;

            $cart->update([
                'rowid' => $rowid,
                'qty'   => $nuevaCantidad
            ]);
        } else {
            $cart->remove($rowid);
        }
    }

    return redirect()->to(base_url('muestro'));
}


    public function carrito_suma($rowid){
    
    $cart = \Config\Services::cart();
    $item = $cart->getItem($rowid);

    if ($item) {
        $nuevaCantidad = $item['qty'] + 1;

        $cart->update([
            'rowid' => $rowid,
            'qty'   => $nuevaCantidad
        ]);
    }

        return redirect()->to(base_url('muestro'));
    }

}