<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	//Barang
	public function index()
	{
        $data['title']		= 'Data Barang';
		$data['barang']		= $this->M_barang->get_barang()->result_array();
		$this->load->view('barang/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Barang Masuk';
			$this->load->view('barang/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'nama_barang'			=> $data['nama_barang'],
				'harga_beli'		=> $data['harga_beli'],
				'harga_jual'		=> $data['harga_jual'],
				'diskon'			=> $data['diskon'],
				'ppn'				=> $data['ppn'],
				'keterangan'		=> $data['keterangan'],
			];

			
			if ($this->M_barang->insert_barang($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-barang');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('barang');
			}
		}
	}

	public function edit($id_barang)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Barang';
			$data['b']	= $this->M_barang->get_barang_by_id($id_barang);
			$this->load->view('barang/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_barang'			=> $id_barang,
				'nama_barang'			=> $data['nama_barang'],
				'stok'				=> $data['stok'],
				'harga_beli'		=> $data['harga_beli'],
				'harga_jual'		=> $data['harga_jual'],
				'diskon'			=> $data['diskon'],
				'ppn'				=> $data['ppn'],
				'keterangan'		=> $data['keterangan'],
			];

			
			if ($this->M_barang->update_barang($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-barang/'.$id_barang);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('barang');
			}
		}
	}

	public function hapus($id_barang)
	{
	    $data = $this->M_barang->get_barang_by_id($id_barang);
	    $this->M_barang->delete_barang_masuk($data['id_barang_masuk']);
		$this->M_barang->delete_barang($id_barang);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('barang');
	}

	public function data_barang_masuk()
	{
        $data['title']		= 'Data Barang Masuk';
		$data['barang']		= $this->M_barang->get_barang_masuk()->result_array();
		$this->load->view('barang/data_barang_masuk', $data);
	}

	public function tambah_barang_masuk()
	{
		$this->validation_masuk();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Barang Masuk';
			$data['barang']		= $this->M_barang->get_barang()->result_array();
			$this->load->view('barang/tambah_barang_masuk', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'tanggal'			=> $data['tanggal'],
				'id_barang'			=> $data['id_barang'],
				'jumlah'			=> $data['jumlah'],
				'keterangan'		=> $data['keterangan'],
			];
			
			$this->M_barang->insert_barang_masuk($data_user);

			$get_stok = $this->M_barang->get_barang_by_id($data['id_barang']);

			$data_cash	= [
				'tanggal'			=> $data['tanggal'],
				'keterangan'		=> 'Beli '.$get_stok['nama_barang'].' sebanyak '.$data['jumlah'],
				'pengeluaran'		=> $data['jumlah']*$get_stok['harga_beli'],
				'catatan'			=> '-',
			];
			
			$this->M_cash->insert($data_cash);

			$edit_barang = [
				'id_barang'			=> $data['id_barang'],
				'stok'				=> $get_stok['stok'] + $data['jumlah'],
			];
			
			if ($this->M_barang->update_barang($edit_barang)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-barang-masuk');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('barang-masuk');
			}
		}
	}

	public function edit_barang_masuk($id_barang_masuk)
	{
		$this->validation_masuk();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Barang Masuk';
			$data['b']			= $this->M_barang->get_barang_masuk_by_id($id_barang_masuk);
			$data['barang']		= $this->M_barang->get_barang()->result_array();
			$this->load->view('barang/edit_barang_masuk', $data);
		} else {			
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_barang_masuk'	=> $id_barang_masuk,
				'tanggal'			=> $data['tanggal'],
				'id_barang'			=> $data['id_barang'],
				'jumlah'			=> $data['jumlah'],
				'keterangan'		=> $data['keterangan'],
			];
			
			$insert = $this->M_barang->update_barang_masuk($data_user);

			//update stok

			$get_stok_lama = $this->M_barang->get_barang_by_id($data['id_barang_lama']);

			$edit_barang_lama = [
				'id_barang'			=> $data['id_barang_lama'],
				'stok'				=> $get_stok_lama['stok'] - $data['jumlah_lama'],
			];

			$this->M_barang->update_barang($edit_barang_lama);
			
			$get_stok = $this->M_barang->get_barang_by_id($data['id_barang']);

			$edit_barang = [
				'id_barang'			=> $data['id_barang'],
				'stok'				=> $get_stok['stok'] + $data['jumlah'],
			];

			$this->M_barang->update_barang($edit_barang);
			
			if ($insert) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-barang-masuk/'.$id_barang_masuk);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('barang-masuk');
			}
		}
	}

	public function hapus_barang_masuk($id_barang_masuk)
	{
		$bm			= $this->M_barang->get_barang_masuk_by_id($id_barang_masuk);
		$get_stok 	= $this->M_barang->get_barang_by_id($bm['id_barang']);

		$edit_barang = [
			'id_barang'			=> $bm['id_barang'],
			'stok'				=> $get_stok['stok'] - $bm['jumlah'],
		];
			
		$this->M_barang->update_barang($edit_barang);
		$this->M_barang->delete_barang_masuk($id_barang_masuk);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('barang-masuk');
	}

	public function data_barang_keluar()
	{
        $data['title']		= 'Data Penjualan';
		$data['barang']		= $this->M_barang->get_barang_keluar()->result_array();
		$this->load->view('barang/data_barang_keluar', $data);
	}

	public function tambah_barang_keluar()
	{
		$this->validation_keluar();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Penjualan';
			$transaksi = $this->db->select('*')
			->from('penjualan')
			->where("DATE_FORMAT(tanggal, '%Y-%m-%d') =", date('Y-m-d'))
			->get()->num_rows();
			$data['id_penjualan'] = 'T-'.date('ymd').'-'.intval($transaksi+1);
			$data['barang']		= $this->M_barang->get_barang()->result_array();
			$this->load->view('barang/tambah_barang_keluar', $data);
		} else {
			$data		= $this->input->post(null, true);
			$x = count($data['id_barang']);
			$total = 0;
			for ($i=0; $i < $x; $i++) { 
				$barang = $this->M_barang->get_barang_by_id($data['id_barang'][$i]);
				$harga_jual = $barang['harga_jual'];
				$diskon = $data['jumlah'][$i]*($harga_jual * $barang['diskon'] / 100);
				$subtotal = ($data['jumlah'][$i]*$harga_jual) - $diskon;
				$data_penjualan_detail	= [
				    'id_penjualan'   => $data['id_penjualan'],
					'id_barang'			=> $data['id_barang'][$i],
					'jumlah'			=> $data['jumlah'][$i],
					'harga_beli'		=> $barang['harga_beli'],
					'harga_jual'		=> $harga_jual,
					'diskon'			=> $diskon,
					'harga_subtotal'		=> $subtotal,
				];

				$this->M_barang->insert_penjualan_detail($data_penjualan_detail);

				$get_stok = $this->M_barang->get_barang_by_id($data['id_barang'][$i]);

				$edit_barang = [
					'id_barang'			=> $data['id_barang'][$i],
					'stok'				=> $get_stok['stok'] - $data['jumlah'][$i],
				];
				
				$this->M_barang->update_barang($edit_barang);

				$total += $subtotal;
			}
			
			$data_penjualan	= [
			    'id_penjualan'   => $data['id_penjualan'],
				'tanggal'			=> $data['tanggal'],
				'harga_total'		=> $total,
				'keterangan' => $data['keterangan']
			];

			$data_cash	= [
				'tanggal'			=> $data['tanggal'],
				'keterangan'		=> 'Penjualan Item || '.$data['id_penjualan'],
				'pemasukan'		=> $total,
				'catatan'			=> '-',
			];
			
			$this->M_cash->insert($data_cash);
			
			if ($this->M_barang->insert_barang_keluar($data_penjualan)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-barang-keluar');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('detail-barang-keluar/'.$data['id_penjualan']);
			}
		}
	}
	
	public function hapus_barang_keluar($id_barang_keluar)
	{
		$this->M_barang->delete_barang_keluar($id_barang_keluar);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('barang-keluar');
	}

	public function detail_barang_keluar($id_penjualan)
	{
        $data['title']		= 'Data Penjualan';
        $data['id_penjualan'] = $id_penjualan;
        $data['bk']		= $this->M_barang->get_penjualan_by_id($id_penjualan);
		$data['barang']		= $this->M_barang->get_penjualan_detail_by_id_penjualan($id_penjualan)->result_array();
		$this->load->view('barang/detail_barang_keluar', $data);
	}

	public function tambah_detail_barang_keluar($id_penjualan)
	{
		$this->validation_detail_keluar();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Penjualan';
			$data['id_penjualan'] = $id_penjualan;
			$data['barang']		= $this->M_barang->get_barang()->result_array();
			$this->load->view('barang/tambah_detail_barang_keluar', $data);
		} else {
			$data		= $this->input->post(null, true);
			$barang = $this->M_barang->get_barang_by_id($data['id_barang']);
			$trans = $this->M_barang->get_penjualan_by_id($id_penjualan);

			$harga_jual = $barang['harga_jual'];
			$diskon = $data['jumlah']*($harga_jual * $barang['diskon'] / 100);
			$subtotal = ($data['jumlah']*$harga_jual) - $diskon;

			$data_penjualan_detail	= [
				'id_penjualan' => $id_penjualan,
				'id_barang'			=> $data['id_barang'],
				'jumlah'			=> $data['jumlah'],
				'harga_beli'		=> $barang['harga_beli'],
				'harga_jual'		=> $harga_jual,
				'diskon'			=> $diskon,
				'harga_subtotal'		=> $subtotal,
			];

			$update = $this->M_barang->insert_penjualan_detail($data_penjualan_detail);

			$get_stok = $this->M_barang->get_barang_by_id($data['id_barang']);

			$edit_barang = [
				'id_barang'			=> $data['id_barang'],
				'stok'				=> $get_stok['stok'] - $data['jumlah'],
			];
			
			$this->M_barang->update_barang($edit_barang);

			$penjualan = $this->db->select_sum('harga_subtotal')->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->row_array();
			
			$data_penjualan = [
				'id_penjualan' => $id_penjualan,
				'harga_total' => $penjualan['harga_subtotal'],
			];

			$this->M_barang->update_barang_keluar($data_penjualan);

			$data_cash	= [
				'keterangan'		=> 'Penjualan Bolu || '.$id_penjualan,
				'pemasukan'			=> $penjualan['harga_subtotal'],
				'catatan'			=> '-',
			];

			$this->db->like('keterangan', $id_penjualan, 'both');
			$this->db->update('cash', $data_cash);
			
			if ($update) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-detail-barang-keluar/'.$id_penjualan);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('detail-barang-keluar/'.$id_penjualan);
			}
		}
	}

	public function edit_detail_barang_keluar($id_penjualan, $id_penjualan_detail)
	{
		$this->validation_detail_keluar();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Penjualan';
			$data['id_penjualan_detail'] = $id_penjualan_detail;
			$data['id_penjualan'] = $id_penjualan;
			$data['barang']		= $this->M_barang->get_barang()->result_array();
			$data['b']	= $this->M_barang->get_penjualan_detail_by_id($id_penjualan_detail);
			$this->load->view('barang/edit_barang_keluar', $data);
		} else {
			$data		= $this->input->post(null, true);
			$barang = $this->M_barang->get_barang_by_id($data['id_barang']);
			$trans = $this->M_barang->get_penjualan_by_id($id_penjualan);

			$harga_jual = $barang['harga_jual'];

			$diskon = $data['jumlah']*($harga_jual * $barang['diskon'] / 100);
			$subtotal = ($data['jumlah']*$harga_jual) - $diskon;

			$data_penjualan_detail	= [
				'id_penjualan_detail' => $id_penjualan_detail,
				'id_barang'			=> $data['id_barang'],
				'jumlah'			=> $data['jumlah'],
				'harga_beli'		=> $barang['harga_beli'],
				'harga_jual'		=> $harga_jual,
				'diskon'			=> $diskon,
				'harga_subtotal'		=> $subtotal,
			];

			$update = $this->M_barang->update_penjualan_detail($data_penjualan_detail);

			$get_stok_lama = $this->M_barang->get_barang_by_id($data['id_barang_lama']);

			$edit_barang_lama = [
				'id_barang'			=> $data['id_barang_lama'],
				'stok'				=> $get_stok_lama['stok'] + $data['jumlah_lama'],
			];
			
			$this->M_barang->update_barang($edit_barang_lama);

			$get_stok = $this->M_barang->get_barang_by_id($data['id_barang']);

			$edit_barang = [
				'id_barang'			=> $data['id_barang'],
				'stok'				=> $get_stok['stok'] - $data['jumlah'],
			];
			
			$this->M_barang->update_barang($edit_barang);

			$penjualan = $this->db->select_sum('harga_subtotal')->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->row_array();

			$data_penjualan = [
				'id_penjualan' => $id_penjualan,
				'harga_total' => $penjualan['harga_subtotal'],
			];

			$this->M_barang->update_barang_keluar($data_penjualan);

			$data_cash	= [
				'keterangan'		=> 'Penjualan Bolu || '.$id_penjualan,
				'pemasukan'			=> $penjualan['harga_subtotal'],
				'catatan'			=> '-',
			];

			$this->db->like('keterangan', $id_penjualan, 'both');
			$this->db->update('cash', $data_cash);
			
			if ($update) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-detail-barang-keluar/'.$id_penjualan.'/'.$id_penjualan_detail);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('detail-barang-keluar/'.$id_penjualan);
			}
		}
	}

	public function hapus_detail_barang_keluar($id_penjualan, $id_penjualan_detail)
	{
		$penjualan = $this->M_barang->get_penjualan_detail_by_id($id_penjualan_detail);
		$get_stok = $this->M_barang->get_barang_by_id($penjualan['id_barang']);

		$edit_barang = [
			'id_barang'			=> $penjualan['id_barang'],
			'stok'				=> $get_stok['stok'] + $penjualan['jumlah'],
		];
		
		$this->M_barang->update_barang($edit_barang);

		$this->M_barang->delete_penjualan_detail($id_penjualan_detail);

		$penjualan = $this->db->select_sum('harga_subtotal')->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->row_array();

		$data_penjualan = [
			'id_penjualan' => $id_penjualan,
			'harga_total' => $penjualan['harga_subtotal'],
		];

		$this->M_barang->update_barang_keluar($data_penjualan);

		$data_cash	= [
			'keterangan'		=> 'Penjualan Bolu || '.$id_penjualan,
			'pemasukan'			=> $penjualan['harga_subtotal'],
			'catatan'			=> '-',
		];

		$this->db->like('keterangan', $id_penjualan, 'both');
		$this->db->update('cash', $data_cash);

		$this->session->set_flashdata('msg', 'hapus');
		redirect('detail-barang-keluar/'.$id_penjualan);
	}
	
	public function cancel_barang_keluar($id_penjualan)
	{
		$penjualan_detail = $this->M_barang->get_penjualan_detail_by_id_penjualan($id_penjualan)->result_array();

		foreach ($penjualan_detail as $p) {
			$barang = $this->M_barang->get_barang_by_id($p['id_barang']);

			$edit_barang = [
				'id_barang'			=> $p['id_barang'],
				'stok'				=> $barang['stok'] + $p['jumlah'],
			];
			
			$this->M_barang->update_barang($edit_barang);
		}

		$this->db->where('id_penjualan', $id_penjualan);
		$this->db->delete('penjualan_detail');

		$this->M_barang->delete_barang_keluar($id_penjualan);

		$this->db->like('keterangan', $id_penjualan, 'both');
		$this->db->delete('cash');

		redirect('barang-keluar');
	}

	private function validation()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
		$this->form_validation->set_rules('diskon', 'Diskon', 'numeric');
		$this->form_validation->set_rules('ppn', 'PPn', 'numeric');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
	
	}

	private function validation_masuk()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('id_barang', 'Id_barang', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
	
	}

	private function validation_keluar()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('id_barang[]', 'Item', 'required|trim');
		$this->form_validation->set_rules('jumlah[]', 'Jumlah', 'required|numeric');
	}

	private function validation_detail_keluar()
	{
		$this->form_validation->set_rules('id_barang', 'Item', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
	}

	public function print($id_penjualan)
    {
        $bk		= $this->M_barang->get_penjualan_by_id($id_penjualan);
		$barang		= $this->M_barang->get_penjualan_detail_by_id_penjualan($id_penjualan)->result_array();
		// var_dump($bk);
		// echo "<br/>";
		// var_dump($barang);
		// die();

        $this->load->library('escpos');
        $connector = new Escpos\PrintConnectors\WindowsPrintConnector("POS58-2");

        // membuat objek $printer agar dapat di lakukan fungsinya
        $printer = new Escpos\Printer($connector);
        //var_dump($printer);

        function buatBaris4Kolom($kolom1, $kolom2, $kolom3) {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 11;
            $lebar_kolom_2 = 8;
            $lebar_kolom_3 = 10;

            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);

            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);

            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));

            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();

            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ", STR_PAD_LEFT);
                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);

                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3;
            }

            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode($hasilBaris, "\n") . "\n";
        }

        // Membuat judul
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_HEIGHT); // Setting teks menjadi lebih besar
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER); // Setting teks menjadi rata tengah
        $printer->text("Toko Berkah\n");
        $printer->text("Bolu Kukus Siliwangi\n");
        $printer->text("\n");

        // Data transaksi
        $printer->initialize();
        $printer->text("Transaksi : ".$bk['id_penjualan']."\n");
        $printer->text("Tanggal : ".date('d-m-Y', strtotime($bk['tanggal']))."\n");

        // Membuat tabel
        $printer->initialize(); // Reset bentuk/jenis teks
        $printer->text("--------------------------------\n");
        $printer->text(buatBaris4Kolom("Item", "Qty", "Total"));
        $printer->text("--------------------------------\n");
        $total = 0;
        foreach ($barang as $data) {
            $printer->text(buatBaris4Kolom($data['nama_barang'] , $data['jumlah'], number_format($data['harga_subtotal'], 0, ',', '.')));
        }
        
        $printer->text("--------------------------------\n");
        
		$printer->text(str_pad(number_format($bk['harga_total'], 0, ',', '.'), 31, " ", STR_PAD_LEFT));
        $printer->text("\n");

         // Pesan penutup
        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->text("Powered By Toko Berkah\n");

        $printer->feed(5); // mencetak 5 baris kosong agar terangkat (pemotong kertas saya memiliki jarak 5 baris dari toner)
        $printer->close();
        // $data = array(
        //     'group_return' => $group_return,
        //     'detail_return' => $detail_return,
        // );
        // $this->load->view('print_return', $data);
    }
}
