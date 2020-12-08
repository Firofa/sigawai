
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
        <li class="header">ADMIN NAVIGATION</li>
        <li><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Configuration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <?php if($user['level_access_id'] == "1") : ?>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/pengaturanHakAkses');?>"><i class="fa fa-circle-o"></i>Pengaturan Hak Akses</a></li>
            <li><a href="<?= base_url('unit');?>"><i class="fa fa-circle-o"></i>Pengaturan Satuan Kerja</a></li>
            <li><a href="<?= base_url('admin/pengaturanPegawai'); ?>"><i class="fa fa-circle-o"></i>Input Pegawai</a></li>
            <li><a href="<?= base_url('ruangan/pengaturanRuangan'); ?>"><i class="fa fa-circle-o"></i>Input Ruangan</a></li>
            <li><a href="<?= base_url('perkiraan'); ?>"><i class="fa fa-circle-o"></i>Pengaturan Perkiraan</a></li>
          </ul>
          <?php else: ?>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/pengaturanPegawai'); ?>"><i class="fa fa-circle-o"></i>Input Pegawai</a></li>
            <li><a href="<?= base_url('ruangan/pengaturanRuangan'); ?>"><i class="fa fa-circle-o"></i>Input Ruangan</a></li>
          </ul>
          <?php endif; ?>
        </li>
      
        <li class="header">NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Rekapitulasi</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
                <li><a href="<?= base_url('Gaji'); ?>"><i class="fa fa-circle-o"></i>Gaji</a></li>
                <li><a href="<?= base_url('UMakan'); ?>"><i class="fa fa-circle-o"></i>Uang Makan</a></li>
                <li><a href="<?= base_url('Remunerasi'); ?>"><i class="fa fa-circle-o"></i>Remunerasi</a></li>
                <li class="treeview menu-open" style="height:auto;">
                  <a href="#"><i class="fa fa-circle-o"></i>Potongan
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span></a>
                  <ul class="treeview-menu" style="display:block;">
                      <li><a href="<?= base_url('Potongan'); ?>"><i class="fa fa-circle-o"></i>Potongan KPPN</a></li>
                      <li><a href="<?= base_url('Potongan/potInternal'); ?>"><i class="fa fa-circle-o"></i>Potongan Internal</a></li>
                  </ul>
                </li>
          </ul>
        </li>
        <li><a href="<?= base_url('admin/changePassword'); ?>"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>