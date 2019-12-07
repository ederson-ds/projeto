<?php

require_once 'plugins/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Romaneios extends CI_Controller
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

    public function delete($id = null)
    {
        $this->load->model('Romaneios_model');
        $this->Romaneios_model->delete($id);
        redirect('romaneios', 'refresh');
    }

    public function pdf($romaneios_id)
    {
        $this->load->model('Romaneios_model');
        $this->load->model('clientesModel');
        $this->load->model('maquinasModel');
        $romaneio = $this->Romaneios_model->get($romaneios_id);
        $itensromaneio = $this->Romaneios_model->get_itemromaneio_by_romaneios_id($romaneios_id);
        $cliente = $this->clientesModel->get($romaneio->clientes_id);
        $totalKg = $this->Romaneios_model->get_itemromaneio_total_kg($romaneios_id);
        $totalPecas = $this->Romaneios_model->get_itemromaneio_num_pecas($romaneios_id);

        $html = '
            <style>
                table {
                    border-collapse: collapse;
                }

                table,
                th,
                td {
                    border: 1px solid black;
                }

                body {
                    font-family: "Helvetica"
                }
            </style>
            <h4><b>CLIENTE: ' . $cliente->nomefantasia . '</b></h4>
            <table style="width:100%">
                <tr style="text-align: center;">
                    <th style="width: 5%;"></th>
                    <th style="width: 15%;"><b>Nº</b></th>
                    <th><b>MAQ.</b></th>
                    <th><b>kg.</b></th>
                </tr>';

        foreach ($itensromaneio as $i => $itemromaneio) {
            $html .= '<tr style="text-align: center;">
                <td>' . ($i + 1) . '</td>
                <td>' . $itemromaneio->num_peca . '</td>
                <td><b>' . $this->maquinasModel->get($itemromaneio->maquinas_id)->nome . '</b></td>
                <td>' . Number::floatToNumber($itemromaneio->peso) . '</td>
            </tr>';
        }

        $html .= '</table>
        <h4><b>Total de Peças: </b>' . $totalPecas[0]->cont . '</h4>
        <h4><b>Total Kg: </b>' . Number::floatToNumber($totalKg[0]->total_kg) . '</h4>
        ';


        $dompdf = new Dompdf();
        //$dompdf->loadHtml(file_get_contents('plugins/dompdf/examples/romaneio.php'));
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
    }
}
