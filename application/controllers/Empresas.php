<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('EmpresasModel');
        $dados['empresas'] = $this->EmpresasModel->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('EmpresasModel');
        $dados['id'] = $id;
        $dados['empresa'] = $this->EmpresasModel->get($id);
        $dados['estadosUF'] = EmpresasModel::$estadosUF;

        if ($this->input->post() != null) {
            $this->EmpresasModel->insert_entry($id);
            redirect('empresas', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('EmpresasModel');
        $this->EmpresasModel->delete($id);
        redirect('empresas', 'refresh');
    }

}
