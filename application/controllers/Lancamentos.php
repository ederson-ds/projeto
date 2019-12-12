<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lancamentos extends CI_Controller {

    public function index($pesquisar = null) {
        $this->load->model('lancamentos_model');
        $dados['lancamentos'] = $this->lancamentos_model->get_all($pesquisar);
        parent::indexview($dados);
    }

    public function create($id = null) {
        $this->load->model('lancamentos_model');
        $dados['id'] = $id;
        $dados['lancamento'] = $this->lancamentos_model->get($id);
        $dados['despesas'] = $this->lancamentos_model->get_all_despesas();
        $dados['receitas'] = $this->lancamentos_model->get_all_receitas();

        if ($this->input->post()) {
            $this->lancamentos_model->insert($id);
            redirect('lancamentos', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('lancamentos_model');
        $this->lancamentos_model->delete($id);
        redirect('lancamentos', 'refresh');
    }

}
