<?php

class ContasAPagarModel extends CI_Model {

    public $data;
    public $valor;
    public $descricao;
    public $status;
    const PAGO = 1, A_PAGAR = 2;
    public static $tipostatus = [
        self::PAGO => 'Pago',
        self::A_PAGAR => 'A Pagar',
    ];

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM contasapagar WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('contasapagar');
            $this->db->like("descricao", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('contasapagar');
        }

        return $query->result();
    }

    public function insert_entry($id) {
        $this->descricao = Texto::toUpperCase($this->input->post('descricao'));
        $this->data = $this->input->post('data'); 
        $this->valor = Number::numberToFloat($this->input->post('valor')); 
        $this->status = $this->input->post('status'); 
        if ($id) {
            $this->update_entry($id);
            return;
        }
        $this->db->insert('contasapagar', $this);
    }

    public function update_entry($id) {
        $this->db->update('contasapagar', $this, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('contasapagar', array('id' => $id));
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
