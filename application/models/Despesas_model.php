<?php

class Despesas_model extends CI_Model {

    public $nome;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM despesas WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('despesas');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('despesas');
        }

        return $query->result();
    }

    public function insert($id) {
        $this->nome = Texto::toUpperCase($this->input->post('nome'));
        if ($id) {
            $this->update($id);
            return;
        }
        $this->db->insert('despesas', $this);
    }

    public function update($id) {
        $this->db->update('despesas', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('despesas', array('id' => $id));
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
