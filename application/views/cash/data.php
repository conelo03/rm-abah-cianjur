<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Cash</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Cash</h4>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-cash');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            
            <div class="card-body">
              <div class="row">
                  <div class="col-4"><h6>Total Pemasukan</h6></div>
                  <div class="col-8">: <?= 'Rp '.number_format($pemasukan, 2, ',', '.'); ?></div>
                  <div class="col-4"><h6>Total Pengeluaran</h6></div>
                  <div class="col-8">: <?= 'Rp '.number_format($pengeluaran, 2, ',', '.'); ?></div>
                  <div class="col-4"><h6>Saldo Terakhir</h6></div>
                  <div class="col-8">: <?= 'Rp '.number_format($saldo, 2, ',', '.'); ?></div>
              </div>
                
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-jabatan">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tanggal</th>
                      <th>Keterangan</th>
                      <th>Pemasukan</th>
                      <th>Pengeluaran</th>
                      <th>Catatan</th>
                      <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($cash as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['tanggal'];?></td>
                      <td><?= $u['keterangan'];?></td>
                      <td><?= 'Rp '.number_format($u['pemasukan'], 2, ',', '.');?></td>
                      <td><?= 'Rp '.number_format($u['pengeluaran'], 2, ',', '.');?></td>
                      <td><?= $u['catatan'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('edit-cash/'.$u['id_cash']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-cash/'.$u['id_cash']); ?>';"><i class="fa fa-trash"></i> Delete</button>
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