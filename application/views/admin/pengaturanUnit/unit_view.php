 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Unit Kerja
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Unit Kerja</h3>
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
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRuangan">Tambah Unit Kerja Baru</a>
            </div>
            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                        <th scope="col">No</th>
				      	<th scope="col">Unit Kerja</th>
				      	<th scope="col">Kode Satuan Kerja</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Ketua</th>
                        <th scope="col">Wakil Ketua</th>
                        <th scope="col">Sekretaris</th>
                        <th scope="col">PJ Barang Persediaan</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Action</th>
				    </tr>
                  </thead>
                  <tbody>
                  <?php 	$i = 1; ?>  
                  <?php foreach ($unit as $un): ?>
                    <tr>
                        <td><?= $i;?></td>
				      	<td><?= $un['work_unit'];?></td>
                        <td><?= $un['kode_satker'];?></td>
                        <td><?= $un['alamat']?></td>
                        <td><?= $un['no_telp'];?></td>
                        <td><?= $un['ketua'];?></td>
                        <td><?= $un['wakil_ketua'];?></td>
                        <td><?= $un['sekretaris'];?></td>
                        <td><?= $un['pj_barang_persediaan'];?></td>
                        <td><img src="<?= base_url('assets/img/logo/').$un['logo_kantor'];?>" class="img-thumbnail" style="width:100px; height:50px;" alt="Logo kantor"></td>
                        <td>
                                <a href="<?= base_url('unit/editDataUnit/').$un['id_work_unit'];?>" class="badge badge-success">Edit</a>
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
<div class="modal fade" id="newRuangan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <?= form_open_multipart('unit'); ?>
      <div class="modal-body">
      <div class="form-group">
                    <label>Nama Unit Kerja:</label>
                    <input type="text" class="form-control form-control-user" id="work_unit" name="work_unit" placeholder="Masukan Nama Unit Kerja..." value="<?= set_value('work_unit'); ?>">
                    <?= form_error('work_unit','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Kode Satuan Kerja:</label>
                    <input type="text" class="form-control form-control-user" id="kode_satker" name="kode_satker" placeholder="Masukan Kode Satuan Kerja..." value="<?= set_value('kode_satker'); ?>">
                    <?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Alamat:</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukan Alamat Pegawai..." value="<?= set_value('alamat'); ?>"></textarea>
                    <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nomor Telepon:</label>
                    <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Masukan Nomor Telepon..." value="<?= set_value('no_telp'); ?>">
                    <?= form_error('no_telp','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama Ketua:</label>
                    <input type="text" class="form-control form-control-user" id="ketua" name="ketua" placeholder="Masukan Ketua Pegawai..." value="<?= set_value('ketua'); ?>">
                    <?= form_error('ketua','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama Wakil Ketua:</label>
                    <input type="text" class="form-control form-control-user" id="wakil_ketua" name="wakil_ketua" placeholder="Masukan Wakil Ketua Pegawai..." value="<?= set_value('wakil_ketua'); ?>">
                    <?= form_error('wakil_ketua','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama Sekretaris:</label>
                    <input type="text" class="form-control form-control-user" id="sekretaris" name="sekretaris" placeholder="Masukan Sekretaris Pegawai..." value="<?= set_value('sekretaris'); ?>">
                    <?= form_error('sekretaris','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama PJ Barang Persediaan:</label>
                    <input type="text" class="form-control form-control-user" id="pj_barang_persediaan" name="pj_barang_persediaan" placeholder="Masukan PJ Barang Persediaan Pegawai..." value="<?= set_value('pj_barang_persediaan'); ?>">
                    <?= form_error('pj_barang_persediaan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Logo Kantor:</label>
                    <input type="file" class="form-control form-control-user" id="logo_kantor" name="logo_kantor" placeholder="Masukan Logo Kantor..." value="<?= set_value('logo_kantor'); ?>">
                    <?= form_error('logo_kantor','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
    </div>
  </div>
</div>
<!-- /.modal-content -->