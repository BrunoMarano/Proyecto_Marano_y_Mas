<?php
namespace App\Controllers;
Use App\Models\Usuarios_model;
Use CodeIgniter\Controller;

class Usuario_controller extends Controller{
    public function_construct(){
        helper(['form', 'url']);
    }

    public function create(){
        $data['titulo']='Registro';
        echo view('front/head_view',$data)
        echo view('front/plantilla/nav_view')
        echo view('back/usuario/register')
        echo view('front/footer_view');
    }

    public function formValidation(){
        $input = $this->validate([
            'nombre' => 'required|min_legth[3]',
            'apellido' => 'required|min_length[3]|max_length[30]',
            'usuario' => 'required|min_length[3]',
            'mail' => 'required|min_length[4]|max_length[100]|valid_mail|is_unique[usuario.mail]',
            'pass' => 'required|min_length[3]|max_length[10]',
        ])
    }

    $formModel = new Usuarios_model();

    if(!$input){
        $data['data']='Registro';
        echo view('front/head_view',$data)
        echo view('front/plantilla/nav_view')
        echo view('back/usuario/register', ['validation' => $this->validator]);
        echo view('front/footer_view');
    }else{
        $formModel->sabe([
            'nombre'=> $this->request->getVar('nombre'),
            'apellido'=> $this->request->getVar('apellido'),
            'usuario'=> $this->request->getVar('usuario'),
            'mail'=> $this->request->getVar('mail'),
            'pass'=> password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('success', 'Usuario registrado con exito');
        return $this->response->redirect(to_url("/register"));
    }


}