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
        $dompdf = new Dompdf();
        $dompdf->loadHtml('
        <table style="width:100%">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Age</th>
            </tr>
            <tr>
                <td>Jill</td>
                <td>Smith</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td>
                <td>94</td>
            </tr>
            </table>
        ');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
    }
}
