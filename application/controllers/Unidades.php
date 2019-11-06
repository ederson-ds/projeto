<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('EmpresasModel');
        $this->load->model('UnidadesModel');
        $dados['empresas'] = $this->EmpresasModel->get_all($pesquisar);
        $dados['unidades'] = $this->UnidadesModel->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('EmpresasModel');
        $this->load->model('UnidadesModel');
        
        $dados['id'] = $id;
        $dados['empresas'] = $this->EmpresasModel->get_all();
        $dados['unidade'] = $this->UnidadesModel->get($id);
        $dados['estadosUF'] = EmpresasModel::$estadosUF;

        if ($this->input->post() != null) {
            $this->UnidadesModel->insert_entry($id);
            redirect('unidades', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('UnidadesModel');
        $this->UnidadesModel->delete($id);
        redirect('unidades', 'refresh');
    }

}
