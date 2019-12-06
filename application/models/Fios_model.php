<?php

class Fios_model extends CI_Model {

    public $nome;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM fios WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('fios');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('fios');
        }

        return $query->result();
    }

    public function insert($id) {
        $this->nome = $this->input->post('nome');
        if ($id) {
            $this->update($id);
            return;
        }
        $this->db->insert('fios', $this);
    }

    public function update($id) {
        $this->db->update('fios', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('fios', array('id' => $id));
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
