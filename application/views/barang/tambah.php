<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Barang</a></div>
        <div class="breadcrumb-item">Tambah Barang</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-barang'); ?>" method="post">
              <div class="card-header">
                <h4>Form Tambah Barang</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Bolu</label>
                  <input type="text" name="nama_bolu" class="form-control" value="<?= set_value('nama_bolu'); ?>" required="">
                  <?= form_error('nama_bolu', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Harga Beli</label>
                  <input type="number" name="harga_beli" class="form-control" value="<?= set_value('harga_beli'); ?>" required="">
                  <?= form_error('harga_beli', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="number" name="harga_jual" class="form-control" value="<?= set_value('harga_jual'); ?>" required="">
                  <?= form_error('harga_jual', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Harga Jual (Reseller Cash)</label>
                  <input type="number" name="harga_jual_reseller_cash" class="form-control" value="<?= set_value('harga_jual_reseller_cash'); ?>" required="">
                  <?= form_error('harga_jual_reseller_cash', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Harga Jual (Reseller Tempo)</label>
                  <input type="number" name="harga_jual_reseller_tempo" class="form-control" value="<?= set_value('harga_jual_reseller_tempo'); ?>" required="">
                  <?= form_error('harga_jual_reseller_tempo', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Diskon (%)</label>
                  <input type="number" name="diskon" class="form-control" value="<?= set_value('diskon', 0); ?>" required="">
                  <?= form_error('diskon', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>PPn (%)</label>
                  <input type="number" name="ppn" class="form-control" value="<?= set_value('ppn', 0); ?>" required="">
                  <?= form_error('ppn', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea type="text" name="keterangan" class="form-control" required=""><?= set_value('keterangan'); ?></textarea>
                  <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('barang');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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