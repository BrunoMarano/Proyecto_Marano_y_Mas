<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='Principal';
       return view('front/head_view',$data) .view('front/plantilla/nav_view') .view('front/plantilla/carousel') .view('front/plantilla/card_principal') .view('front/principal') .view('front/footer_view');
    }   

    public function nosotros(){

        $data['titulo']='Nosotros';
        return view('front/head_view',$data) .view('front/plantilla/nav_view') .view('front/nosotros') .view('front/footer_view');
    }

    public function productos(){

        $data['titulo']='Productos';
        return view('front/head_view',$data) .view('front/plantilla/nav_view') .view('front/nosotros') .view('front/footer_view');
    }

    public function promociones(){

        $data['titulo']='Promociones';
        return view('front/head_view',$data) .view('front/plantilla/nav_view') .view('front/nosotros') .view('front/footer_view');
    }

    public function metodosPagos(){

        $data['titulo']='Metodos de Pagos';
        return view('front/head_view',$data) .view('front/plantilla/nav_view') .view('front/nosotros') .view('front/footer_view');
    }

    public function sucursales(){

        $data['titulo']='Sucursales';
        return view('front/head_view',$data) .view('front/plantilla/nav_view') .view('front/nosotros') .view('front/footer_view');
    }
}

