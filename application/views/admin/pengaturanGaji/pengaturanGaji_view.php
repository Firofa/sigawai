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
          <?= form_open_multipart('gaji'); ?>

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
                <div class="form-group ">
                  <label for="tgl_gaji">Tanggal Gajian:</label>
                  <input type="date" class="form-control form-control-user" id="tgl_gaji" name="tgl_gaji" placeholder="Masukan Tanggal Gajian..." value="<?= set_value('tgl_gaji'); ?>">
                    <?= form_error('tgl_gaji','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <!-- ____________________________________ -->
                <hr>
                <h4><b>A. Penghasilan</b></h4>
                <hr>
                  <div class="form-group">
                      <label>Gaji Pokok:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="gaji_pokok" name="gaji_pokok" placeholder="Masukan Gaji Pokok..." value="<?= set_value('gaji_pokok'); ?>">
                      <?= form_error('gaji_pokok','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Istri/Suami:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_is" name="tunjangan_is" placeholder="Masukan Tunjangan Istri/Suami..." value="<?= set_value('tunjangan_is'); ?>">
                      <?= form_error('tunjangan_is','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Anak:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_anak" name="tunjangan_anak" placeholder="Masukan Tunjangan Anak..." value="<?= set_value('tunjangan_anak'); ?>">
                      <?= form_error('tunjangan_anak','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Umum:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_umum" name="tunjangan_umum" placeholder="Masukan Tunjangan Umum..." value="<?= set_value('tunjangan_umum'); ?>">
                      <?= form_error('tunjangan_umum','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Kemahalan Hakim:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_kh" name="tunjangan_kh" placeholder="Masukan Tunjangan Kemahalaan Hakim..." value="<?= set_value('tunjangan_kh'); ?>">
                      <?= form_error('tunjangan_kh','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Struktural:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_struktural" name="tunjangan_struktural" placeholder="Masukan Tunjangan Struktural..." value="<?= set_value('tunjangan_struktural'); ?>">
                      <?= form_error('tunjangan_struktural','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Fungsional:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_fungsional" name="tunjangan_fungsional" placeholder="Masukan Tunjangan Fungsional..." value="<?= set_value('tunjangan_fungsional'); ?>">
                      <?= form_error('tunjangan_fungsional','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Beras:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_beras" name="tunjangan_beras" placeholder="Masukan Tunjangan Beras..." value="<?= set_value('tunjangan_beras'); ?>">
                      <?= form_error('tunjangan_beras','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Khusus Pajak:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_kp" name="tunjangan_kp" placeholder="Masukan Tunjangan Khusus Pajak..." value="<?= set_value('tunjangan_kp'); ?>">
                      <?= form_error('tunjangan_kp','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <!-- ____________________________________ -->
                  <hr>
                    <h4><b>B. Potongan KPPN</b></h4>
                  <hr>
                  <div class="form-group">
                      <label>IWP:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iwp" name="iwp" placeholder="Masukan Potongan IWP..." value="<?= set_value('iwp'); ?>">
                      <?= form_error('iwp','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran BPJS:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_bpjs" name="iuran_bpjs" placeholder="Masukan Potongan Iuran BPJS..." value="<?= set_value('iuran_bpjs'); ?>">
                      <?= form_error('iuran_bpjs','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Potongan PPH:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="potongan_pph" name="potongan_pph" placeholder="Masukan Potongan PPH..." value="<?= set_value('potongan_pph'); ?>">
                      <?= form_error('potongan_pph','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Sewa Rumah:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="sewa_rumah" name="sewa_rumah" placeholder="Masukan Potongan Sewa Rumah..." value="<?= set_value('sewa_rumah'); ?>">
                      <?= form_error('sewa_rumah','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Taperum:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="taperum" name="taperum" placeholder="Masukan Potongan Taperum..." value="<?= set_value('taperum'); ?>">
                      <?= form_error('taperum','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Pot. Lain (Persekot Gaji, TGR):</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="pot_lain" name="pot_lain" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('pot_lain'); ?>">
                      <?= form_error('pot_lain','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <!-- ____________________________________ -->
                  <hr>
                      <h4><b>C. Potongan Internal</b></h4>
                  <hr>
                  <div class="form-group">
                      <label>Iuran IKAHI:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_ikahi" name="iuran_ikahi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_ikahi'); ?>">
                      <?= form_error('iuran_ikahi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran YDSH:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_ydsh" name="iuran_ydsh" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_ydsh'); ?>">
                      <?= form_error('iuran_ydsh','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Simpanan Pokok Koperasi:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="simpanan_pokok_koperasi" name="simpanan_pokok_koperasi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('simpanan_pokok_koperasi'); ?>">
                      <?= form_error('simpanan_pokok_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Simpanan Wajib Koperasi:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="simpanan_wajib_koperasi" name="simpanan_wajib_koperasi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('simpanan_wajib_koperasi'); ?>">
                      <?= form_error('simpanan_wajib_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Simpanan Sukarela Koperasi:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="simpanan_sukarela_koperasi" name="simpanan_sukarela_koperasi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('simpanan_sukarela_koperasi'); ?>">
                      <?= form_error('simpanan_sukarela_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Angsuran Pinjaman Koperasi:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="angsuran_pinjaman_koperasi" name="angsuran_pinjaman_koperasi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('angsuran_pinjaman_koperasi'); ?>">
                      <?= form_error('angsuran_pinjaman_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran Dharma Yukti:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_dharma_yukti" name="iuran_dharma_yukti" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_dharma_yukti'); ?>">
                      <?= form_error('iuran_dharma_yukti','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran PTWP:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_ptwp" name="iuran_ptwp" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_ptwp'); ?>">
                      <?= form_error('iuran_ptwp','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran Olahraga:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_olahraga" name="iuran_olahraga" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_olahraga'); ?>">
                      <?= form_error('iuran_olahraga','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Donasi Dharmayukti Karini:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="donasi_dk" name="donasi_dk" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('donasi_dk'); ?>">
                      <?= form_error('donasi_dk','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran Muslim:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_muslim" name="iuran_muslim" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_muslim'); ?>">
                      <?= form_error('iuran_muslim','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Arisan Cabang Dharmayukti:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="arisan_cd" name="arisan_cd" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('arisan_cd'); ?>">
                      <?= form_error('arisan_cd','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran IPASPI</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_ipaspi" name="iuran_ipaspi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_ipaspi'); ?>">
                      <?= form_error('iuran_ipaspi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Potongan Lain/Arisan DYK Daerah:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="pot_lain_arisan" name="pot_lain_arisan" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('pot_lain_arisan'); ?>">
                      <?= form_error('pot_lain_arisan','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Sumbangan Sosial:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="sumbangan_sosial" name="sumbangan_sosial" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('sumbangan_sosial'); ?>">
                      <?= form_error('sumbangan_sosial','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Sumbangan Persekutuan Kristiani:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="sumbangan_pk" name="sumbangan_pk" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('sumbangan_pk'); ?>">
                      <?= form_error('sumbangan_pk','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran Untuk Tenaga Kebersihan:</label>
                      <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_tk" name="iuran_tk" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_tk'); ?>">
                      <?= form_error('iuran_tk','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  


                    
         
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
          </div>
          </form>
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
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pegawai</th>
                      <th>NIP Pegawai</th>
                      <th>Tanggal Gajian</th>
                      <th>Penghasilan Kotor</th>
                      <th>Potongan KPPN</th>
                      <th>Penghasilan Bersih</th>
                      <th>Potongan Internal</th>
                      <th>Gaji Bersih</th>
                      <th>Created_at</th>      	
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
                        <td><?= $gj['waktu_input'];?></td>
                        <td>
                            <!-- <a href="<?php //base_url('Gaji/editDataTransaksiGaji/').$gj['id_transaksi_gaji'];?>" class="badge badge-success">Edit</a> -->
                            <a href="#">Edit</a>
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

</script>

</body>
</html>
