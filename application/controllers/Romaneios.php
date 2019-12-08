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
        $this->load->model('tecidos_model');
        $this->load->model('fios_model');
        $dados['id'] = $id;
        $dados['romaneio'] = $this->Romaneios_model->get($id);
        $dados['clientes'] = $this->clientesModel->get_all();
        $dados['maquinas'] = $this->MaquinasModel->get_all();
        $dados['itensromaneio'] = $this->Romaneios_model->get_itemromaneio_by_romaneios_id($id);
        $dados['tecidos'] = $this->tecidos_model->get_all();
        $dados['fios'] = $this->fios_model->get_all();
        $dados['max_id'] = $this->Romaneios_model->get_max_id()->max_id;

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
        $this->load->model('tecidos_model');
        $this->load->model('fios_model');
        $romaneio = $this->Romaneios_model->get($romaneios_id);
        $itensromaneio = $this->Romaneios_model->get_itemromaneio_by_romaneios_id($romaneios_id);
        $cliente = $this->clientesModel->get($romaneio->clientes_id);
        $totalKg = $this->Romaneios_model->get_itemromaneio_total_kg($romaneios_id);
        $totalPecas = $this->Romaneios_model->get_itemromaneio_num_pecas($romaneios_id);
        $tecido = $this->tecidos_model->get($romaneio->tecidos_id);
        $fio = $this->fios_model->get($romaneio->fios_id);

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
            <div style="width: 100%;">
                <div style="display: inline-block;">
                    <h4>CLIENTE: ' . $cliente->nomefantasia . '</h4>
                </div>
                <div style="display: inline-block;float: right;">
                    <b>' . $romaneio->nome . '</b><br>
                    <b>Nº</b> ' . $romaneio->id . '
                </div>
            </div>

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
        <br>
        <table style="width:100%">
            <tr style="text-align: center;">
                <th style="width: 5%;"></th>
                <th style="width: 15%;"><b>Tecido</b></th>
                <th><b>Tam. Maq.</b></th>
                <th><b>Peças</b></th>
                <th><b>kg</b></th>
                <th><b>Fio</b></th>
                <th><b>Informações Adicionais</b></th>
            </tr>
            <tr style="text-align: center;">
                <td></td>
                <td>' . $tecido->nome . '</td>
                <td>' . $romaneio->tamanho_maquina . '</td>
                <td>' . $totalPecas[0]->cont . '</td>
                <td>' . Number::floatToNumber($totalKg[0]->total_kg) . '</td>
                <td>' . $fio->nome . '</td>
                <td>' . $romaneio->info_adicionais . '</td>
            </tr>
        </table>
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
