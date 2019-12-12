<?php

class Lancamentos_model extends CI_Model
{

    public $datacadastro;
    public $valor;
    public $tipo;
    public $receitas_despesas_id;
    public $data;
    const TIPO_RECEITA = 1, TIPO_DESPESA = 2;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($id)
    {
        if (!$id) {
            return $this->createEmptyObject();
        }
        $query = $this->db->query("SELECT * FROM lancamentos WHERE id = $id");
        return $query->row();
    }

    public function get_all($pesquisar = null)
    {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('lancamentos');
            $this->db->like("nome", $pesquisar);
            $query = $this->db->get();
        } else {
            $this->db->order_by('tipo');
            $query = $this->db->get('lancamentos');
        }

        return $query->result();
    }

    public function get_all_despesas()
    {
        $this->db->select('*');
        $this->db->from('despesas');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_receitas()
    {
        $this->db->select('*');
        $this->db->from('receitas');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($id)
    {
        $this->datacadastro = Date::getIsoDate();
        $this->valor = Number::numberToFloat($this->input->post('valor'));
        $this->tipo = $this->input->post('tipo');
        if ($this->tipo == self::TIPO_RECEITA) {
            $this->receitas_despesas_id = $this->input->post('receitas_id');
        } else if ($this->tipo == self::TIPO_DESPESA) {
            $this->receitas_despesas_id = $this->input->post('despesas_id');
        }
        $this->data = Date::brToDateIso($this->input->post('data'));
        if ($id) {
            $this->update($id);
            return;
        }
        $this->db->insert('lancamentos', $this);
    }

    public function update($id)
    {
        $this->db->update('lancamentos', $this, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->delete('lancamentos', array('id' => $id));
    }

    public function createEmptyObject()
    {
        $obj = new stdClass();
        foreach (array_keys(get_object_vars($this)) as $property) {
            $obj->$property = null;
        }
        $obj->id = null;
        return $obj;
    }
}
