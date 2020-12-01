 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengaturan Hak Akses
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Status Hak Akses User</h3>
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
                <table id="example2" class="table table-bordered table-striped ">
                  <thead>
                    <tr>
				      	<th scope="col">No</th>
				      	<th scope="col">Nama</th>
				      	<th scope="col">NIP</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Level Akses</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
				    </tr>
                  </thead>
                  <tbody>
                    <?php 	$i = 1; ?>
                    <?php foreach ($pengguna as $pg): ?>
                    <tr>
                        <td><?= $i;?></td>
                        <td><?= $pg['name'];?></td>
                        <td><?= $pg['nip'];?></td>
                        <td><?= $pg['jabatan']?></td>
                        <td><?= $pg['level_access'];?></td>
                        <td><?php if($pg['is_active'] == 1){echo "Aktif"; } else {echo "Tidak Aktif"; }?></td>
                        <td>
                            <a href="<?= base_url('admin/editHakAkses/').$pg['id_user'];?>" class="badge badge-success">Edit</a>
                        </td>
                        
                        <?php $i++; ?>
                    </tr>		
                    <?php endforeach ?>
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
  