<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Operadores extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('Operadores_model');
        $dados['operadores'] = $this->Operadores_model->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('Operadores_model');
        $dados['id'] = $id;
        $dados['operador'] = $this->Operadores_model->get($id);

        if ($this->input->post() != null) {
            $this->Operadores_model->insert($id);
            redirect('operadores', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('Operadores_model');
        $this->Operadores_model->delete($id);
        redirect('operadores', 'refresh');
    }

}
