 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pegawai
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Pegawai</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url("admin/changepassword"); ?>" method="post">
          			<div class="form-group">
					    <label for="currentPassword">Password Lama</label>
					    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
					    <?= form_error('currentPassword','<small class="text-danger pl-3">','</small>'); ?>
  					</div>          			
  					<div class="form-group">
					    <label for="new_password1">Password Baru</label>
					    <input type="password" class="form-control" id="new_password1" name="new_password1">
  						<?= form_error('new_password1','<small class="text-danger pl-3">','</small>'); ?>
  					</div>
  					<div class="form-group">
					    <label for="new_password2">Konfirmasi Password</label>
					    <input type="password" class="form-control" id="new_password2" name="new_password2">
  						<?= form_error('new_password2','<small class="text-danger pl-3">','</small>'); ?>
  					</div>
  					<div class="form-group">
  						<button class="btn btn-primary">Ubah Password</button>
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->