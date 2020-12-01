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
        <?= form_open_multipart('admin/doEditHakAkses/'); ?>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $edit_user['id_user'];?>" READONLY>
                    <?= form_error('id_user','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                  <label for="level_access_id">Level Akses:</label>
                  <select class="form-control" id="level_access_id" name="level_access_id">
                    <option disabled>Pilih Unit Kerja:</option>
                    <option value="<?= $edit_user['level_access_id'];?>">Level Akses Saat ini: <?= $edit_user['level_access']; ?></option>
                    <?php foreach($level_akses as $la) : ?>
                      <option value="<?= $la['id_level_access'];?>"><?= $la['level_access'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('level_access_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                  <label for="is_active">Status:</label>
                  <select class="form-control" id="is_active" name="is_active">
                      <option disabled>Pilih ruangan:</option>
                      <option value="<?= $edit_user['is_active'];?>">Status saat ini: <?php if($edit_user['is_active'] == 1){ echo "Aktif"; } else { echo "Tidak Aktif"; } ?></option>
                      <option value="1">Aktif</option>
                      <option value="0">Tidak Aktif</option>
                  </select>
                    <?= form_error('is_active','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                

				<div class="form-group justify-content-end">
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