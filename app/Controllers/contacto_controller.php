<?php

namespace App\Controllers;

use App\Models\contacto_Model;

class contacto_controller extends BaseController
{
    public function enviar()
    {
        helper(['form', 'url']);

        if ($this->request->getMethod() === 'post') {
            $consultaModel = new contacto_Model();

            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'email' => $this->request->getPost('email'),
                'telefono' => $this->request->getPost('telefono'),
                'mensaje' => $this->request->getPost('mensaje'),
                'fecha'  => $this->request->getPost('fecha'),
            ];

            $consultaModel->insert($data);
            session()->setFlashdata('success', 'Mensaje enviado correctamente.');
            return redirect()->to(base_url('Contacto'));
        }
    }

    public function guardar(){
        $consultaModel = new \App\Models\contacto_Model();

        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'email'    => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'mensaje'  => $this->request->getPost('mensaje'),
            'fecha'  => $this->request->getPost('fecha'),
        ];

        $consultaModel->insert($data);

        return redirect()->back()->with('mensaje', 'Mensaje enviado con éxito');
    }

    public function listar() {
        $consultaModel = new \App\Models\contacto_Model();
        $data['consultas'] = $consultaModel->findAll();
        $data['titulo'] = 'Listado de Consultas';
    
        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/contacto/listar_consultas_view', $data);
        echo view('front/footer_view');
    }

    public function responder($id){
        $model = new contacto_Model();
        $data['consulta'] = $model->find($id);

        echo view('front/head_view');
        echo view('front/plantilla/nav_view');
        echo view('back/contacto/responder_consulta', $data);
        echo view('front/footer_view');
    }

    public function guardar_respuesta($id){
        $model = new contacto_Model();

        // (Podrías enviar el mail acá si querés)

        $model->update($id, ['respondido' => 1]);

        session()->setFlashdata('success', 'Respuesta enviada correctamente.');
        return redirect()->to(base_url('listar-consultas'));
    }
}