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
        <?= form_open_multipart('admin/doEditDataUser/'); ?>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $edit_user['id_user'];?>" READONLY>
                    <?= form_error('id_user','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Nama Pengguna:</label>
                    <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= $edit_user['name'];?>" placeholder="Masukan Nama Pengguna..." value="<?= set_value('name'); ?>">
                    <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Tempat Lahir:</label>
                    <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" value="<?= $edit_user['tempat_lahir'];?>" placeholder="Masukan Nama Pengguna..." value="<?= set_value('tempat_lahir'); ?>">
                    <?= form_error('tempat_lahir','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir:</label>
                    <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" value="<?= $edit_user['tanggal_lahir'];?>" placeholder="Masukan Nama Pengguna..." value="<?= set_value('tanggal_lahir'); ?>">
                    <?= form_error('tanggal_lahir','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Nomor Rekening:</label>
                    <input type="text" class="form-control form-control-user" id="no_rek" name="no_rek" value="<?= $edit_user['no_rek'];?>" placeholder="Masukan Nomor Rekening Pegawai..." value="<?= set_value('no_rek'); ?>">
                    <?= form_error('no_rek','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>NPWP:</label>
                    <input type="text" class="form-control form-control-user" id="npwp" name="npwp" value="<?= $edit_user['npwp'];?>" placeholder="Masukan Nomor Rekening Pegawai..." value="<?= set_value('npwp'); ?>">
                    <?= form_error('npwp','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Jabatan:</label>
                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" value="<?= $edit_user['jabatan'];?>" placeholder="Masukan Jabatan Pegawai..." value="<?= set_value('jabatan'); ?>">
                    <?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Pangkat:</label>
                    <input type="text" class="form-control form-control-user" id="pangkat" name="pangkat" value="<?= $edit_user['pangkat'];?>" placeholder="Masukan Pangkat Pegawai..." value="<?= set_value('pangkat'); ?>">
                    <?= form_error('pangkat','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Golongan:</label>
                    <input type="text" class="form-control form-control-user" id="golongan" name="golongan" value="<?= $edit_user['golongan'];?>" placeholder="Masukan Golongan Pegawai..." value="<?= set_value('golongan'); ?>">
                    <?= form_error('golongan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Tahun:</label>
                    <select name="tahun" class="form-control">
                        <option disabled>Pilih tahun:</option>
                        <option value="<?= $edit_user['tahun'];?>">Data Saat ini: <?= $edit_user['tahun'];?></option>
                        <?php for($i=date("Y")-15; $i <= date("Y"); $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('tahun','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                  <label for="work_unit_id">Unit Kerja:</label>
                  <select class="form-control" id="work_unit_id" name="work_unit_id">
                    <option disabled>Pilih Unit Kerja:</option>
                    <option value="<?= $edit_user['id_work_unit'];?>">Unit Kerja Saat ini: <?= $edit_user['work_unit']; ?></option>
                    <?php foreach($work_unit as $wu) : ?>
                      <option value="<?= $wu['id_work_unit'];?>"><?= $wu['work_unit'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('work_unit_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                  <label for="ruangan_id">Ruangan:</label>
                  <select class="form-control" id="ruangan_id" name="ruangan_id">
                    <option disabled>Pilih ruangan:</option>
                    <option value="<?= $edit_user['id_ruangan'];?>">Ruangan saat ini: <?= $edit_user['ruangan']; ?></option>
                    <?php foreach($ruangan as $ru) : ?>
                      <option value="<?= $ru['id_ruangan'];?>"><?= $ru['ruangan'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('ruangan_id','<small class="text-danger pl-3">','</small>'); ?> 
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