<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tecidos extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('Tecidos_model');
        $dados['tecidos'] = $this->Tecidos_model->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('Tecidos_model');
        $dados['id'] = $id;
        $dados['tecido'] = $this->Tecidos_model->get($id);

        if ($this->input->post() != null) {
            $this->Tecidos_model->insert($id);
            redirect('tecidos', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('Tecidos_model');
        $this->Tecidos_model->delete($id);
        redirect('tecidos', 'refresh');
    }

}
