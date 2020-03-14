<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Telas extends CI_Controller
{

    public function index($id = null)
    {
        $dados['id'] = $id;
        $this->load->model('TelasModel');
        echo json_encode($this->TelasModel->get_all());
    }
    /*
    public function index($pesquisar = null) {
        $this->load->model('telasModel');
        $dados['telas'] = $this->telasModel->get_all($pesquisar);
        parent::indexview($dados);
    }
*/
    public function create($id = null)
    {
        $this->load->model('telasModel');
        $dados['id'] = $id;
        $dados['tela'] = $this->telasModel->get($id);
        $dados['arvores'] = $this->telasModel->get_arvores();

        if ($this->input->post() != null) {
            $this->telasModel->insert_entry($id);
            redirect('telas', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null)
    {
        $this->load->model('telasModel');
        $this->telasModel->delete($id);
        redirect('telas', 'refresh');
    }
}
