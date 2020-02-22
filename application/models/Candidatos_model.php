<?php

class Candidatos_model extends CI_Model
{

    public $nome;
    public $cep;
    public $cpf;
    public $logradouro;
    public $identidade;
    public $num;
    public $orgaoexpedidor;
    public $estado;
    public $dataexpedicao;
    public $cidade;
    public $nomemae;
    public $bairro;
    public $sexo;
    public $complemento;
    public $datanasc;
    public static $orgaoExpedidorList = [
        0 => 'SSP/UF',
        1 => 'Cartório Civil',
        2 => 'Polícia Federal',
        3 => 'DETRAN'
    ];
    public static $estadosUF = [
        0 => 'Acre',
        1 => 'Alagoas',
        2 => 'Amapá',
        3 => 'Amazonas',
        4 => 'Bahia',
        5 => 'Ceará',
        6 => 'Distrito Federal',
        7 => 'Espírito Santo',
        8 => 'Goiás',
        9 => 'Maranhão',
        10 => 'Mato Grosso',
        11 => 'Mato Grosso do Sul',
        12 => 'Minas Gerais',
        13 => 'Pará',
        14 => 'Paraíba',
        15 => 'Paraná',
        16 => 'Pernambuco',
        17 => 'Piauí',
        18 => 'Rio de Janeiro',
        19 => 'Rio Grande do Norte',
        20 => 'Rio Grande do Sul',
        21 => 'Rondônia',
        22 => 'Roraima',
        23 => 'Santa Catarina',
        24 => 'São Paulo',
        25 => 'Sergipe',
        26 => 'Tocantins'
    ];
    public static $sexoList = [
        0 => 'Masculino',
        1 => 'Feminino'
    ];

    public $clientes_id;
    public $tecidos_id;
    public $tamanho_maquina;
    public $gramatura;
    public $fios_id;
    public $info_adicionais;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($id)
    {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM romaneios WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null)
    {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('romaneios');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('romaneios');
        }

        return $query->result();
    }

    public function get_itemromaneio_by_romaneios_id($romaneios_id)
    {
        $this->db->select('*');
        $this->db->from('itemromaneio');
        $this->db->where("romaneios_id", $romaneios_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_itemromaneio_num_pecas($romaneios_id)
    {
        $this->db->select('count(1) as cont');
        $this->db->from('itemromaneio');
        $this->db->where("romaneios_id", $romaneios_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_itemromaneio_total_kg($romaneios_id)
    {
        $this->db->select('sum(peso) as total_kg');
        $this->db->from('itemromaneio');
        $this->db->where("romaneios_id", $romaneios_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_max_id()
    {
        $this->db->select('max(id) + 1 as max_id');
        $this->db->from('romaneios');
        $query = $this->db->get();

        return $query->row();
    }

    public function insert($id)
    {
        $this->nome = $this->input->post('nome');
        $this->clientes_id = $this->input->post('clientes_id');
        $this->tecidos_id = $this->input->post('tecidos_id');
        $this->tamanho_maquina = $this->input->post('tamanho_maquina');
        $this->gramatura = $this->input->post('gramatura');
        $this->fios_id = $this->input->post('fios_id');
        $this->info_adicionais = $this->input->post('info_adicionais');
        if ($id) {
            $this->update($id);
            return;
        }
        $this->db->insert('romaneios', $this);

        $romaneios_id = $this->db->insert_id();
        $this->insert_itemromaneio($romaneios_id);
    }

    public function insert_itemromaneio($romaneios_id)
    {
        $pecas = $this->input->post('num_peca');
        foreach ($pecas as $i => $peca) {
            if ($this->input->post('peso')[$i] == '') {
                return;
            }
            $this->db->set('romaneios_id', $romaneios_id);
            $this->db->set('num_peca', $this->input->post('num_peca')[$i]);
            $this->db->set('maquinas_id', $this->input->post('maquinas_id')[$i]);
            $this->db->set('peso', Number::numberToFloat($this->input->post('peso')[$i]));
            $this->db->insert('itemromaneio');
        }
    }

    public function update($id)
    {
        $this->db->update('romaneios', $this, array('id' => $id));

        $this->delete_itemromaneio_by_romaneios_id($id);
        $this->insert_itemromaneio($id);
    }

    public function delete($id)
    {
        $this->delete_itemromaneio_by_romaneios_id($id);
        $this->db->delete('romaneios', array('id' => $id));
    }

    public function delete_itemromaneio_by_romaneios_id($romaneios_id)
    {
        $this->db->delete('itemromaneio', array('romaneios_id' => $romaneios_id));
    }

    public function createEmptyObject()
    {
        $obj = new stdClass();
        foreach (array_keys(get_object_vars($this)) as $property) {
            $obj->$property = null;
        }
        $obj->id = null;
        return $obj;
    }
}
