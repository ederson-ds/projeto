<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Despesas extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('despesas_model');
        $dados['despesas'] = $this->despesas_model->get_all();
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('despesas_model');
        $dados['id'] = $id;
        $dados['despesa'] = $this->despesas_model->get($id);

        if ($this->input->post() != null) {
            $this->despesas_model->insert($id);
            redirect('despesas', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('despesas_model');
        $this->despesas_model->delete($id);
        redirect('despesas', 'refresh');
    }

}
