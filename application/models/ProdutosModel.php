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

    public function getAquisicoes() {
        return self::$tipoAquisicao;
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
        header('Content-type: application/json');
        $data = json_decode(file_get_contents('php://input'),true);
        
        $this->codigo = $data['codigo'];
        $this->nome = strtoupper($data['nome']);
        $this->ean = $data['ean'];
        $this->aquisicao = $data['aquisicao'];
        $this->customedio = $data['customedio'];
        $this->lucro = $data['lucro'];
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
