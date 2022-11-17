<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Detail Penjualan</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Detail Penjualan</h4>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-detail-barang-keluar/'.$id_penjualan);?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-4"><h6>Transaksi</h6></div>
                  <div class="col-8">: <?= $bk['id_penjualan']; ?></div>
                  <div class="col-4"><h6>Tanggal</h6></div>
                  <div class="col-8">: <?= date('d F Y', strtotime($bk['tanggal'])); ?></div>
                  <div class="col-4"><h6>Total Harga</h6></div>
                  <div class="col-8">: <?= 'Rp '.number_format($bk['harga_total'], 2, ',', '.'); ?></div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-jabatan">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Nama Item</th>
                      <th>Jumlah</th>
                      <th>Subtotal</th>
                      <th>Diskon</th>
                      <th>Total</th>
                      <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($barang as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['nama_barang'];?></td>
                      <td><?= $u['jumlah'];?></td>
                      <td><?= 'Rp '.number_format($u['jumlah']*$u['harga_jual'], 2, ',', '.');?></td>
                      <td><?= 'Rp '.number_format($u['diskon'], 2, ',', '.');?></td>
                      <td><?= 'Rp '.number_format($u['harga_subtotal'], 2, ',', '.');?></td>
                      <td class="text-center">
                        <a href="<?= base_url('edit-detail-barang-keluar/'.$id_penjualan.'/'.$u['id_penjualan_detail']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-detail-barang-keluar/'.$id_penjualan.'/'.$u['id_penjualan_detail']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <a href="<?= base_url('barang-keluar');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>