<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

     <!-- CSS for multiple Form -->
     <link rel="stylesheet" href="<?= base_url('assets/'); ?>jquery-ui/jquery-ui.css"> 
    <!-- Laporan -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
</head>
<body class="hold-transition fixed skin-blue sidebar-mini">
  
<div class="wrapper">

<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SGI</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SIGAWAI</b> PANEL</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url('assets/'); ?>dist/img/avatar8.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?= $user['name'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?= base_url('assets/'); ?>dist/img/avatar8.png" class="img-circle" alt="User Image">

              <p>
                Hello, <?= $user['name']; ?>
                <small>Member since <?= date('d M Y',$user['created_at']); ?></small>
              </p>
            </li>
            
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
              <a href="<?= base_url('admin/changePassword'); ?>" class="btn btn-default btn-flat">Change Password</a>
              </div>
              <div class="pull-right">
                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
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
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Rincian Gaji
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Rincian Gaji Pegawai</h3>
        </div>
        <div class="box-body">
            <?php  if(validation_errors()) : ?>
              <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
              <?php  endif; ?>
              <?= $this->session->flashdata('message'); 	 ?>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="iniData" class="table table-bordered display">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pegawai</th>
                      <th>NIP</th>
                      <th>Tanggal Gajian</th>
                      <th>Penghasilan Kotor</th>
                      <th>Potongan KPPN</th>
                      <th>Penghasilan Bersih</th>
                      <th>Potongan Internal</th>
                      <th>Gaji Bersih</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 	$i = 1; ?>  
                    <?php foreach ($gaji as $gj): ?>
                      <tr>
                        <td><?= $i;?></td>
                        <td><?= $gj['name'];?></td>
                        <td><?= $gj['nip'];?></td>
                        <td><?= $gj['tgl_gajian'];?></td>
                        <td><?= 'Rp.'.number_format($gj['penghasilan_kotor'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['potongan_kppn'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['penghasilan_bersih'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['potongan_internal'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['gaji_bersih'],2,',','.');?></td>
                  </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
              </tbody>
            </table>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- isi footer -->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-user"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
      <!-- /.tab-pane -->
     
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<!-- SlimScroll -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- Script Tambah Penghasilan -->
<!-- Multiple Forms script -->
<script src="<?= base_url('assets/');?>jquery-ui/jquery-ui.js"></script>

<!-- Export File -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script>

  $(document).ready(function() {
    $('#iniData').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
    } );
} );
</script>

</body>
</html>
