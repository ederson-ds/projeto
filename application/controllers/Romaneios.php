<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Romaneios extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('Romaneios_model');
        $this->load->model('clientesModel');
        $dados['romaneios'] = $this->Romaneios_model->get_all($pesquisar);
        $dados['clientes'] = $this->clientesModel->get_all();
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('Romaneios_model');
        $this->load->model('clientesModel');
        $this->load->model('MaquinasModel');
        $dados['id'] = $id;
        $dados['romaneio'] = $this->Romaneios_model->get($id);
        $dados['clientes'] = $this->clientesModel->get_all();
        $dados['maquinas'] = $this->MaquinasModel->get_all();
        $dados['itensromaneio'] = $this->Romaneios_model->get_itemromaneio_by_romaneios_id($id);

        if ($this->input->post() != null) {
            $this->Romaneios_model->insert($id);
            redirect('romaneios', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('Romaneios_model');
        $this->Romaneios_model->delete($id);
        redirect('romaneios', 'refresh');
    }

}
