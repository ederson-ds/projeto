<?php

class Candidatos extends CI_Controller
{

    public function index()
    {
        $this->load->model('Candidatos_model');
        echo json_encode($this->Candidatos_model->get_all());
    }

    public function create($id = null)
    {
        $this->load->model('Candidatos_model');
        if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'GET') {
            echo json_encode($this->Candidatos_model->get($id));
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->Candidatos_model->insert($id);
        }
    }

    public function delete($id = null)
    {
        $this->load->model('Candidatos_model');
        $this->Candidatos_model->delete($id);
    }
}
