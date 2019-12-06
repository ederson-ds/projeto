<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fios extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('Fios_model');
        $dados['fios'] = $this->Fios_model->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('Fios_model');
        $dados['id'] = $id;
        $dados['fio'] = $this->Fios_model->get($id);

        if ($this->input->post() != null) {
            $this->Fios_model->insert($id);
            redirect('fios', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('Fios_model');
        $this->Fios_model->delete($id);
        redirect('fios', 'refresh');
    }

}
