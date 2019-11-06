<?php

class EmpresasModel extends CI_Model {

    public $nome;
    public $cnpj;
    public $insc;
    public $endereco;
    public $cidade;
    public $uf;
    public $cep;
    public $telefone;
    public $email;
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

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM empresas WHERE id = $id");
        return $query->row();
    }
    
    public function createEmptyObject() {
        $obj = new stdClass();
        foreach (array_keys(get_object_vars($this)) as $property) {
            $obj->$property = null;
        }
        $obj->id = null;
        return $obj;
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('empresas');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('empresas');
        }

        return $query->result();
    }

    public function insert_entry($id) {
        $this->nome = strtoupper($this->input->post('nome'));
        $this->cnpj = $this->input->post('cnpj');
        $this->insc = $this->input->post('insc');
        $this->endereco = strtoupper($this->input->post('endereco'));
        $this->cidade = strtoupper($this->input->post('cidade'));
        $this->uf = $this->input->post('uf');
        $this->cep = $this->input->post('cep');
        $this->telefone = $this->input->post('telefone');
        $this->email = $this->input->post('email');
        if ($id) {
            $this->update_entry($id);
            return;
        }
        $this->db->insert('empresas', $this);
    }

    public function update_entry($id) {
        $this->db->update('empresas', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('empresas', array('id' => $id));
    }

}
