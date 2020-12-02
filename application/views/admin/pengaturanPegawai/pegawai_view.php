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
          <h3 class="box-title">Tabel Data Pegawai</h3>
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
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAkunUser">Tambah Akun Baru</a>
            </div>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>TTL</th>
                      <th>No Rekening</th>
                      <th>NPWP</th>
                      <th>Gol.</th>
                      <th>Jabatan</th>
                      <th>Pangkat</th>
                      <th>Unit Kerja</th>
                      <th>Ruangan</th>
                      <th>Level</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 	$i = 1; ?>  
                  <?php foreach($pengguna as $pg) : ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $pg['nip'];?></td>
                      <td><?= $pg['name'];?></td>
                      <td><?= $pg['tempat_lahir'].', '.$pg['tanggal_lahir'];?></td>
                      <td><?= $pg['no_rek'];?></td>
                      <td><?= $pg['npwp'];?></td>
                      <td><?= $pg['golongan'];?></td>
                      <td><?= $pg['jabatan']?></td>
                      <td><?= $pg['pangkat'];?></td>
                      <td><?= $pg['work_unit'];?></td>
                      <td><?= $pg['ruangan'];?></td>
                      <td><?= $pg['level_access'];?></td>
                      <td>
                        <?php if($pg['is_active'] == 1){echo "Aktif"; } else {echo "Tidak Aktif"; }?>
                      </td>
                      <td>
                        <a class="btn btn-block btn-primary btn-xs" href="<?= base_url('admin/editDataUser/'.$pg['id_user']); ?>">Edit</a>
                      </td>
                    </tr>
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
            
<!-- Modal Content -->
<div class="modal fade" id="newAkunUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <?= form_open_multipart('admin/pengaturanPegawai'); ?>
      <div class="modal-body">
      <div class="form-group">
                    <label>Nama Pengguna:</label>
                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Masukan Nama Pengguna..." value="<?= set_value('name'); ?>">
                    <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>NIP:</label>
                    <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="Masukan Nomor Induk Pegawai..." value="<?= set_value('nip'); ?>">
                    <?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Tempat Lahir:</label>
                    <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan Tempat Lahir Pegawai..." value="<?= set_value('tempat_lahir'); ?>">
                    <?= form_error('tempat_lahir','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Tanggal Lahir:</label>
                    <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukan Tempat Lahir Pegawai..." value="<?= set_value('tanggal_lahir'); ?>">
                    <?= form_error('tanggal_lahir','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nomor Rekening:</label>
                    <input type="text" class="form-control form-control-user" id="no_rek" name="no_rek" placeholder="Masukan Nomor Rekening Pegawai..." value="<?= set_value('no_rek'); ?>">
                    <?= form_error('no_rek','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>NPWP:</label>
                    <input type="text" class="form-control form-control-user" id="npwp" name="npwp" placeholder="Masukan NPWP Pegawai..." value="<?= set_value('npwp'); ?>">
                    <?= form_error('npwp','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Jabatan:</label>
                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" placeholder="Masukan Jabatan Pegawai..." value="<?= set_value('jabatan'); ?>">
                    <?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Pangkat:</label>
                    <input type="text" class="form-control form-control-user" id="pangkat" name="pangkat" placeholder="Masukan Pangkat Pegawai..." value="<?= set_value('pangkat'); ?>">
                    <?= form_error('pangkat','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Golongan:</label>
                    <input type="text" class="form-control form-control-user" id="golongan" name="golongan" placeholder="Masukan golongan..." value="<?= set_value('golongan'); ?>">
                    <?= form_error('golongan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Tahun:</label>
                    <select name="tahun" class="form-control">
                        <option disabled>Pilih tahun:</option>
                        <?php for($i=date("Y")-15; $i <= date("Y"); $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('tahun','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Password:</label>
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password:</label>
                    <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                </div>
                <div class="form-group ">
                  <label for="level_access_id">Level Akses:</label>
                  <select class="form-control" id="level_access_id" name="level_access_id">
                    <option disabled>Pilih Level Akses:</option>
                    <?php foreach($level_akses as $la) : ?>
                      <option value="<?= $la['id_level_access'];?>"><?= $la['level_access'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('level_access_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                  <label for="work_unit_id">Unit Kerja:</label>
                  <select class="form-control" id="work_unit_id" name="work_unit_id">
                    <option disabled>Pilih Unit Kerja:</option>
                    <?php foreach($work_unit as $wu) : ?>
                      <option value="<?= $wu['id_work_unit'];?>"><?= $wu['work_unit'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('work_unit_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                  <label for="ruangan_id">Ruangan:</label>
                  <select class="form-control" id="ruangan_id" name="ruangan_id">
                    <option disabled>Pilih ruangan:</option>
                    <?php foreach($ruangan as $ru) : ?>
                      <option value="<?= $ru['id_ruangan'];?>"><?= $ru['ruangan'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('ruangan_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal-content -->