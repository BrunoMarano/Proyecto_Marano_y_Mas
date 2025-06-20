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
                'nombre'   => $this->request->getPost('nombre'),
                'email'    => $this->request->getPost('email'),
                'telefono' => $this->request->getPost('telefono'),
                'mensaje'  => $this->request->getPost('mensaje'),
                'fecha'    => $this->request->getPost('fecha'),
            ];

            $consultaModel->insert($data);
            session()->setFlashdata('success', 'Mensaje enviado correctamente.');
            return redirect()->to(base_url('Contacto'));
        }
    }

    public function guardar()
    {
        $consultaModel = new contacto_Model();

        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'email'    => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'mensaje'  => $this->request->getPost('mensaje'),
            'fecha'    => $this->request->getPost('fecha'),
        ];

        $consultaModel->insert($data);

        return redirect()->back()->with('mensaje', 'Mensaje enviado con éxito');
    }

    public function listar()
    {
        $consultaModel = new contacto_Model();
        $data['consultas'] = $consultaModel->findAll();
        $data['titulo'] = 'Listado de Consultas';

        echo view('front/head_view', $data);
        echo view('front/plantilla/nav_view');
        echo view('back/contacto/listar_consultas_view', $data);
        echo view('front/footer_view');
    }

    public function responder_consulta()
    {
        $id = $this->request->getPost('id');
        $consultaModel = new contacto_Model();

        if ($id) {
            $consultaModel->update($id, ['respondido' => 1]);
            session()->setFlashdata('success', 'Consulta marcada como respondida.');
        } else {
            session()->setFlashdata('error', 'ID de consulta no recibido.');
        }

        return redirect()->to(base_url('listar-consultas'));
    }

    public function eliminar_consulta()
    {
        $id = $this->request->getPost('id');
        $consultaModel = new contacto_Model();

        if ($id) {
            $consultaModel->delete($id);
            session()->setFlashdata('success', 'Consulta eliminada correctamente.');
        } else {
            session()->setFlashdata('error', 'ID de consulta no recibido.');
        }

        return redirect()->to(base_url('listar-consultas'));
    }
}