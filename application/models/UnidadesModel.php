<?php

class UnidadesModel extends CI_Model {

    public $empresa;
    public $nome;
    public $prefixo;
    public $endereco;
    public $cidade;
    public $uf;
    public $cep;
    public $telefone;
    public $celular;
    public $datacadastro;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM unidades WHERE id = $id");
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
            $this->db->from('unidades');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('unidades');
        }

        return $query->result();
    }

    public function insert_entry($id) {
        $this->empresa = $this->input->post('empresa');
        $this->nome = strtoupper($this->input->post('nome'));
        $this->prefixo = strtoupper($this->input->post('prefixo'));
        $this->endereco = strtoupper($this->input->post('endereco'));
        $this->cidade = strtoupper($this->input->post('cidade'));
        $this->uf = $this->input->post('uf');
        $this->cep = $this->input->post('cep');
        $this->telefone = $this->input->post('telefone');
        $this->celular = $this->input->post('celular');
        if ($id) {
            $this->update_entry($id);
            return;
        }
        $this->db->insert('unidades', $this);
    }

    public function update_entry($id) {
        $this->db->update('unidades', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('unidades', array('id' => $id));
    }

}
