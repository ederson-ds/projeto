<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Telas extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('telasModel');
        $dados['telas'] = $this->telasModel->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('telasModel');
        $dados['id'] = $id;
        $dados['tela'] = $this->telasModel->get($id);
        $dados['arvores'] = $this->telasModel->get_arvores();

        if ($this->input->post() != null) {
            $this->telasModel->insert_entry($id);
            redirect('telas', 'refresh');
        }
        parent::createview($dados);
    }

}