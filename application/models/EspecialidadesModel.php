<?php

class EspecialidadesModel extends CI_Model {

    public $nome;
    public $datacadastro;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM especialidades WHERE id = $id");
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
            $this->db->from('especialidades');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('especialidades');
        }

        return $query->result();
    }

    public function insert_entry($id) {
        $this->nome = strtoupper($this->input->post('nome'));
        if ($id) {
            $this->update_entry($id);
            return;
        }
        $this->db->insert('especialidades', $this);
    }

    public function update_entry($id) {
        $this->db->update('especialidades', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('especialidades', array('id' => $id));
    }

}
