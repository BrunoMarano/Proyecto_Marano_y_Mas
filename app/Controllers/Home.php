<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='Avicola Santa Ana';
       return view('front/head_view',$data) 
       .view('front/plantilla/nav_view') 
    //    .view('front/plantilla/carousel') 
       .view('front/plantilla/principal') 
       .view('front/footer_view');
    }   

    public function nosotros(){

        $data['titulo']='Nosotros';
        return view('front/head_view',$data)
        .view('front/plantilla/nav_view') 
        .view('front/nosotros') 
        .view('front/footer_view');
    }

    public function productos(){

        $data['titulo']='Productos';
        return view('front/head_view',$data) 
        .view('front/plantilla/nav_view') 
        .view('front/productos') 
        .view('front/footer_view');
    }

    public function contacto(){

        $data['titulo']='Contacto';
        return view('front/head_view',$data) 
        .view('front/plantilla/nav_view')
        .view('front/contacto') 
        .view('front/footer_view');
    }

    public function metodosPagos(){

        $data['titulo']='Metodos de Pagos';
        return view('front/head_view',$data) 
        .view('front/plantilla/nav_view')
        .view('front/MetodosDePagos') 
        .view('front/footer_view');
    }

    public function sucursales(){

        $data['titulo']='Sucursales';
        return view('front/head_view',$data) 
        .view('front/plantilla/nav_view')
        .view('front/Sucursales') 
        .view('front/footer_view');
    }


    public function login(){
        $data['titulo']='login';
        return view('front/head_view',$data)
        .view('front/plantilla/nav_view')
        .view('back/usuario/login')
        .view('front/footer_view');
    }

    public function error(){
        $data['titulo']='Error';
        return view('front/head_view',$data)
        .view('front/error');
    }

    public function altaProducto(){

        $data['titulo']='Alta de Productos';
        return view('front/head_view',$data) 
        .view('front/plantilla/nav_view') 
        .view('back/producto/altaProducto') 
        .view('front/footer_view');
    }

    public function guardar()
    {
        return redirect()->to(base_url('altaProducto'))->with('success', 'Producto cargado correctamente.');
    }
}

