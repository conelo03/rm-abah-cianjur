<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cash extends CI_Model {

	public $table	= 'cash';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('id_cash', 'DESC');
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_cash)
	{
		return $this->db->get_where($this->table, ['id_cash' => $id_cash])->row_array();
	}

	public function get_last()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('id_cash', 'DESC');
        return $this->db->get()->row_array();
	}

	public function update($data)
	{
		$this->db->where('id_cash', $data['id_cash']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_cash)
	{
		$this->db->delete($this->table, ['id_cash' => $id_cash]);
	}
}
