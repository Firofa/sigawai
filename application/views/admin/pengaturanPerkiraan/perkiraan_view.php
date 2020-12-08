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
          <h3 class="box-title">Tabel Data Perkiraan</h3>
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
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPerkiraan">Tambah Perkiraan Baru</a>
            </div>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
				      	<th>No</th>
				      	<th>Kode Perkiraan</th>
				      	<th>Nama Perkiraan</th>
				      	<th>Aktif</th>
                <th>Status Perkiraan</th>
                <th>Action</th>
				    </tr>
                  </thead>
                  <tbody>
                  <?php 	$i = 1; ?>  
                  <?php foreach ($perkiraan as $pe): ?>
                    <tr>
                        <td><?= $i;?></td>
                        <td><?= $pe['kode_perkiraan'];?></td>
                        <td><?= $pe['nama_perkiraan'];?></td>
                        <td><?= $pe['aktif'];?></td>
                        <td>
                          <?php
                            if($pe['status_perkiraan'] == 0) {
                              echo "Penghasilan";
                            } else if($pe['status_perkiraan'] == 1) {
                              echo "Potongan KPPN";
                            } else if($pe['status_perkiraan'] == 2) {
                              echo "Potongan Internal";
                            } else if($pe['status_perkiraan'] == 3) {
                              echo "Uang Makan";
                            } else {
                              echo "Remunerasi";
                            }
                          ?>
                        <td>
                            <a href="<?= base_url('Perkiraan/editDataPerkiraan/').$pe['id_perkiraan'];?>" class="badge badge-success">Edit</a>
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
            
<!-- Modal Content -->
<div class="modal fade" id="newPerkiraan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <?= form_open_multipart('Perkiraan'); ?>
        <div class="modal-body">
                <div class="form-group">
                    <label>Kode Perkiraan:</label>
                    <input type="text" class="form-control form-control-user" id="kode_perkiraan" name="kode_perkiraan" placeholder="Masukan Kode Perkiraan..." value="<?= set_value('kode_perkiraan'); ?>">
                    <?= form_error('kode_perkiraan','<small class="text-danger pl-3">','</small>'); ?>       
                </div>
                <div class="form-group">
                    <label>Nama Perkiraan:</label>
                    <input type="text" class="form-control form-control-user" id="nama_perkiraan" name="nama_perkiraan" placeholder="Masukan nama Perkiraan..." value="<?= set_value('nama_perkiraan'); ?>">
                    <?= form_error('nama_perkiraan','<small class="text-danger pl-3">','</small>'); ?>       
                </div>
                <div class="form-group">
                    <label>Status Perkiraan:</label>
                    <select class="form-control" id="status_perkiraan" name="status_perkiraan">
                        <option disabled>Pilih Perkiraan:</option>
                        <option value="0">Penghasilan</option>
                        <option value="1">Potongan KPPN</option>
                        <option value="2">Potongan Internal</option>
                    </select>      
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