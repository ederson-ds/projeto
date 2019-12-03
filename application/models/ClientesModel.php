<?php

class ClientesModel extends CI_Model {

    public $tipo;
    public $nomefantasia;
    public $razaosocial;
    public $email;
    public $cpf;
    public $cnpj;
    public $inscricao_estadual;
    public $status;
    const PESSOA_FISICA = 1, PESSOA_JURIDICA = 2;
    public static $tipoCliente = [
        self::PESSOA_FISICA => 'Pessoa Física',
        self::PESSOA_JURIDICA => 'Pessoa Jurídica',
    ];

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM clientes WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('clientes');
            $this->db->like("nomefantasia", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('clientes');
        }

        return $query->result();
    }

    public function insert_entry($id) {
        $this->tipo = $this->input->post('tipo');
        $this->nomefantasia = Texto::toUpperCase($this->input->post('nomefantasia'));
        $this->email = $this->input->post('email'); 
        $this->razaosocial = Texto::toUpperCase($this->input->post('razaosocial'));
        $this->cpf = $this->input->post('cpf'); 
        $this->cnpj = $this->input->post('cnpj'); 
        $this->inscricao_estadual = $this->input->post('inscricao_estadual');  
        $this->status = ($this->input->post('status') == 'on' ? 1 : 0);
        if ($id) {
            $this->update_entry($id);
            return;
        }
        $this->db->insert('clientes', $this);
    }

    public function update_entry($id) {
        $this->db->update('clientes', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('clientes', array('id' => $id));
    }

    public function createEmptyObject() {
        $obj = new stdClass();
        foreach (array_keys(get_object_vars($this)) as $property) {
            $obj->$property = null;
        }
        $obj->id = null;
        return $obj;
    }

}
