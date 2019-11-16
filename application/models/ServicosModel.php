<?php

class ServicosModel extends CI_Model {

    public $unidade;
    public $nome;
    public $especialidade;
    public $valor;
    public $valorcusto;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM servicos WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('servicos');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('servicos');
        }

        return $query->result();
    }

    public function insert_entry($id) {
        $this->unidade = $this->input->post('unidade');
        $this->nome = Texto::toUpperCase($this->input->post('nome'));
        $this->especialidade = $this->input->post('especialidade');
        $this->valor = Number::numberToFloat($this->input->post('valor'));
        $this->valorcusto = Number::numberToFloat($this->input->post('valorcusto'));
        if ($id) {
            $this->update_entry($id);
            return;
        }
        $this->db->insert('servicos', $this);
    }

    public function update_entry($id) {
        $this->db->update('servicos', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('servicos', array('id' => $id));
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
