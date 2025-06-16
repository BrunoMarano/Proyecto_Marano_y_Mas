<?php

namespace App\Controllers;

class carrito_controller extends BaseController{

    public function __construct(){

        helper(['form','url','cart']);
        $cart = Config\Services::cart();
        $session = session();
    }

    public function add(){
        
        $cart = Config\Services::cart();
        $request =  Config\Services::request();

        $cart->insert(array(
            'id' => $request->getPost('id_producto'),
            'qty' => 1,
            'name' => $request->getPost('nombre_prod'),
            'price' => $request->getPost('costo'),
            'imagen' => $request->getPost('imagen'),
        ));
        return redirect()->back()->withInput();
    }

    public function actualizar_carrito(){
        
        $cart = Config\Services::cart();
        $request =  Config\Services::requuest();

        $cart->update(array(
            'id' => $request->getPost('id_producto'),
            'qty' => 1,
            'name' => $request->getPost('nombre_prod'),
            'price' => $request->getPost('costo'),
            'imagen' => $request->getPost('imagen'),
        ));
        return redirect()->back()->withInput();
    }

        public function eliminar_item_carrito(){
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();

        $rowid = $request->getPost('id_producto');

        if ($rowid) {
            $cart->remove($rowid);
        }

        return redirect()->back()->withInput();
        
    }


}