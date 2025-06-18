<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\producto_Model;
use App\Models\Usuario_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\categoria_Model;

class producto_controller extends Controller{
    public function __construct(){
        helper(['url', 'form']);
        $session=session();
    }

    //mostrar los productos en linea
    public function index(){
        $categoriasmodel = new categoria_Model();
        $data['categorias'] = $categoriasmodel->findAll();
        
        $productoModel = new producto_Model();
        //realizo la consulta para mostrar todos los productos
        $data['productos'] = $productoModel->getProductoAll();

        $data['titulo'] = 'Crud_productos';
        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/producto/producto_crud_view', $data);
        echo view('front/footer_view');
    }

    public function creaproducto(){
        $categoriasmodel = new categoria_Model();
        $data['categorias'] = $categoriasmodel->findAll();

        $productoModel = new producto_Model();
        $data['producto'] = $productoModel->getProductoAll();

        $data['titulo'] = 'Alta producto';
        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/producto/producto_crud_view', $data);
        echo view('front/footer_view');
    }

    public function store(){
        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'categoria_id' => 'required|is_not_unique[categoria.id_categoria]',
            'costo' => 'required|numeric',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'stock_min' => 'required|integer',
            'imagen' => 'uploaded[imagen]|is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]|max_size[imagen,2048]',
        ]);

        $productoModel = new producto_Model();

        if(!$input){
            $categoria_model = new categoria_Model();
            $data['categorias'] = $categoria_model->findAll();
            $data['validation'] = $this->validator;

            $data['titulo'] = 'Alta';
            echo view('front/head_view', $data);
            echo view('front/plantilla/nav_view');
            echo view('back/producto/producto_crud_view', $data);
            echo view('front/footer_view');
        }else{
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();

            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre' => $this->request->getVar('nombre'),
                'imagen' => $nombre_aleatorio,
                'categoria_id' => $this->request->getVar('categoria_id'),
                'costo' => $this->request->getVar('costo'),
                'precio' => $this->request->getVar('precio'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
            ];

            $productoModel->insert($data);
            session()->setFlashdata('success', 'Alta exitosa...');
            return redirect()->to(site_url('crear'));
        }
    }


    public function singleproducto($id = null){
        $productoModel = new producto_Model();
        $data['old'] = $productoModel->where('id', $id)->first();
        if(empty($data['old'])){
            throw new \CodeIgniter\Exception\PageNotFoundException('No se ha seleccionado');
        }

        $categoria_model = new categoria_Model();
        $data['categorias'] = $categoria_model->findAll();

        $data['titulo'] = 'CRUD productos';
        echo view('front/head_view');
        echo view('front/plantilla/nav_view');
        echo view('back/producto/edit', $data);
        echo view('front/footer_view');
    }

    public function modifica($id){
        $productoModel = new producto_Model();
        $producto = $productoModel->where('id', $id)->first();
        $img = $this->request->getFile('imagen');

    if($img && $img->isValid()){
        $nombre_aleatorio = $img->getRandomName();
        $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);
        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'imagen' => $img && $img->isValid() ? $img->getName() : $id['imagen'],
            'categoria_id' => $this->request->getVar('categoria_id'),
            'costo' => $this->request->getVar('costo'),
            'precio' => $this->request->getVar('precio'),
            'stock' => $this->request->getVar('stock'),
            'stock_min' => $this->request->getVar('stock_min'),
        ];
    }else{
        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'imagen' => $img->getName(),
            'categoria_id' => $this->request->getVar('categoria_id'),
            'costo' => $this->request->getVar('costo'),
            'precio' => $this->request->getVar('precio'),
            'stock' => $this->request->getVar('stock'),
            'stock_min' => $this->request->getVar('stock_min'),
        ];
    }


    $productoModel->update($id, $data);
    session()->setFlashdata('success', 'Modificación exitosa...');

    }


    public function deleteproducto($id){
        $productoModel = new producto_Model();
        $data['eliminado'] = $productoModel->where('id', $id)->first();
        $data['eliminado'] = 'SI';
        $productoModel->update($id, $data);
        return $this->response->redirect(site_url('crear'));
    }

    public function eliminados(){
        $productoModel = new producto_Model();
        $data['producto'] = $productoModel->getProductoAll();
        $data['titulo'] = "Crud_productos";
        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/producto/producto_eliminado', $data);
        echo view('front/footer_view');
    }

    public function activarproducto($id){
        $productoModel = new producto_Model();
        $data['eliminado'] = $productoModel->where('id', $id)->first();
        $data['eliminado'] = 'NO';
        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Activación exitosa...');
        return $this->response->redirect(site_url('/crear'));
    }

}