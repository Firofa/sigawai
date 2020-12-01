
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
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
        <?php if($user['level_access_id'] == "1") : ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Configuration</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/pengaturanHakAkses');?>"><i class="fa fa-circle-o"></i>Pengaturan Hak Akses</a></li>
            <li><a href="<?= base_url('unit');?>"><i class="fa fa-circle-o"></i>Pengaturan Satuan Kerja</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Utility</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/pengaturanPegawai'); ?>"><i class="fa fa-circle-o"></i>Input Pegawai</a></li>
            <li><a href="<?= base_url('ruangan/pengaturanRuangan'); ?>"><i class="fa fa-circle-o"></i>Input Ruangan</a></li>
          </ul>
        </li>
        <li class="header">SALARY NAVIGATION</li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-table"></i> <span>Penghitungan Gaji</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
          <?php if($user['level_access_id'] == "1") : ?>
            <li><a href="<?= base_url('perkiraan'); ?>"><i class="fa fa-circle-o"></i>Perkiraan</a></li>
          <?php endif; ?>
            <li><a href="<?= base_url('gaji'); ?>"><i class="fa fa-circle-o"></i>Pengaturan Gaji</a></li>
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="<?= base_url('admin/changePassword'); ?>"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>