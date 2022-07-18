<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Barang</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Barang</h4>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-barang');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
              
            </div>
            
            <div class="card-body">
              <!-- <div class="row">
                  <div class="col-4"><h6>Total Assets</h6></div>
                  <div class="col-8">: <?= 'Rp '.number_format($total_assets, 2, ',', '.'); ?></div>
                  <div class="col-4"><h6>Total Stok</h6></div>
                  <div class="col-8">: <?= $jml_barang ?> Unit</div>
              </div> -->
                
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-jabatan">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Nama Bolu</th>
                      <th>Stok</th>
                      <th>Harga Beli</th>
                      <th colspan="2" class="text-center">Harga Jual</th>
                      <th>Diskon</th>
                      <th>PPN</th>
                      <th>Keterangan</th>
                      <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($barang as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['nama_bolu'];?></td>
                      <td><?= $u['stok'];?></td>
                      <td><?= 'Rp '.number_format($u['harga_beli'], 2, ',', '.');?></td>
                      <td>
                        Toko <br>
                        Reseller (Cash)<br>
                        Reseller (Tempo) 
                      </td>
                      <td>
                        : <?= 'Rp '.number_format($u['harga_jual'], 2, ',', '.');?><br>
                        : <?= 'Rp '.number_format($u['harga_jual_reseller_cash'], 2, ',', '.');?><br>
                        : <?= 'Rp '.number_format($u['harga_jual_reseller_tempo'], 2, ',', '.');?>
                      </td>
                      <td><?= $u['diskon'];?> %</td>
                      <td><?= $u['ppn'];?> %</td>
                      <td><?= $u['keterangan'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('edit-barang/'.$u['id_barang']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-barang/'.$u['id_barang']); ?>';"><i class="fa fa-trash"></i> Delete</button>
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