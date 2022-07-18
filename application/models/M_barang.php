<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function get_barang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->order_by('id_barang', 'DESC');
        return $this->db->get();
	}

	public function get_barang_masuk()
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join('barang','barang.id_barang = barang_masuk.id_barang');
		$this->db->order_by('id_barang_masuk', 'DESC');
        return $this->db->get();
	}

	public function get_barang_keluar()
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->order_by('id_penjualan', 'DESC');
        return $this->db->get();
	}

	public function get_bulan()
	{
		$this->db->select('*, DATE_FORMAT(`penjualan`.`tanggal`, "%M %Y") `myformat`');
		$this->db->from('penjualan');
		$this->db->order_by('id_penjualan', 'ASC');
		$this->db->group_by("MONTH(`penjualan`.`tanggal`)");
        return $this->db->get();
	}

	public function get_barang_keluar_group_date($bulan)
	{
		$this->db->select('*, penjualan_detail.harga_jual, penjualan_detail.harga_beli');
		$this->db->from('penjualan');
		$this->db->join('penjualan_detail', 'penjualan_detail.id_penjualan=penjualan.id_penjualan');
		$this->db->join('barang', 'barang.id_barang=penjualan_detail.id_barang');
		$this->db->order_by('penjualan.id_penjualan', 'ASC');
		$this->db->where("DATE_FORMAT(penjualan.tanggal, '%Y-%m') =", $bulan);
        return $this->db->get();
	}

	public function get_barang_keluar_group()
	{
		$this->db->select('*, penjualan_detail.harga_jual, penjualan_detail.harga_beli');
		$this->db->from('penjualan');
		$this->db->join('penjualan_detail', 'penjualan_detail.id_penjualan=penjualan.id_penjualan');
		$this->db->join('barang', 'barang.id_barang=penjualan_detail.id_barang');
		$this->db->order_by('penjualan.id_penjualan', 'ASC');
        return $this->db->get();
	}

	public function get_barang_by_id($id_barang)
	{
		return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
	}

	public function get_barang_masuk_by_id($id_barang_masuk)
	{
		return $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id_barang_masuk])->row_array();
	}

	public function get_penjualan_by_id($id_penjualan)
	{
		return $this->db->get_where('penjualan', ['id_penjualan' => $id_penjualan])->row_array();
	}

	public function get_penjualan_detail_by_id_penjualan($id_penjualan)
	{
		$this->db->select('*, penjualan_detail.diskon, penjualan_detail.harga_jual');
		$this->db->from('penjualan_detail');
		$this->db->join('barang','barang.id_barang = penjualan_detail.id_barang');
		$this->db->where("id_penjualan", $id_penjualan);
        return $this->db->get();
	}

	public function get_penjualan_detail_by_id($id_penjualan_detail)
	{
		return $this->db->get_where('penjualan_detail', ['id_penjualan_detail' => $id_penjualan_detail])->row_array();
	}

	public function insert_barang($data)
	{
		$this->db->insert('barang', $data);
	}

	public function insert_barang_masuk($data)
	{
		$this->db->insert('barang_masuk', $data);
	}

	public function insert_barang_keluar($data)
	{
		$this->db->insert('penjualan', $data);
	}

	public function insert_penjualan_detail($data)
	{
		$this->db->insert('penjualan_detail', $data);
	}

	public function update_barang($data)
	{
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->update('barang', $data);
	}

	public function update_barang_masuk($data)
	{
		$this->db->where('id_barang_masuk', $data['id_barang_masuk']);
		$this->db->update('barang_masuk', $data);
	}

	public function update_barang_keluar($data)
	{
		$this->db->where('id_penjualan', $data['id_penjualan']);
		$this->db->update('penjualan', $data);
	}

	public function update_penjualan_detail($data)
	{
		$this->db->where('id_penjualan_detail', $data['id_penjualan_detail']);
		$this->db->update('penjualan_detail', $data);
	}

	public function delete_barang($id_barang)
	{
		$this->db->delete('barang', ['id_barang' => $id_barang]);
	}

	public function delete_barang_masuk($id_barang_masuk)
	{
		$this->db->delete('barang_masuk', ['id_barang_masuk' => $id_barang_masuk]);
	}

	public function delete_penjualan_detail($id_penjualan_detail)
	{
		$this->db->delete('penjualan_detail', ['id_penjualan_detail' => $id_penjualan_detail]);
	}

	public function delete_barang_keluar($id_penjualan)
	{
		$this->db->delete('penjualan', ['id_penjualan' => $id_penjualan]);
	}
}
