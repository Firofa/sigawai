 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Gaji
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Rincian Gaji</h4>

          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2">
                      RINCIAN PENGHASILAN
                    </div>
                    <div class="col-sm-8">
                      <form class="form-inline" action="/action_page.php">
                        <div class="form-group col-sm-4">
                          <label for="bulan">Bulan:</label>
                          <select name="bulan" id="bulan" class="form-control">
                            <option value="januari">Januari</option>
                            <option value="februari">Februari</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="pwd">Tahun:</label>
                          <select name="tahun" id="tahun" class="form-control">
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-2">
                        <a href="#" class="btn btn-primary">Download Pdf</a>  
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <h4>Nama</h4>
                  </div>
                  <div class="col-sm-1">
                    <div class="pull-left">
                      <h4>:</h4>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div>
                      <h4><?= $pegawai['name']; ?></h4>
                    </div>
                  </div>
                  <div class="col-sm-6"></div>
                </div>

                <div class="row">
                  <div class="col-sm-2">
                    <h4>NIP</h4>
                  </div>
                  <div class="col-sm-1">
                    <div class="pull-left">
                      <h4>:</h4>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div>
                      <h4><?= $pegawai['nip'] ?></h4>
                    </div>
                  </div>
                  <div class="col-sm-6"></div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <h4>Nomor Rekening</h4>
                  </div>
                  <div class="col-sm-1">
                    <div class="pull-left">
                      <h4>:</h4>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div>
                      <h4><?= $pegawai['no_rek']; ?></h4>
                    </div>
                  </div>
                  <div class="col-sm-6"></div>
                </div>
                <div class="row bg-primary">
                  <h4>&nbsp;<b>A. Penghasilan</b></h4>
                </div>
                 <div class="row">
                    <?php $totalPenghasilan = 0; ?>
                    <?php foreach($dataPenghasilan as $data) : ?>
                    <div class="col-sm-10">
                      <h5><?= $data['nama_perkiraan'] ?></h5>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-right">
                        <h5>Rp.</h5>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-right">
                        <h5><?= number_format($data['jumlah'],2,',','.');?></h5>
                      </div>
                    </div>
                    <?php $totalPenghasilan = $totalPenghasilan + $data['jumlah']; ?>
                    <?php endforeach; ?>
                    <?php foreach($dataUangMakan as $data) : ?>
                    <div class="col-sm-10">
                      <h5><?= $data['nama_perkiraan'] ?></h5>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-right">
                        <h5>Rp.</h5>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-right">
                        <h5><?= number_format($data['jumlah'],2,',','.');?></h5>
                      </div>
                    </div>
                    <?php $totalPenghasilan = $totalPenghasilan + $data['jumlah']; ?>
                    <?php endforeach; ?>
                    <?php foreach($dataRemunerasi as $data) : ?>
                    <div class="col-sm-10">
                      <h5><?= $data['nama_perkiraan'] ?></h5>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-right">
                        <h5>Rp.</h5>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-right">
                        <h5><?= number_format($data['jumlah'],2,',','.');?></h5>
                      </div>
                    </div>
                    <?php $totalPenghasilan = $totalPenghasilan + $data['jumlah']; ?>
                    <?php endforeach; ?>
                    <div class="col-sm-10 bg-info">
                      <h5>Jumlah Penghasilan</h5>
                    </div>
                    <div class="col-sm-1 bg-info">
                      <div class="pull-right">
                        <h5>Rp. </h5>
                      </div>
                    </div>
                    <div class="col-sm-1 bg-info">
                      <div class="pull-right">
                        <h5><?= number_format($totalPenghasilan,2,',','.');?></h5>
                      </div>
                    </div>
                 </div>
              <br>
                  
                <div class="row bg-primary">
                  <h4>&nbsp;<b>B. Potongan KPPN</b></h4>
                </div>
                <div class="row">
                    <?php $totalPotonganKppn = 0; ?>
                    <?php foreach($dataPotonganKppn as $data) : ?>
                    <div class="col-sm-10">
                      <h5><?= $data['nama_perkiraan'] ?></h5>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-right">
                        <h5>Rp.</h5>
                        </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-right">
                        <h5><?= number_format($data['jumlah'],2,',','.');?></h5>
                      </div>
                    </div>
                    <?php $totalPotonganKppn = $totalPotonganKppn + $data['jumlah']; ?>
                    <?php endforeach; ?>
                    <div class="col-sm-10 bg-info">
                      <h5>Jumlah Potongan KPPN</h5>
                    </div>
                    <div class="col-sm-1 bg-info">
                      <div class="pull-right">
                        <h5>Rp. </h5>
                      </div>
                    </div>
                    <div class="col-sm-1 bg-info">
                      <div class="pull-right">
                        <h5><?= number_format($totalPotonganKppn,2,',','.');?></h5>
                      </div>
                    </div>
                 </div>
            <br>
               
                <div class="row bg-primary">
                  <h4>&nbsp;<b>B. Potongan Internal</b></h4>
                </div>
                  <div class="row">
                    <?php $totalPotonganInternal = 0; ?>
                    <?php foreach($dataPotonganInternal as $data) : ?>
                    <div class="col-sm-6">
                      <h5><?= $data['nama_perkiraan'] ?></h5>
                    </div>
                    <div class="col-sm-6">
                      <div class="pull-right">
                        <h5><?= 'Rp.'.number_format($data['jumlah'],2,',','.');?></h5>
                      </div>
                    </div>
                    <?php $totalPotonganInternal = $totalPotonganInternal + $data['jumlah']; ?>
                    <?php endforeach; ?>
                    <div class="col-sm-10 bg-info">
                      <h5>Jumlah Potongan Internal</h5>
                    </div>
                    <div class="col-sm-1 bg-info">
                      <div class="pull-right">
                        <h5>Rp. </h5>
                      </div>
                    </div>
                    <div class="col-sm-1 bg-info">
                      <div class="pull-right">
                        <h5><?= number_format($totalPotonganInternal,2,',','.');?></h5>
                      </div>
                    </div>
                 </div>
            </div>
        </div>  
          <div class="modal-footer">
              
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
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
<script src="<?= base_url('assets/');?>js/penghasilanPegawai.js"></script> 
<script>

  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
