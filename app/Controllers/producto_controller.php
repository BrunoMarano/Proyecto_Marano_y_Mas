<?php
namespace App\Controllers;
use App\Models\Producto_Model;
use App\Models\Usuario_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\categoria_model;
use App\Models\Controller;

class Productocontroller extends Controller{
    public function_construct(){
        helper(['url', 'form']);
        $session=session();
    }

    //mostrar los productos en linea
    public function index(){
        $productoModel = new Producto_Model();
        //realizo la consulta para mostrar todos los productos
        $data['producto'] = $productoModel->getProductoAll();

        $data['titulo'] = 'Crud_productos';
        echo view('front/head_view_crud', $data);
        echo view('front/nav_view');
        echo view('back/productos/producto_nuevo_view', $data);
        echo view('front/footer_view');
    }

    public function creaproducto(){
        $categoriasmodel = new categoria_model();
        $data('categoria') = $categoriasmodel->getCategorias();

        $productoModel = new Producto_Model();
        $data['producto'] = $productoModel->getProductoAll();

        $data['titulo'] = 'alta producto';
        echo view('front/head_view_crud', $data);
        echo view('front/nav_view');
        echo view('back/productos/alta_producto_view', $data);
        echo view('front/footer_view');
    }

    public function store(){
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'categoria' => 'is_not_unique[categorias.id]',
            'precio' => 'required|numeric',
            'precio_vta' => 'required|numeric',
            'stock' => 'required',
            'stock_min' => 'required',
            'imagen' => 'uploaded[imagen]',
        ]);

        $productoModel = new producto_Model();

        if(!$input){
            $categoria_model = new categoria_model();
            $data['categorias'] = $categoria_model->getCategorias();
            $data['validation'] = $this->validator;

            $data['titulo'] = 'Alta';
            echo view('front/head_view', $data);
            echo_view('front/nav_view');
            echo_view('back/productos/alta_producto_view', $data);
        }else{
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();

            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $img->getName(),
                'categoria_id' => $this->request->getVar('categoria'),
                'preciod' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
            ];

            $producto = new Producto_Model();
            $producto->insert($data);
            session()->setFlashdata('success', 'Alta exitosa...');
            return $this->response->redirect(site_url('crear'));
        }
    }
}