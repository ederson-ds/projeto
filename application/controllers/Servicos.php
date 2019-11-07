<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('servicosModel');
        $this->load->model('unidadesModel');
        $this->load->model('especialidadesModel');
        $dados['servicos'] = $this->servicosModel->get_all($pesquisar);
        $dados['unidades'] = $this->unidadesModel->get_all();
        $dados['especialidades'] = $this->especialidadesModel->get_all();
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('servicosModel');
        $this->load->model('unidadesModel');
        $this->load->model('especialidadesModel');
        $dados['id'] = $id;
        $dados['servico'] = $this->servicosModel->get($id);
        $dados['unidades'] = $this->unidadesModel->get_all();
        $dados['especialidades'] = $this->especialidadesModel->get_all();

        if ($this->input->post() != null) {
            $this->servicosModel->insert_entry($id);
            redirect('servicos', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('servicosModel');
        $this->servicosModel->delete($id);
        redirect('servicos', 'refresh');
    }

}
