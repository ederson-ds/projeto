<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidades extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('especialidadesModel');
        $dados['especialidades'] = $this->especialidadesModel->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('especialidadesModel');
        $dados['id'] = $id;
        $dados['especialidade'] = $this->especialidadesModel->get($id);

        if ($this->input->post() != null) {
            $this->especialidadesModel->insert_entry($id);
            redirect('especialidades', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('especialidadesModel');
        $this->especialidadesModel->delete($id);
        redirect('especialidades', 'refresh');
    }

}
