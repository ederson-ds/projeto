<?php

class TelasModel extends CI_Model {

    public $nome;
    public $tela;
    public $arvore;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM telas WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('telas');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('telas');
        }

        return $query->result();
    }

    public function get_arvores() {
        $this->db->select('*');
        $this->db->from('telas');
        $this->db->where('tela', null);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_folhas($arvore_id) {
        $this->db->select('*');
        $this->db->from('telas');
        $this->db->where('arvore', $arvore_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function insert_entry($id) {
        $this->nome = $this->input->post('nome');
        if($this->input->post('arvorecheckbox') != 'on') {
            $this->tela = $this->input->post('tela');
            $this->arvore = $this->input->post('arvore');
        }
        if ($id) {
            $this->update_entry($id);
            return;
        }
        $this->db->insert('telas', $this);
    }

    public function update_entry($id) {
        $this->db->update('telas', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('telas', array('id' => $id));
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
