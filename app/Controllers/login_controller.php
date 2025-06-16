<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuarios_model;

class login_controller extends BaseController {
    public function index() {
        helper(['form', 'url']);
        return view('back/usuario/login');
    }

    public function auth() {
        $session = session();
        $model = new Usuarios_model();

        $mail = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $mail)->first();

        if ($data) {
            $hash = $data['pass'];
            $baja = $data['baja'];

            if ($baja === 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/');
            }

            if (password_verify($password, $hash)) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => true
                ];

                $session->set($ses_data);
                $session->setFlashdata('msg', '¡Bienvenido ' . $data['nombre'] . '!');
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('login');
            }
        } else {
            $session->setFlashdata('msg', 'El correo no está registrado');
            return redirect()->to('login');
        }
    }

    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}