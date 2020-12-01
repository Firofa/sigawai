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
        <?= form_open_multipart('ruangan/doEditDataRuangan/'); ?>
                <div class="form-group ">
                    <input type="text" class="form-control form-control-user" id="id_ruangan" name="id_ruangan" value="<?= $ruangan['id_ruangan'];?>" READONLY>
                    <?= form_error('id_ruangan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama Ruangan:</label>
                    <input type="text" class="form-control form-control-user" id="ruangan" name="ruangan" value="<?= $ruangan['ruangan'];?>" placeholder="Masukan Nama Ruangan..." value="<?= set_value('ruangan'); ?>">
                    <?= form_error('ruangan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>

				<div class="form-group  justify-content-end">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
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