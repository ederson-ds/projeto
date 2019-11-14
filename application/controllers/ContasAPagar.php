<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContasAPagar extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('contasAPagarModel');
        $dados['contasAPagar'] = $this->contasAPagarModel->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('contasAPagarModel');
        $dados['id'] = $id;
        $dados['contasAPagar'] = $this->contasAPagarModel->get($id);
        $dados['statusContasAPagar'] = ContasAPagarModel::$tipostatus;

        if ($this->input->post() != null) {
            $this->contasAPagarModel->insert_entry($id);
            redirect('contasapagar', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('contasAPagarModel');
        $this->contasAPagarModel->delete($id);
        redirect('contasapagar', 'refresh');
    }

}
