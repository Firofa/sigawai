 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Uang Makan Pegawai
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- Default box -->
       <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Uang Makan Pegawai</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              <?php  if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                <?php  endif; ?>
                <?= $this->session->flashdata('message'); 	 ?>
        </div>
        <div class="box-body">
          
          <form method="post" id="perkiraan_form" action="<?= base_url('gaji/tambahGaji'); ?>">
              <div class="col-xs-6">
                <div class="form-group ">
                  <label for="id_user">Pilih Pegawai:</label>
                    <select class="form-control" id="id_user" name="id_user">
                      <option disabled>Pilih Pegawai:</option>
                      <?php foreach($users as $us) : ?>
                        <option value="<?= $us['id_user'];?>"><?= $us['nip'].".".$us['name'];?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('id_user','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
              </div>
              <div class="col-xs-6">  
                <div class="form-group ">
                  <label for="tgl_gaji">Tanggal Gajian:</label>
                  <input type="date" class="form-control form-control-user" id="tgl_gaji" name="tgl_gaji" placeholder="Masukan Tanggal Gajian..." value="<?= set_value('tgl_gaji'); ?>">
                    <span id="error_tgl_gaji" class="text-danger"></span>
                </div>
              </div>

              <div align="left" style="margin-bottom:5px;">
                  <button type="button" name="add" id="add" class="btn btn-success">Tambah Uang Makan Pegawai</button>
              </div>
                    
                    <br />
                    <br />
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="data_perkiraan" >
                        <tr>
                          <th>Jenis Uang Makan</th>
                          <th>Jumlah Uang Makan</th>
                          <th>Details</th>
                          <th>Remove</th>
                        </tr>
                      </table>
                    </div>
                  <div align="center">
                      <button type="submit" name="insert" id="insert" class="btn btn-primary">Tambah Uang Makan</button>
                  </div>
            </form>
              <div id="perkiraan_dialog" title="Add Data">
                <div class="form-group">
                  <label>Jenis Uang Makan</label>
                  <select name="perkiraan_id" id="perkiraan_id" class="form-control">
                    <?php foreach($jenis_uang_makan as $jp):?>  
                    <option value="<?= $jp['id_perkiraan'];?>"><?= $jp['nama_perkiraan'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jumlah Uang Makan</label>
                  <input type="text" data-type="currency" class="form-control form-control-user" id="jumlah_uang_makan" name="jumlah_uang_makan"  />
                  <span id="error_jumlah_uang_makan" class="text-danger"></span>
                </div>
                <div class="form-group" align="center">
                  <input type="hidden" name="row_id" id="hidden_row_id" />
                  <button type="button" id="save" name="save" class="btn btn-info">Save</button>
                </div>
                <div id="action_alert" title="Action"></div>
              </div>
        </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <!-- isi footer -->
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Data Gaji Pegawai</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
          </div>
          
          <div class="box-body">
            <?php  if(validation_errors()) : ?>
              <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
              <?php  endif; ?>
              <?= $this->session->flashdata('message'); 	 ?>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
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
                      <th>Action</th>
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
                    <td>
                          <a href="#" class="badge badge-success">Edit</a>
                        
                    </td>
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
<!-- Script Tambah uang_makan -->
<!-- Multiple Forms script -->
<script src="<?= base_url('assets/');?>jquery-ui/jquery-ui.js"></script>
<script src="<?= base_url('assets/');?>js/UangMakanPegawai.js"></script>
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

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(",") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(",");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "Rp " + left_side + "," + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "Rp " + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ",00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}



 

</script>

</body>
</html>
