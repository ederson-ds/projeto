<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Receitas extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('receitas_model');
        $dados['receitas'] = $this->receitas_model->get_all();
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('receitas_model');
        $dados['id'] = $id;
        $dados['receita'] = $this->receitas_model->get($id);

        if ($this->input->post() != null) {
            $this->receitas_model->insert($id);
            redirect('receitas', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('receitas_model');
        $this->receitas_model->delete($id);
        redirect('receitas', 'refresh');
    }

}
