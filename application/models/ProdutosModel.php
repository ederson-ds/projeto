<?php

class ProdutosModel extends CI_Model {

    public $codigo;
    public $nome;
    public $ean;
    public $aquisicao;
    public $customedio;
    public $lucro;
    public static $tipoAquisicao = [
        0 => 'Nacional',
        1 => 'Internacional'
    ];

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM produtos WHERE id = $id");
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
            $this->db->from('produtos');
            $this->db->like("codigo", $pesquisar);
            $this->db->or_like("nome", $pesquisar);
            $this->db->or_like('ean', $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('produtos');
        }

        return $query->result();
    }

    public function insert_entry($id) {
        $this->codigo = $this->input->post('codigo');
        $this->nome = strtoupper($this->input->post('nome'));
        $this->ean = $this->input->post('ean');
        $this->aquisicao = $this->input->post('aquisicao');
        $this->customedio = $this->number->numberToFloat($this->input->post('customedio'));
        $this->lucro = $this->number->numberToFloat($this->input->post('lucro'));
        if ($id) {
            $this->update_entry($id);
            return;
        }
        $this->db->insert('produtos', $this);
    }

    public function update_entry($id) {
        $this->db->update('produtos', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('produtos', array('id' => $id));
    }

}
