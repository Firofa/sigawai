 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Referensi Potongan KPPN
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Referensi Potongan KPPN</h3>
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
				      	<th>Tanggal Potongan KPPN</th>
				      	<th>Jenis Potongan KPPN</th>
				      	<th>Jumlah Potongan KPPN</th>
				      	<th>Created at</th>
				      	<th>Updated at</th>
				      	
				    </tr>
                  </thead>
                  <tbody>
                  <?php 	$i = 1; ?>  
                  <?php foreach ($dataPotonganKppn as $data): ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data['name']; ?></td>
                        <td><?= $data['nip']; ?></td>
                        <td><?= $data['tgl_gaji']; ?></td>
                        <td><?= $data['nama_perkiraan']; ?></td>
                        <td><?= 'Rp.'.number_format($data['jumlah'],2,',','.');?></td>
                        <td><?= date('d M Y',$data['created_at']); ?></td>
                        <td><?= date('d M Y',$data['updated_at']); ?></td>
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
