<?php

namespace App\Controllers;
use App\Models\GeneroModel;
use App\Models\CancionModel;

class Home extends BaseController
{
    public function index()
    {
        $genero=new GeneroModel();
        $cancionModel = new CancionModel();
        $data['generos']=$genero->findAll();
        $data['canciones']=$cancionModel->findAll();
        return view('welcome_message',$data);
    }

    public function addCancion() {
        $cancionModel = new CancionModel();
        $data = [
            'titulo' => $this->request->getVar('titulo'),
            'grupo'  => $this->request->getVar('grupo'),
            'anio'  => $this->request->getVar('anio'),
            'idGenero'  => $this->request->getVar('genero'),
        ];
        $cancionModel->insert($data);
        return $this->response->redirect(site_url('/'));
    }

    public function delete($id = null){
        $cancionModel = new CancionModel();
        $cancionModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/'));
    }

    public function getCancion($id){
        $cancionModel = new CancionModel();
        $data['canciones']=$cancionModel->find($id);
        return json_encode($data['canciones']);
    }

    public function updateCancion(){
        $cancionModel = new CancionModel();
        $id = $this->request->getVar('id');
        $data = [
            'titulo'  => $this->request->getVar('titulo'),
            'grupo'  => $this->request->getVar('grupo'),
            'anio'  => $this->request->getVar('anio'),
            'idGenero'  => $this->request->getVar('idGenero'),
        ];
        $cancionModel->update($id, $data);
        return $this->response;
    }
}