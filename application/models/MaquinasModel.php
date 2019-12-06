<?php

class MaquinasModel extends CI_Model {

    public $nome;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM maquinas WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('maquinas');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('maquinas');
        }

        return $query->result();
    }

    public function insert_entry($id) {
        $this->nome = $this->input->post('nome');
        if ($id) {
            $this->update_entry($id);
            return;
        }
        $this->db->insert('maquinas', $this);
    }

    public function update_entry($id) {
        $this->db->update('maquinas', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('maquinas', array('id' => $id));
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
