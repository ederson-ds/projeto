<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        /*$this->load->model('ProdutosModel');
        $dados['produtos'] = $this->ProdutosModel->get_all($pesquisar);
        parent::indexview($dados);*/

        //echo parent::login();

        $this->load->helper('html');

        $this->load->view("login/login");

    }

    public function create($id = null) {
        $this->load->model('ProdutosModel');
        $dados['id'] = $id;
        $dados['produto'] = $this->ProdutosModel->get($id);
        $dados['tipoAquisicao'] = ProdutosModel::$tipoAquisicao;

        if ($this->input->post() != null) {
            $this->ProdutosModel->insert_entry($id);
            redirect('produtos', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null) {
        $this->load->model('ProdutosModel');
        $this->ProdutosModel->delete($id);
        redirect('produtos', 'refresh');
    }

}
