<?php

namespace App\Controller;
use CodeIgniter\Controller;
use App\Models\Usuarios_model;

class login_controller extends BaseController{
    public function index(){
        helper(['form', 'url']);
    }

    public function auth(){
        $session = session();
        $model = new Usuarios_model();

        $mail = $this->request->getVar('mail');
        $password = $this->request->getVar('pass');

        $data = $model->where('mail', $mail)->first();
        if($data){
            $pass = $data['pass'];
            $ba = $data['baja'];
            if($ba == 'SI'){
                $session->setFlashdata('msg', 'usuario dado de baja');
                return redirect()->to('/');
                $verify_pass = password_verify($password, $pass);

                if($verify_pass){
                    $uses_data = [
                        'id_usuario' => $data['id_usuario'];
                        'nombre' => $data['nombre'];
                        'apellido' => $data['apellido'];
                        'mail' => $data['mail'];
                        'usuario' => $data['usuario'];
                        'perfil_id' => $data['perfil_id'];
                        'logged_in' => TRUE
                    ];

                    $session->set($ses_data);
                    session()->setFlashdata('msg', 'Buenvenido!!');
                    return redirect()->to('/panel');
                }else{
                    $session->setFlashdata('msg', 'Password incorrecto');
                    return redirect()->to('/login');
                }
            }else{
                $session->setFlashdata('msg', 'No ingreso un email o el mismo es incorrecto');
                return redirect()->to('/login');
            }
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}