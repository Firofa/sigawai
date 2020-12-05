 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Gaji Pegawai
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- Default box -->
       <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Gaji Pegawai</h3>
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
          <div class="row">
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
              </div>  
                <div align="left" style="margin-bottom:5px;">
                  <button type="button" name="add" id="add" class="btn btn-success">Tambah Penghasilan Pegawai</button>
                    <br />
                    <br />
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="data_perkiraan">
                        <tr>
                          <th>Jenis Penghasilan</th>
                          <th>Jumlah Penghasilan</th>
                          <th>Details</th>
                          <th>Remove</th>
                        </tr>
                      </table>
                    </div>
                  <div align="center">
                      <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Save Penghasilan" />
                  </div>
                </div>
            </form>
            
            <div id="perkiraan_dialog" title="Add Data">
                <div class="form-group">
                  <label>Jenis Penghasilan</label>
                  <span id="error_perkiraan_id" class="text-danger"></span>
                  <select id="perkiraan_id" name="perkiraan_id" class="form-control">
                    <?php foreach($jenis_penghasilan as $jp):?>  
                    <option value="<?= $jp['id_perkiraan'];?>"><?= $jp['nama_perkiraan'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jumlah Penghasilan</label>
                  <input type="text" data-type="currency" class="form-control form-control-user" id="jumlah_penghasilan" name="jumlah_penghasilan"  />
                  <span id="error_jumlah_penghasilan" class="text-danger"></span>
                </div>
                <div class="form-group" align="center">
                  <input type="hidden" name="row_id" id="hidden_row_id" />
                  <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                </div>
                <div id="action_alert" title="Action">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <!-- isi footer -->
            </div>
            <!-- /.box-footer-->
          </div>
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
            <div class="box-body table-responsive">
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
                        <td><?= $gj['tgl_gaji'];?></td>
                        <td><?= 'Rp.'.number_format($gj['penghasilan_kotor'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['potongan_kppn'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['penghasilan_bersih'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['potongan_internal'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['gaji_bersih'],2,',','.');?></td>
                        <td>
                             <a href="<?= ('Gaji/editDataTransaksiGaji/').$gj['id_transaksi_gaji'];?>" class="badge badge-success">Edit</a>
                            
                        </td>
                      </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                  </tbody>
                </table>
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
<!-- <script src="<?php // base_url('assets/');?>js/penghasilanPegawai.js"></script> -->
<!-- page script -->
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


$(document).ready(function(){ 
 
 var count = 0;

 $('#perkiraan_dialog').dialog({
  autoOpen:false,
  width:400,
  
 });

 $('#add').click(function(){
  var tgl_gaji = '';
  var error_tgl_gaji = '';
    if($('#tgl_gaji').val() == '')
    {
      error_tgl_gaji = 'Periode Permintaan perlu dipilih';
      $('#error_tgl_gaji').text(error_tgl_gaji);
      $('#tgl_gaji').css('border-color', '#cc0000');
      tgl_gaji = '';
    } else {
      error_tgl_gaji = '';
      $('#error_tgl_gaji').text(error_tgl_gaji);
      $('#tgl_gaji').css('border-color', '');
      tgl_gaji = $('#tgl_gaji').val();
      $('#perkiraan_dialog').dialog('option', 'title', 'Add Data');
      $('#perkiraan_id').val('');
      $('#jumlah_penghasilan').val('');
      $('#error_perkiraan_id').text('');
      $('#error_jumlah_penghasilan').text('');
      $('#perkiraan_id').css('border-color', '');
      $('#jumlah_penghasilan').css('border-color', '');
      $('#save').text('Save');
      $('#perkiraan_dialog').dialog('open');
    }
  });

 $('#save').click(function(){
  var error_perkiraan_id = '';
  var error_jumlah_penghasilan = '';
  var perkiraan_id = '';
  var jumlah_penghasilan = '';
  if($('#perkiraan_id').val() == '')
  {
   error_perkiraan_id = 'Jenis perkiraan perlu dipilih';
   $('#error_perkiraan_id').text(error_perkiraan_id);
   $('#perkiraan_id').css('border-color', '#cc0000');
   perkiraan_id = '';
  }
  else
  {
   error_perkiraan_id = '';
   $('#error_perkiraan_id').text(error_perkiraan_id);
   $('#perkiraan_id').css('border-color', '');
   perkiraan_id = $('#perkiraan_id').val();
  } 
  if($('#jumlah_penghasilan').val() == '')
  {
   error_jumlah_penghasilan = 'Jumlah penghasilan perlu diisi';
   $('#error_jumlah_penghasilan').text(error_jumlah_penghasilan);
   $('#jumlah_penghasilan').css('border-color', '#cc0000');
   jumlah_penghasilan = '';
  }
  else if($('#jumlah_penghasilan').val() < 1) {
   error_jumlah_penghasilan = 'Jumlah penghasilan minimal 1 Rupiah';
   $('#error_jumlah_penghasilan').text(error_jumlah_penghasilan);
   $('#jumlah_penghasilan').css('border-color', '#cc0000');
   jumlah_penghasilan = '';
  }
  else
  {
   error_jumlah_penghasilan = '';
   $('#error_jumlah_penghasilan').text(error_jumlah_penghasilan);
   $('#jumlah_penghasilan').css('border-color', '');
   jumlah_penghasilan = $('#jumlah_penghasilan').val();
  }
  if(error_perkiraan_id != '' || error_jumlah_penghasilan != '')
  {
   return false;
  }
  else
  {
   if($('#save').text() == 'Save')
   {
    count = count + 1;
    output = '<tr id="row_'+count+'">';
    output += '<td>'+perkiraan_id+' <input type="hidden" name="hidden_perkiraan_id[]" id="perkiraan_id'+count+'" class="perkiraan_id" value="'+perkiraan_id+'" /></td>';
    output += '<td>'+jumlah_penghasilan+' <input type="hidden" name="hidden_jumlah_penghasilan[]" id="jumlah_penghasilan'+count+'" value="'+jumlah_penghasilan+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
    output += '</tr>';
    $('#data_perkiraan').append(output);
   }
   else
   {
    var row_id = $('#hidden_row_id').val();
    output = '<td>'+perkiraan_id+' <input type="hidden" name="hidden_perkiraan_id[]" id="perkiraan_id'+row_id+'" class="perkiraan_id" value="'+perkiraan_id+'" /></td>';
    output += '<td>'+jumlah_penghasilan+' <input type="hidden" name="hidden_jumlah_penghasilan[]" id="jumlah_penghasilan'+row_id+'" value="'+jumlah_penghasilan+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
    $('#row_'+row_id+'').html(output);
   }

   $('#perkiraan_dialog').dialog('close');
  }
 });

 $(document).on('click', '.view_details', function(){
  var row_id = $(this).attr("id");
  var perkiraan_id = $('#perkiraan_id'+row_id+'').val();
  var jumlah_penghasilan = $('#jumlah_penghasilan'+row_id+'').val();
  $('#perkiraan_id').val(perkiraan_id);
  $('#jumlah_penghasilan').val(jumlah_penghasilan);
  $('#save').text('Edit');
  $('#hidden_row_id').val(row_id);
  $('#perkiraan_dialog').dialog('option', 'title', 'Edit Data');
  $('#perkiraan_dialog').dialog('open');
 });

 $(document).on('click', '.remove_details', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this row data?"))
  {
   $('#row_'+row_id+'').remove();
  }
  else
  {
   return false;
  }
 });

 $('#action_alert').dialog({
  autoOpen:false
 });


$('#perkiraan_form').on('submit', function(event){
  event.preventDefault();
  var count_data = 0;
  $('.perkiraan_id').each(function(){
   count_data = count_data + 1;
  });
  if(count_data > 0)
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"<?= base_url('gaji/tambahGaji'); ?>",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#data_barang').find("tr:gt(0)").remove();
     $('#action_alert').html('<p>Data Inserted Successfully</p>'+data);
     $('#action_alert').dialog('open');
    },
    error:function(xml,text,error)
    {
     $('#action_alert').html('<p>Please Add atleast one data</p>');
     $('#action_alert').dialog('open');
    }
   })
  }
  else
  {
   $('#action_alert').html('<p>Please Add atleast one data</p>');
   $('#action_alert').dialog('open');
  }
 });
 
});  


</script>

</body>
</html>
