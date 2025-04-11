<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='principal';
       return view('front/head_view',$data)
        .view('front/nav_view')
        .view('front/principal')
        .view('front/footer_view');
    }   

    public function nosotros(){

        $data['titulo']='nosotros';
        return view('front/head_view',$data) .view('front/nav_view') .view('front/nosotros') .view('front/footer_view');
    }

    public function productos(){

        $data['titulo']='nosotros';
        return view('front/head_view',$data) .view('front/nav_view') .view('front/nosotros') .view('front/footer_view');
    }

    public function promociones(){

        $data['titulo']='nosotros';
        return view('front/head_view',$data) .view('front/nav_view') .view('front/nosotros') .view('front/footer_view');
    }

    public function metodosPagos(){

        $data['titulo']='nosotros';
        return view('front/head_view',$data) .view('front/nav_view') .view('front/nosotros') .view('front/footer_view');
    }

    public function sucursales(){

        $data['titulo']='nosotros';
        return view('front/head_view',$data) .view('front/nav_view') .view('front/nosotros') .view('front/footer_view');
    }
}

