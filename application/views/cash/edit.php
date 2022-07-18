<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Cash</a></div>
        <div class="breadcrumb-item">Edit Cash</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-cash/'. $id_cash); ?>" method="post">
              <div class="card-header">
                <h4>Form Edit cash</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal', $cash['tanggal']); ?>" required="">
                  <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan', $cash['keterangan']); ?>" required="">
                  <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Pilih jenis</label>
                  <select class="form-control" name="jenis" id="select-pegawai" data-live-search="false">
                    <option disabled selected>-- Pilih Jenis --</option>
                    <option value="pemasukan" <?= $cash['pemasukan'] != null ? 'selected' : '';?> >Pemasukan</option>
                    <option value="pengeluaran" <?= $cash['pengeluaran'] != null ? 'selected' : '';?> >Pengeluaran</option>
                  </select>
                  <?= form_error('jenis', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Sejumlah</label>
                  <?php
                  if ($cash['pemasukan'] == null){
                    $jumlah = $cash['pengeluaran'];
                  }
                  elseif ($cash['pengeluaran'] == null) {
                    $jumlah = $cash['pemasukan'];
                  }
                  ?>
                  <input type="number" name="jumlah" class="form-control" value="<?= set_value('jumlah', $jumlah); ?>" required="">
                  <?= form_error('jumlah', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Catatan</label>
                  <textarea type="text" name="catatan" class="form-control" required=""><?= set_value('catatan', $cash['catatan']); ?></textarea>
                  <?= form_error('catatan', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('cash');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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