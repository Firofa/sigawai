<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url('assets/'); ?>index2.html"><b>SIGAWAI</b> LOGIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login untuk Akses SIGAWAI</p>
    <?= $this->session->flashdata('message'); ?>

    <form method="POST" action="<?= base_url('auth');?>">
      <div class="form-group has-feedback">
        <label for="nip">NIP:</label>
        <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukan NIP">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?>
      </div>
      <div class="form-group has-feedback">
      <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
      </div>
      <div class="form-group has-feedback">
      <label for="tahun">Tahun:</label>
        <select name="tahun" id="tahun" class="form-control">
          <?php for($i=date("Y")-15; $i <= date("Y"); $i++) { ?>
          <option value="<?= $i ?>"><?= $i ?></option>
          <?php } ?>
        </select>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
        <?= form_error('tahun','<small class="text-danger pl-3">','</small>'); ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    
    <br>
    <p align="center" style="color:red;">Hubungi Admin Apabila Anda Belum Memiliki Akun</p>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
