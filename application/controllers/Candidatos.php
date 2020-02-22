<?php

class Candidatos extends CI_Controller
{

    public function index($pesquisar = null)
    {
        $this->load->model('Romaneios_model');
        $this->load->model('clientesModel');
        $dados['romaneios'] = $this->Romaneios_model->get_all($pesquisar);
        $dados['clientes'] = $this->clientesModel->get_all();
        parent::indexview($dados);
    }

    public function create($id = null)
    {
        $this->load->model('Candidatos_model');
        $dados['id'] = $id;
        $dados['orgaoExpedidorList'] = Candidatos_model::$orgaoExpedidorList;
        $dados['EstadosList'] = Candidatos_model::$estadosUF;
        $dados['sexoList'] = Candidatos_model::$sexoList;
        $dados['candidato'] = $this->Candidatos_model->get($id);

        if ($this->input->post() != null) {
            $this->Romaneios_model->insert($id);
            redirect('romaneios', 'refresh');
        }
        parent::createview($dados);
    }

    public function delete($id = null)
    {
        $this->load->model('Romaneios_model');
        $this->Romaneios_model->delete($id);
        redirect('romaneios', 'refresh');
    }
}
