<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinas extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('maquinasModel');
        $dados['maquinas'] = $this->maquinasModel->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('maquinasModel');
        $dados['id'] = $id;
        $dados['maquina'] = $this->maquinasModel->get($id);

        if ($this->input->post() != null) {
            $this->maquinasModel->insert_entry($id);
            redirect('maquinas', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('maquinasModel');
        $this->maquinasModel->delete($id);
        redirect('maquinas', 'refresh');
    }

}
