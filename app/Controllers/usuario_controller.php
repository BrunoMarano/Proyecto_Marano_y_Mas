<?php
namespace App\Controllers;
use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Usuario_controller extends Controller {

    public function __construct() {
        helper(['form', 'url']);
    }

    public function create() {
        $data['titulo'] = 'Registro';
        return view('front/head_view', $data)
            . view('front/plantilla/nav_view')
            . view('back/usuario/register')
            . view('front/footer_view');
    }

    public function formValidation() {
        $validation = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[30]',
            'usuario'  => 'required|min_length[3]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuario.email]',
            'pass'     => 'required|min_length[3]|max_length[10]',
        ]);

        $formModel = new Usuarios_model();

        if (!$validation) {
            $data['titulo'] = 'Registro';
            return view('front/head_view', $data)
                . view('front/plantilla/nav_view')
                . view('back/usuario/register', ['validation' => $this->validator])
                . view('front/footer_view');
        } else {
            $formModel->save([
                'nombre'   => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario'  => $this->request->getVar('usuario'),
                'email'    => $this->request->getVar('email'),
                'pass'     => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'perfil_id' => 2,
                'baja' => 0,
            ]);

            session()->setFlashdata('success', 'Usuario registrado con éxito');
            return redirect()->to(base_url('/principal'));
        }
    }
}
