<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\producto_Model;
use App\Models\categoria_Model;

class producto_controller extends BaseController{
    public function __construct(){
        helper(['url', 'form']);
        $session = session();
    }

    public function index(){
        $categoriasmodel = new categoria_Model();
        $data['categorias'] = $categoriasmodel->findAll();
        
        $productoModel = new producto_Model();
        $data['productos'] = $productoModel->getProductoAll();

        $data['titulo'] = 'crud_productos';
        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/producto/producto_crud_view', $data);
        echo view('front/footer_view');
    }

    public function creaproducto(){
        $categoriasmodel = new categoria_Model();
        $data['categorias'] = $categoriasmodel->findAll();

        $data['titulo'] = 'Alta producto';
        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/producto/altaProducto', $data);
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
            $data['titulo'] = 'Alta producto';

            echo view('front/head_view', $data);
            echo view('front/plantilla/nav_view');
            echo view('back/producto/altaProducto', $data);
            echo view('front/footer_view');
        } else {
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move('assets/uploads', $nombre_aleatorio);

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
        $data['old'] = $productoModel->find($id);
        if(empty($data['old'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se ha seleccionado un producto válido');
        }

        $categoria_model = new categoria_Model();
        $data['categorias'] = $categoria_model->findAll();

        $data['titulo'] = 'Editar producto';
        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/producto/edit', $data);
        echo view('front/footer_view');
    }

    public function modifica($id){
        $productoModel = new producto_Model();
        $producto = $productoModel->find($id);

        if(!$producto){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        $img = $this->request->getFile('imagen');

        if($img && $img->isValid() && !$img->hasMoved()){
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

            $imagen_nombre = $nombre_aleatorio;
        } else {
        
            $imagen_nombre = $producto['imagen'];
        }

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'imagen' => $imagen_nombre,
            'categoria_id' => $this->request->getVar('categoria_id'),
            'costo' => $this->request->getVar('costo'),
            'precio' => $this->request->getVar('precio'),
            'stock' => $this->request->getVar('stock'),
            'stock_min' => $this->request->getVar('stock_min'),
        ];

        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Modificación exitosa...');
        return redirect()->to(site_url('crear'));
    }

    public function deleteproducto($id){
        $productoModel = new producto_Model();

        
        $data = ['eliminado' => 'SI'];

        $productoModel->update($id, $data);

        session()->setFlashdata('success', 'Producto eliminado correctamente.');
        return redirect()->to(site_url('crear'));
    }

    public function deletedproducto($id){
        $productoModel = new producto_Model();

        $producto = $productoModel->find($id);

        if ($producto) {
        
            $imagenPath = FCPATH . 'assets/uploads/' . $producto['imagen'];
            if (is_file($imagenPath)) {
                unlink($imagenPath);
            }
            
            $productoModel->delete($id);

            session()->setFlashdata('success', 'Producto eliminado correctamente.');
        
        } else {
            session()->setFlashdata('fail', 'Producto no encontrado.');
        }

        return redirect()->to(base_url('crear'));
    }


    public function eliminados(){
        $productoModel = new producto_Model();
        
        $data['productos'] = $productoModel->getProductoAll();
        $data['titulo'] = "Productos eliminados";

        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/producto/producto_eliminado', $data);
        echo view('front/footer_view');
    }

    public function activarproducto($id){
        $productoModel = new producto_Model();
        $data = ['eliminado' => 'NO'];
        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Activación exitosa...');
        return redirect()->to(site_url('crear'));
    }

    public function getProductoAll() {
        return $this->where('eliminado', 'NO')->findAll();
    }
}