<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master User</a></div>
        <div class="breadcrumb-item"><a href="#">Kelola Pengguna</a></div>
        <div class="breadcrumb-item">Edit Pengguna</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-user/'.$user['id_user']); ?>" method="post">
              <div class="card-header">
                <h4>Form Edit Pengguna</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?= set_value('nama', $user['nama']); ?>" required="">
                  <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>No Handphone</label>
                  <input type="text" name="no_hp" class="form-control" value="<?= set_value('no_hp', $user['no_hp']); ?>" required="">
                  <?= form_error('no_hp', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" value="<?= set_value('email', $user['email']); ?>" required="">
                  <?= form_error('email', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?= set_value('username', $user['username']); ?>" required="">
                  <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>" >
                  <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="password2" class="form-control" value="<?= set_value('password2'); ?>" >
                  <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label class="d-block">Role</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" value="1" id="exampleRadios3" <?= set_value('role', $user['role']) == '1' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios3">
                      Administrator
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" value="0" id="exampleRadios4" <?= set_value('role', $user['role']) == '0' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios4">
                      Pegawai
                    </label>
                  </div>
                </div>
                <?= form_error('role', '<span class="text-danger small">', '</span>'); ?>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('user');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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