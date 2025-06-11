<?php
namespace App\Controllers;
use App\Models\Producto_Model;
use App\Models\Usuario_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\categoria_model;

class Productocontroller extends Controllers{
    public function __construct(){
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
        echo view('back/productos/altaProducto', $data);
        echo view('front/footer_view');
    }

    public function creaproducto(){
        $categoriasmodel = new categoria_model();
        $data['categoria'] = $categoriasmodel->getCategorias();

        $productoModel = new Producto_Model();
        $data['producto'] = $productoModel->getProductoAll();

        $data['titulo'] = 'alta producto';
        echo view('front/head_view_crud', $data);
        echo view('front/nav_view');
        echo view('back/productos/altaProducto', $data);
        echo view('front/footer_view');
    }

    public function store(){
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'categoria_id' => 'is_not_unique[categorias.id]',
            'costo' => 'required|numeric',
            'precio' => 'required|numeric',
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
            echo view('front/nav_view');
            echo view('back/productos/altaProducto', $data);
        }else{
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();

            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

            // if ($file->isValid() && !$img->hasMoved()) {
            //     $newName = $file->getRandomName();l
            //     $file->move('uploads/', $newName);
            //     $rutaImagen = 'uploads/' . $newName;
            // } else {
            //     $rutaImagen = null;
            // }

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $img->getName(),
                'categoria_id' => $this->request->getVar('categoria'),
                'costo' => $this->request->getVar('costo'),
                'precio' => $this->request->getVar('precio'),
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