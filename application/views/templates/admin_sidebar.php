
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
            <li><a href="<?= base_url('Admin/pengaturanHakAkses');?>"><i class="fa fa-circle-o"></i>Pengaturan Hak Akses</a></li>
            <li><a href="<?= base_url('Unit');?>"><i class="fa fa-circle-o"></i>Pengaturan Satuan Kerja</a></li>
            <li><a href="<?= base_url('Admin/pengaturanPegawai'); ?>"><i class="fa fa-circle-o"></i>Input Pegawai</a></li>
            <li><a href="<?= base_url('Ruangan/pengaturanRuangan'); ?>"><i class="fa fa-circle-o"></i>Input Ruangan</a></li>
            <li><a href="<?= base_url('Perkiraan'); ?>"><i class="fa fa-circle-o"></i>Pengaturan Perkiraan</a></li>
          </ul>
          <?php else: ?>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('Admin/pengaturanPegawai'); ?>"><i class="fa fa-circle-o"></i>Input Pegawai</a></li>
            <li><a href="<?= base_url('Ruangan/pengaturanRuangan'); ?>"><i class="fa fa-circle-o"></i>Input Ruangan</a></li>
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Referensi Perhitungan</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
                <li><a href="<?= base_url('Gaji/referensi'); ?>"><i class="fa fa-circle-o"></i>Referensi Gaji</a></li>
                <li><a href="<?= base_url('UMakan/referensi'); ?>"><i class="fa fa-circle-o"></i>Referensi Uang Makan</a></li>
                <li><a href="<?= base_url('Remunerasi/referensi'); ?>"><i class="fa fa-circle-o"></i>Referensi Remunerasi</a></li>
                <li class="treeview menu-open" style="height:auto;">
                  <a href="#"><i class="fa fa-circle-o"></i>Referensi Potongan
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span></a>
                  <ul class="treeview-menu" style="display:block;">
                      <li><a href="<?= base_url('Potongan/referensiPotonganKppn'); ?>"><i class="fa fa-circle-o"></i>Potongan KPPN</a></li>
                      <li><a href="<?= base_url('Potongan/referensiPotonganInternal'); ?>"><i class="fa fa-circle-o"></i>Potongan Internal</a></li>
                  </ul>
                </li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-folder-o"></i> <span>Komunikasi Data</span></a></li>
        <li><a href="<?= base_url('Gaji/laporan'); ?>"><i class="fa fa-folder-o"></i> <span>Laporan Rincian</span></a></li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Petunjuk</span></a></li>
        <li><a href="<?= base_url('Admin/changePassword'); ?>"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>