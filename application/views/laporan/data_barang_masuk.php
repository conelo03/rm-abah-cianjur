<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Laporan Barang Masuk</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Barang Masuk</h4>
              <div class="card-header-action">
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-jabatan">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tanggal Masuk</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Biaya</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($barang as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= date('d F Y', strtotime($u['tanggal']));?></td>
                      <td><?= $u['nama_bolu'];?></td>
                      <td><?= $u['jumlah'];?></td>
                      <td><?= 'Rp '.number_format($u['jumlah']*$u['harga_beli'], 2, ',', '.');?></td>
                      <td><?= $u['keterangan'];?></td>
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