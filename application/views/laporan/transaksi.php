<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Laporan Transaksi</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('cetak-transaksi'); ?>" method="post">
              <div class="card-header">
                <h4>Pilih Bulan</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <select class="form-control" name="bulan" id="select-pegawai" data-live-search="true">
                    <option disabled selected>-- Pilih Bulan --</option>
                    <?php foreach ($bulan as $b):?>
                    <option value="<?= $b['myformat']?>"><?= $b['myformat']?></option>
                    <?php endforeach;?>
                  </select>
                  <?= form_error('bulan', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <button type="submit" name="filter" value="filter" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                <button type="submit" name="cetak" value="cetak" formtarget="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>