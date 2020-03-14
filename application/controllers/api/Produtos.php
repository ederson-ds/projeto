<?php

class Produtos extends CI_Controller
{

    public function index()
    {
        $this->load->model('ProdutosModel');
        echo json_encode($this->ProdutosModel->get_all());
    }

    public function create($id = null)
    {
        $this->load->model('ProdutosModel');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            echo json_encode($this->ProdutosModel->get($id));
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->ProdutosModel->insert_entry($id);
        }
    }

    public function delete($id = null)
    {
        $this->load->model('ProdutosModel');
        $this->ProdutosModel->delete($id);
    }
}
