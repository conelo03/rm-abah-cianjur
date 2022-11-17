<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Barang Masuk</a></div>
        <div class="breadcrumb-item">Tambah Barang Masuk</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-barang-masuk'); ?>" method="post">
              <div class="card-header">
                <h4>Form Tambah Barang Masuk</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal', date('Y-m-d')); ?>" required="">
                    <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-lg-6 form-group">
                    <label>Pilih Barang</label>
                    <select class="form-control" name="id_barang" id="select-pegawai" data-live-search="true">
                      <option disabled selected>-- Pilih Barang --</option>
                      <?php foreach ($barang as $b):?>
                      <option value="<?= $b['id_barang']?>" <?= set_value('id_barang') == $b['id_barang'] ? 'selected' : '' ; ?> ><?= $b['nama_barang'].' || Stok : '.$b['stok'] ?></option>
                      <?php endforeach;?>
                    </select>
                    <?= form_error('id_barang', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>                
                <div class="row">
                  <div class="col-lg-6 form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="<?= set_value('jumlah'); ?>" required="">
                    <?= form_error('jumlah', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-lg-6 form-group">
                    <label>Keterangan</label>
                    <textarea type="text" name="keterangan" class="form-control" required=""><?= set_value('keterangan'); ?></textarea>
                    <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('barang-masuk');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>