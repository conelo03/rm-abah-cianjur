<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-header">
      <h6>Selamat Datang di Aplikasi Penjualan Bolu Kukus Siliwangi<br/><br/>
      </h6>

    </div>
  </section>
  <?php if(is_admin()):?>
  <section class="section">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-stats">
              <div class="card-stats-title">
              	<h5>Total Keuntungan</h5>
          		</div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Balance</h4>
              </div>
              <div class="card-body">
                <h6><?= 'Rp '.number_format($keuntungan, 2, ',', '.');?></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-stats">
              <div class="card-stats-title">
              	<h5>Total Assets</h5>
          		</div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Balance</h4>
              </div>
              <div class="card-body">
                <h6><?= 'Rp '.number_format($total_assets, 2, ',', '.');?></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-stats">
              <div class="card-stats-title">
              	<h5>Cash on Hand</h5>
          		</div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Balance</h4>
              </div>
              <div class="card-body">
                <h6><?= 'Rp '.number_format($cash, 2, ',', '.');?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<?php endif;?>
</div>
<?php $this->load->view('template/footer');?>