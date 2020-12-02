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
          <h3 class="box-title">Tabel Data Ruangan</h3>
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
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRuangan">Tambah Ruangan Baru</a>
            </div>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped ">
                  <thead>
                    <tr>
				      	<th scope="col">No</th>
				      	<th scope="col">Nama Ruangan</th>
                        <th scope="col">Action</th>
				    </tr>
                  </thead>
                  <tbody>
                  <?php 	$i = 1; ?>  
                  <?php foreach ($ruangan as $ru): ?>
                    <tr>
                        <td><?= $i;?></td>
                        <td><?= $ru['ruangan'];?></td>
                        <td>
                            <a href="<?= base_url('ruangan/editDataRuangan/').$ru['id_ruangan'];?>" class="badge badge-success">Edit</a>
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
      <?= form_open_multipart('ruangan/pengaturanRuangan'); ?>
        <div class="modal-body">
                <div class="form-group">
                    <label>Nama Ruangan:</label>
                    <input type="text" class="form-control form-control-user" id="ruangan" name="ruangan" placeholder="Masukan Nama Ruangan..." value="<?= set_value('ruangan'); ?>">
                    <?= form_error('ruangan','<small class="text-danger pl-3">','</small>'); ?> 
               
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