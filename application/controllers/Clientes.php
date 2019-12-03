<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('clientesModel');
        $dados['clientes'] = $this->clientesModel->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('clientesModel');
        $dados['id'] = $id;
        $dados['cliente'] = $this->clientesModel->get($id);
        $dados['tipoCliente'] = ClientesModel::$tipoCliente;

        if ($this->input->post() != null) {
            $this->clientesModel->insert_entry($id);
            redirect('clientes', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('clientesModel');
        $this->clientesModel->delete($id);
        redirect('clientes', 'refresh');
    }

}
