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
    public $nis;
    public $telefone;
    public $negropardo;
    public $celular;
    public $deficiente;
    public $email;
    public $cargo;
    public $senha;
    public $jurado;
    public static $juradoList = [
        0 => 'Sim',
        1 => 'Não'
    ];
    public static $deficienteList = [
        0 => 'Sim',
        1 => 'Não'
    ];
    public static $negropardoList = [
        0 => 'Negro',
        1 => 'Pardo'
    ];
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

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($id)
    {
        header('Content-type: application/json');
        $data = json_decode(file_get_contents('php://input'),true);

        $this->nome = $data['nome'];
        $this->cep = $data['cep'];
        $this->cpf = $data['cpf'];
        $this->logradouro = $data['logradouro'];
        $this->identidade = $data['identidade'];
        $this->num = $data['num'];
        $this->orgaoexpedidor = $data['orgaoexpedidor'];
        $this->estado = $data['estado'];
        $this->dataexpedicao = $data['dataexpedicao'];
        $this->cidade = $data['cidade'];
        $this->nomemae = $data['nomemae'];
        $this->bairro = $data['bairro'];
        $this->sexo = $data['sexo'];
        $this->complemento = $data['complemento'];
        $this->datanasc = $data['datanasc'];
        if ($id) {
            $this->update($id);
            return;
        }
        $this->db->insert('candidatos', $this);
    }

    public function get($id)
    {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM candidatos WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null)
    {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('candidatos');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('candidatos');
        }

        return $query->result();
    }

    public function get_itemromaneio_by_candidatos_id($candidatos_id)
    {
        $this->db->select('*');
        $this->db->from('itemromaneio');
        $this->db->where("candidatos_id", $candidatos_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_itemromaneio_num_pecas($candidatos_id)
    {
        $this->db->select('count(1) as cont');
        $this->db->from('itemromaneio');
        $this->db->where("candidatos_id", $candidatos_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_itemromaneio_total_kg($candidatos_id)
    {
        $this->db->select('sum(peso) as total_kg');
        $this->db->from('itemromaneio');
        $this->db->where("candidatos_id", $candidatos_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_max_id()
    {
        $this->db->select('max(id) + 1 as max_id');
        $this->db->from('candidatos');
        $query = $this->db->get();

        return $query->row();
    }

    public function insert_itemromaneio($candidatos_id)
    {
        $pecas = $this->input->post('num_peca');
        foreach ($pecas as $i => $peca) {
            if ($this->input->post('peso')[$i] == '') {
                return;
            }
            $this->db->set('candidatos_id', $candidatos_id);
            $this->db->set('num_peca', $this->input->post('num_peca')[$i]);
            $this->db->set('maquinas_id', $this->input->post('maquinas_id')[$i]);
            $this->db->set('peso', Number::numberToFloat($this->input->post('peso')[$i]));
            $this->db->insert('itemromaneio');
        }
    }

    public function update($id)
    {
        $this->db->update('candidatos', $this, array('id' => $id));
    }

    public function delete($id)
    {
        $this->delete_itemromaneio_by_candidatos_id($id);
        $this->db->delete('candidatos', array('id' => $id));
    }

    public function delete_itemromaneio_by_candidatos_id($candidatos_id)
    {
        $this->db->delete('itemromaneio', array('candidatos_id' => $candidatos_id));
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
