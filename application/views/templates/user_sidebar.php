
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar fixed">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/'); ?>dist/img/avatar8.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $user['name']; ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <li> <a href="<?= base_url('User'); ?>"><i class="fa fa-dashboard"></i><span>Home</span></a></li>
        <li><a href="<?= base_url('User/slipGaji'); ?>"><i class="fa fa-dashboard"></i><span>Slip Gaji</span></a></li>
        <li><a href="<?= base_url('User/rincianGaji'); ?>"><i class="fa fa-dashboard"></i><span>Rincian Gaji</span></a></li>
        <li><a href="<?= base_url('User/rekapitulasiGaji'); ?>"><i class="fa fa-dashboard"></i><span>Rekapitulasi Setahun</span></a></li>
        <li><a href="<?= base_url('User/changePassword'); ?>"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>