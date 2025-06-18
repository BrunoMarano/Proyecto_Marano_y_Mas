<?php

namespace App\Controllers;

use App\Models\Usuarios_model;
use App\Models\consulta_Model;
use CodeIgniter\Controller;

class Usuario_crud_controller extends Controller
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $userModel = new Usuarios_model();
        $data['users'] = $userModel->orderBy('id_usuario', 'DESC')->findAll();
        $dato['titulo'] = 'Crud_usuarios';

        echo view('front/head_view', $dato);
        echo view('front/plantilla/nav_view');
        echo view('back/crud_usuario/usuario_nuevo_view', $data);
        echo view('front/footer_view');
    }

    public function create()
    {
        $userModel = new Usuarios_model(); 
        $data['user_obj'] = $userModel->orderBy('id_usuario', 'DESC')->findAll();

        $dato['titulo'] = 'Alta Usuario';
        echo view('front/head_view', $dato);
        echo view('front/plantilla/nav_view');
        echo view('back/crud_usuario/usuario_crud_view', $data);
        echo view('front/footer_view');
    }

    public function store()
    {
        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario' => 'required|min_length[3]',
            'pass' => 'required|min_length[3]|max_length[100]'
        ]);

        $userModel = new Usuarios_model();

        if (!$input) {
            $data['titulo'] = 'Modificación';
            echo view('front/head_view', $data);
            echo view('front/plantilla/nav_view');
            echo view('back/crud_usuario/usuario_crud_view', [
                'validation' => $this->validator
            ]);
        } else {
            $data = [
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            ];
            $userModel->insert($data);
            return $this->response->redirect(site_url('users-list'));
        }
    }

    public function singleUser($id = null)
    {
        $userModel = new Usuarios_model();
        $data['user_obj'] = $userModel->where('id_usuario', $id)->first(); 

        $dato['titulo'] = 'Crud_usuarios';
        echo view('front/head_view', $dato);
        echo view('front/plantilla/nav_view');
        echo view('back/crud_usuario/edit_usuarios_view', $data);
        echo view('front/footer_view');
    }

    public function update()
    {
        $userModel = new Usuarios_model();
        $id = $this->request->getVar('id');

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'usuario' => $this->request->getVar('usuario'),
            'email' => $this->request->getVar('email'),
            'perfil_id' => $this->request->getVar('perfil')
        ];

        $userModel->update($id, $data);
        return $this->response->redirect(site_url('users-list'));
    }

    public function deletelogico($id = null)
    {
        $userModel = new Usuarios_model();
        $data = ['baja' => 'SI'];
        $userModel->update($id, $data); 
        return $this->response->redirect(site_url('users-list'));
    }

    public function activar($id = null)
    {
        $userModel = new Usuarios_model();
        $data = ['baja' => 'NO'];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('users-list'));
    }
}
