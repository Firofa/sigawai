

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SIGAWAI | Rincian Gaji 
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                      <h4>Rincian Gaji Karyawan</h4>
                    </div>
                    <div class="col-sm-3">
                      <label for="bulan_gaji">Bulan:</label>
                      <select class="form-control form-inline" name="bulan_gaji" id="bulan_gaji">
                        <?php foreach($bulan as $data) : ?>
                        <option value="<?= $data['nomor_bulan'];?>"><?= $data['nama_bulan'];?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label for="tahun_gaji">Tahun:</label>
                        <select class="form-control" name="tahun_gaji" id="tahun_gaji">
                          <?php for($i=date("Y")-15; $i <= date("Y")+1; $i++) { ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2" id="cetak_pdf">
                      
                    </div>
                </div>
              <!-- Nama -->
                  <div class="row">
                    <div class="col-sm-2">
                      <h4>Nama</h4>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-left">
                        <h4>:</h4>
                      </div>
                    </div>
                    <div class="col-sm-9">
                      <div>
                        <h4><?= $user['name']; ?></h4>
                      </div>
                    </div>
                  </div>
                <!-- End Nama -->
              <!-- NIP -->
                  <div class="row">
                    <div class="col-sm-2">
                      <h4>NIP</h4>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-left">
                        <h4>:</h4>
                      </div>
                    </div>
                    <div class="col-sm-9">
                      <div>
                        <h4><?= $user['nip']; ?></h4>
                      </div>
                    </div>
                  </div>
                <!-- End NIP -->
              <!-- Norek -->
                  <div class="row">
                    <div class="col-sm-2">
                      <h4>Nomor Rekening</h4>
                    </div>
                    <div class="col-sm-1">
                      <div class="pull-left">
                        <h4>:</h4>
                      </div>
                    </div>
                    <div class="col-sm-9">
                      <div>
                        <h4><?= $user['no_rek']; ?></h4>
                      </div>
                    </div>
                  </div>
                <!-- End Norek -->
              <table class="table" id="data_penghasilan">
                  <tr class="bg-primary">
                      <td colspan="3"><h4>&nbsp;<b>A. Penghasilan</b></h4></td>
                  </tr>
              </table>
              <!-- Potongan KPPN -->
              <table class="table" id="data_potongan_kppn">
                  <tr class="bg-primary">
                      <td colspan="3"><h4>&nbsp;<b>B. Potongan KPPN</b></h4></td>
                  </tr>
              </table>
              <br>
              <!-- Hasil Penghasilan Kotor - Potongan KPPN -->
              <table class="table" id="data_penghasilan_bersih">
                
              </table> 
              <!-- Potongan Internal -->
              <table class="table" id="data_potongan_internal">
                  <tr class="bg-primary">
                      <td colspan="3"><h4>&nbsp;<b>D. Potongan Internal</b></h4></td>
                  </tr>
              </table> 
              <br>
              <!-- Hasil Penghasilan Kotor - Potongan KPPN -->
              <table class="table" id="data_gaji_bersih">
              
              </table> 
              
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


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

  $(document).ready(function() {
    
    $("#bulan_gaji").change(function() {
      $('#cetak_pdf').find("a").remove();
      $('#data_penghasilan').find("tr:gt(0)").remove();
      $('#data_potongan_kppn').find("tr:gt(0)").remove();
      $('#data_potongan_internal').find("tr:gt(0)").remove();
      $('#data_penghasilan_bersih').find("tr").remove();
      $('#data_gaji_bersih').find("tr").remove();
      var bulan_gaji = $(this).val();
      var tahun_gaji = $('#tahun_gaji').val();
      $.ajax({
        url:'<?= base_url('User/slipGajiDetail'); ?>',
        method:'POST',
        data: { bulan_gaji: bulan_gaji,
                tahun_gaji: tahun_gaji},
        datatype: 'JSON',
        success: function(response){
          var len = response.length;
          $('#namaPenghasilan','#jumlahPenghasilan').text('');
          if(len > 0){
            var obj = JSON.parse(response);
            if(obj.transaksi_gaji_id !== null){
              output = '<a href="cetakRincianGajiPdf/'+obj.transaksi_gaji_id.id_transaksi_gaji+'" target="_blank" class="btn btn-primary pull-right" style="margin-top:17px;">Cetak PDF</a>';
              $('#cetak_pdf').append(output);
            }
            console.log(obj.transaksi_gaji_id.id_transaksi_gaji);
            count = 0;
            countTwo = 0; 
            countThree = 0; 
            var totalPenghasilan = 0;
            // Tambahkan Penghasilan
            $.each(obj.dataPenghasilan, function(key,value) {
              var amaPenghasilan = obj.dataPenghasilan[count].nama_perkiraan;
              var umlahPenghasilan = obj.dataPenghasilan[count].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPenghasilan'+count+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPenghasilan'+count+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_penghasilan').append(output);
              $('#namaPenghasilan'+count).text(amaPenghasilan);
              $('#jumlahPenghasilan'+count).text(umlahPenghasilan);
              totalPenghasilan = totalPenghasilan + parseInt(obj.dataPenghasilan[count].jumlah);
              count++;
            });
            // Tambahkan Uang Makan
            $.each(obj.dataUangMakan, function(key,value) {
              var amaPenghasilan = obj.dataUangMakan[countTwo].nama_perkiraan;
              var umlahPenghasilan = obj.dataUangMakan[countTwo].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPenghasilanUangMakan'+countTwo+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPenghasilanUangMakan'+countTwo+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_penghasilan').append(output);
              $('#namaPenghasilanUangMakan'+countTwo).text(amaPenghasilan);
              $('#jumlahPenghasilanUangMakan'+countTwo).text(umlahPenghasilan);
              totalPenghasilan = totalPenghasilan + parseInt(obj.dataUangMakan[countTwo].jumlah);
              countTwo++;
            }); 
            // Tambahkan Remunerasi
            $.each(obj.dataRemunerasi, function(key,value) {
              var amaPenghasilan = obj.dataRemunerasi[countThree].nama_perkiraan;
              var umlahPenghasilan = obj.dataRemunerasi[countThree].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPenghasilanRemunerasi'+countThree+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPenghasilanRemunerasi'+countThree+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_penghasilan').append(output);
              $('#namaPenghasilanRemunerasi'+countThree).text(amaPenghasilan);
              $('#jumlahPenghasilanRemunerasi'+countThree).text(umlahPenghasilan);
              totalPenghasilan = totalPenghasilan + parseInt(obj.dataRemunerasi[countThree].jumlah);
              countThree++;
            });
            //Tampilkan Total Penghasilan
              output  =  '<tr style="background-color:#D9EDF7;">'
              output  += '<td style="width:70%;"><h5>Jumlah Penghasilan</h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5>'+totalPenghasilan+'</h5></td>'
              output  += '</tr>'
              $('#data_penghasilan').append(output);
            //Tambahkan Potongan KPPN
              countFour = 0;
              var totalPotonganKppn = 0;
            $.each(obj.dataPotonganKppn, function(key,value) {
              var amaPenghasilan = obj.dataPotonganKppn[countFour].nama_perkiraan;
              var umlahPenghasilan = obj.dataPotonganKppn[countFour].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPotonganKppn'+countFour+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPotonganKppn'+countFour+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_potongan_kppn').append(output);
              $('#namaPotonganKppn'+countFour).text(amaPenghasilan);
              $('#jumlahPotonganKppn'+countFour).text(umlahPenghasilan);
              totalPotonganKppn = totalPotonganKppn + parseInt(obj.dataPotonganKppn[countFour].jumlah);
              countFour++;
            });
            //Tampilkan Total Potongan KPPN
              output  =  '<tr style="background-color:#D9EDF7;">'
              output  += '<td style="width:70%;"><h5>Jumlah Potongan KPPN</h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5>'+totalPotonganKppn+'</h5></td>'
              output  += '</tr>'
              $('#data_potongan_kppn').append(output);
            //Tampilkan Total Penghasilan Bersih
              var penghasilanBersih = totalPenghasilan - totalPotonganKppn;
              output =  '<tr style="background-color:#D9EDF7;">'
              output += '<td style="width:70%; padding:8px;"><h5>C. JUMLAH PENGHASILAN BERSIH (A - B)</h5></td>'
              output += '<td style="width:10%; text-align:right; padding:8px;"><h5>Rp.</h5></td>'
              output += '<td style="width:20%; text-align:right; padding:8px;"><h5>'+penghasilanBersih+'</h5></td>'
              output += '</tr>'
              $('#data_penghasilan_bersih').append(output);
            //Tambahkan Potongan Internal
              countFive = 0;
              var totalPotonganInternal = 0;
            $.each(obj.dataPotonganInternal, function(key,value) {
              var amaPenghasilan = obj.dataPotonganInternal[countFive].nama_perkiraan;
              var umlahPenghasilan = obj.dataPotonganInternal[countFive].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPotonganInternal'+countFive+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPotonganInternal'+countFive+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_potongan_internal').append(output);
              $('#namaPotonganInternal'+countFive).text(amaPenghasilan);
              $('#jumlahPotonganInternal'+countFive).text(umlahPenghasilan);
              totalPotonganInternal = totalPotonganInternal + parseInt(obj.dataPotonganInternal[countFive].jumlah);
              countFive++;
            });
            //Tampilkan Total Potongan Internal
              output  =  '<tr style="background-color:#D9EDF7;">'
              output  += '<td style="width:70%;"><h5>Jumlah Potongan Internal</h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5>'+totalPotonganInternal+'</h5></td>'
              output  += '</tr>'
              $('#data_potongan_internal').append(output);
            //Tampilkan Total Gaji Bersih
              var gajiBersih = 0;
              var gajiBersih = penghasilanBersih - totalPotonganInternal;
              output =  '<tr style="background-color:#D9EDF7;">'
              output += '<td style="width:70%; padding:8px;"><h5>E. JUMLAH GAJI YANG DITERIMA/DITRANSFER (C - D)</h5></td>'
              output += '<td style="width:10%; text-align:right; padding:8px;"><h5>Rp.</h5></td>'
              output += '<td style="width:20%; text-align:right; padding:8px;"><h5>'+gajiBersih+'</h5></td>'
              output += '</tr>'
              $('#data_gaji_bersih').append(output);
          }
        }
      });
    });
     
    $("#tahun_gaji").change(function() {
      $('#cetak_pdf').find("a").remove();
      $('#data_penghasilan').find("tr:gt(0)").remove();
      $('#data_potongan_kppn').find("tr:gt(0)").remove();
      $('#data_potongan_internal').find("tr:gt(0)").remove();
      $('#data_penghasilan_bersih').find("tr").remove();
      $('#data_gaji_bersih').find("tr").remove();
      var tahun_gaji = $(this).val();
      var bulan_gaji = $('#bulan_gaji').val();
      $.ajax({
        url:'<?= base_url('User/rincianGajiDetail'); ?>',
        method:'POST',
        data: { bulan_gaji: bulan_gaji,
                tahun_gaji: tahun_gaji},
        datatype: 'JSON',
        success: function(response){
          var len = response.length;
          $('#namaPenghasilan','#jumlahPenghasilan').text('');
          if(len > 0){
            var obj = JSON.parse(response);
            if(obj.transaksi_gaji_id !== null){
              output = '<a href="cetakRincianGajiPdf/'+obj.transaksi_gaji_id.id_transaksi_gaji+'" target="_blank" class="btn btn-primary pull-right" style="margin-top:17px;">Cetak PDF</a>';
              $('#cetak_pdf').append(output);
            }
            console.log(obj.transaksi_gaji_id.id_transaksi_gaji);
            count = 0;
            countTwo = 0; 
            countThree = 0; 
            var totalPenghasilan = 0;
            // Tambahkan Penghasilan
            $.each(obj.dataPenghasilan, function(key,value) {
              var amaPenghasilan = obj.dataPenghasilan[count].nama_perkiraan;
              var umlahPenghasilan = obj.dataPenghasilan[count].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPenghasilan'+count+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPenghasilan'+count+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_penghasilan').append(output);
              $('#namaPenghasilan'+count).text(amaPenghasilan);
              $('#jumlahPenghasilan'+count).text(umlahPenghasilan);
              totalPenghasilan = totalPenghasilan + parseInt(obj.dataPenghasilan[count].jumlah);
              count++;
            });
            // Tambahkan Uang Makan
            $.each(obj.dataUangMakan, function(key,value) {
              var amaPenghasilan = obj.dataUangMakan[countTwo].nama_perkiraan;
              var umlahPenghasilan = obj.dataUangMakan[countTwo].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPenghasilanUangMakan'+countTwo+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPenghasilanUangMakan'+countTwo+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_penghasilan').append(output);
              $('#namaPenghasilanUangMakan'+countTwo).text(amaPenghasilan);
              $('#jumlahPenghasilanUangMakan'+countTwo).text(umlahPenghasilan);
              totalPenghasilan = totalPenghasilan + parseInt(obj.dataUangMakan[countTwo].jumlah);
              countTwo++;
            }); 
            // Tambahkan Remunerasi
            $.each(obj.dataRemunerasi, function(key,value) {
              var amaPenghasilan = obj.dataRemunerasi[countThree].nama_perkiraan;
              var umlahPenghasilan = obj.dataRemunerasi[countThree].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPenghasilanRemunerasi'+countThree+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPenghasilanRemunerasi'+countThree+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_penghasilan').append(output);
              $('#namaPenghasilanRemunerasi'+countThree).text(amaPenghasilan);
              $('#jumlahPenghasilanRemunerasi'+countThree).text(umlahPenghasilan);
              totalPenghasilan = totalPenghasilan + parseInt(obj.dataRemunerasi[countThree].jumlah);
              countThree++;
            });
            //Tampilkan Total Penghasilan
              output  =  '<tr style="background-color:#D9EDF7;">'
              output  += '<td style="width:70%;"><h5>Jumlah Penghasilan</h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5>'+totalPenghasilan+'</h5></td>'
              output  += '</tr>'
              $('#data_penghasilan').append(output);
            //Tambahkan Potongan KPPN
              countFour = 0;
              var totalPotonganKppn = 0;
            $.each(obj.dataPotonganKppn, function(key,value) {
              var amaPenghasilan = obj.dataPotonganKppn[countFour].nama_perkiraan;
              var umlahPenghasilan = obj.dataPotonganKppn[countFour].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPotonganKppn'+countFour+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPotonganKppn'+countFour+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_potongan_kppn').append(output);
              $('#namaPotonganKppn'+countFour).text(amaPenghasilan);
              $('#jumlahPotonganKppn'+countFour).text(umlahPenghasilan);
              totalPotonganKppn = totalPotonganKppn + parseInt(obj.dataPotonganKppn[countFour].jumlah);
              countFour++;
            });
            //Tampilkan Total Potongan KPPN
              output  =  '<tr style="background-color:#D9EDF7;">'
              output  += '<td style="width:70%;"><h5>Jumlah Potongan KPPN</h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5>'+totalPotonganKppn+'</h5></td>'
              output  += '</tr>'
              $('#data_potongan_kppn').append(output);
            //Tampilkan Total Penghasilan Bersih
              var penghasilanBersih = totalPenghasilan - totalPotonganKppn;
              output =  '<tr style="background-color:#D9EDF7;">'
              output += '<td style="width:70%; padding:8px;"><h5>C. JUMLAH PENGHASILAN BERSIH (A - B)</h5></td>'
              output += '<td style="width:10%; text-align:right; padding:8px;"><h5>Rp.</h5></td>'
              output += '<td style="width:20%; text-align:right; padding:8px;"><h5>'+penghasilanBersih+'</h5></td>'
              output += '</tr>'
              $('#data_penghasilan_bersih').append(output);
            //Tambahkan Potongan Internal
              countFive = 0;
              var totalPotonganInternal = 0;
            $.each(obj.dataPotonganInternal, function(key,value) {
              var amaPenghasilan = obj.dataPotonganInternal[countFive].nama_perkiraan;
              var umlahPenghasilan = obj.dataPotonganInternal[countFive].jumlah;
              output  =  '<tr>'
              output  += '<td style="width:70%;"><h5><span id="namaPotonganInternal'+countFive+'"></span></h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5><span id="jumlahPotonganInternal'+countFive+'"></span></h5></td>'
              output  += '</tr>'
              $('#data_potongan_internal').append(output);
              $('#namaPotonganInternal'+countFive).text(amaPenghasilan);
              $('#jumlahPotonganInternal'+countFive).text(umlahPenghasilan);
              totalPotonganInternal = totalPotonganInternal + parseInt(obj.dataPotonganInternal[countFive].jumlah);
              countFive++;
            });
            //Tampilkan Total Potongan Internal
              output  =  '<tr style="background-color:#D9EDF7;">'
              output  += '<td style="width:70%;"><h5>Jumlah Potongan Internal</h5></td>'
              output  += '<td style="width:10%; text-align:right;"><h5>Rp.</h5></td>'
              output  += '<td style="width:20%; text-align:right;"><h5>'+totalPotonganInternal+'</h5></td>'
              output  += '</tr>'
              $('#data_potongan_internal').append(output);
            //Tampilkan Total Gaji Bersih
              var gajiBersih = 0;
              var gajiBersih = penghasilanBersih - totalPotonganInternal;
              output =  '<tr style="background-color:#D9EDF7;">'
              output += '<td style="width:70%; padding:8px;"><h5>E. JUMLAH GAJI YANG DITERIMA/DITRANSFER (C - D)</h5></td>'
              output += '<td style="width:10%; text-align:right; padding:8px;"><h5>Rp.</h5></td>'
              output += '<td style="width:20%; text-align:right; padding:8px;"><h5>'+gajiBersih+'</h5></td>'
              output += '</tr>'
              $('#data_gaji_bersih').append(output);
          }
        }
      });
    });
  });
</script>
</body>
</html>

  
