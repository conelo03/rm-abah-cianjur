<?php
$id_user = $this->session->userdata('id_user');
$get_user = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
?>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-auto">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/img/profile/user.png'); ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $get_user['nama'] ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('setting');?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Edit Akun
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Bolu Kukus Siliwangi</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">BKS</a>
          </div>
          <?php
            $judul = explode(' ', $title);
          ?>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="<?= $title == 'Dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('dashboard');?>"><i class="fas fa-circle"></i> <span>Dashboard</span></a></li>  

            <li class="menu-header">Data Master</li>
            <?php if(is_admin()):?>        
            <li class="<?= $title == 'Kelola User' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('user');?>"><i class="fas fa-circle"></i> <span>Kelola User</span></a></li> 
            <?php endif;?>
            <li class="<?= $title == 'Data Barang' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('barang');?>"><i class="fas fa-circle"></i> <span>Data Barang</span></a></li> 

            <li class="menu-header">Transaksi</li>

            <li class="<?= $title == 'Data Barang Masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('barang-masuk');?>"><i class="fas fa-circle"></i> <span>Barang Masuk</span></a></li>
            <li class="<?= $title == 'Data Penjualan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('barang-keluar');?>"><i class="fas fa-circle"></i> <span>Penjualan</span></a></li>
            <li class="<?= $title == 'Data Cash' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('cash');?>"><i class="fas fa-circle"></i> <span>Cash On Hand</span></a></li>  

            <li class="menu-header">Laporan</li>
            <?php if(is_admin()):?> 
            <li class="<?= $title == 'Laporan Barang Masuk' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-masuk');?>"><i class="fas fa-circle"></i> <span>Laporan Barang Masuk</span></a></li>
            <li class="<?= $title == 'Laporan Penjualan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-barang-keluar');?>"><i class="fas fa-circle"></i> <span>Laporan Penjualan</span></a></li> 
            <li class="<?= $title == 'Laporan Transaksi' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('laporan-transaksi');?>"><i class="fas fa-circle"></i> <span>Laporan Transaksi</span></a></li> 
            <?php endif;?>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <button class="btn btn-danger btn-lg btn-block btn-icon-split" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fa fa-sign-out-alt"></i> Logout</button>
          </div>
        </aside>
      </div>
      