
<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Penjualan</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Penjualan</h4>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-barang-keluar');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-jabatan">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>ID Transaksi</th>
                      <th>Tanggal</th>
                      <th>Total Harga</th>
                      <th>Keterangan</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($barang as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['id_penjualan'];?></td>
                      <td><?= date('d F Y', strtotime($u['tanggal']));?></td>
                      <td><?= 'Rp '.number_format($u['harga_total'], 2, ',', '.');?></td>
                      <td><?= $u['keterangan'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('detail-barang-keluar/'.$u['id_penjualan']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
                        <a href="<?= base_url('cetak-barang-keluar/'.$u['id_penjualan']);?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin membatalkan transaksi ini?|Data yang sudah dicancel akan kembali ke Stok Barang." data-confirm-yes="document.location.href='<?= base_url('cancel-barang-keluar/'.$u['id_penjualan']); ?>';"><i class="fa fa-times"></i> Cancel</button>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>