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
        <?= form_open_multipart('unit/doEditDataUnit/'); ?>
                <div class="form-group">
                     <label>ID Work Unit:</label>
                    <input type="text" class="form-control form-control-user" id="id_work_unit" name="id_work_unit" value="<?= $unit['id_work_unit']; ?>" READONLY>
                    <?= form_error('id_work_unit','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Nama Unit Kerja:</label>
                    <input type="text" class="form-control form-control-user" id="work_unit" name="work_unit" placeholder="Masukan Nama Unit Kerja..." value="<?= $unit['work_unit']; ?>">
                    <?= form_error('work_unit','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Kode Satuan Kerja:</label>
                    <input type="text" class="form-control form-control-user" id="kode_satker" name="kode_satker" placeholder="Masukan Kode Satuan Kerja..." value="<?= $unit['kode_satker']; ?>">
                    <?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Alamat:</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukan Alamat Pegawai..." ><?= $unit['alamat']; ?></textarea>
                    <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nomor Telepon:</label>
                    <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Masukan Nomor Telepon..." value="<?= $unit['no_telp']; ?>">
                    <?= form_error('no_telp','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama Ketua:</label>
                    <input type="text" class="form-control form-control-user" id="ketua" name="ketua" placeholder="Masukan Ketua Pegawai..." value="<?= $unit['ketua'];; ?>">
                    <?= form_error('ketua','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama Wakil Ketua:</label>
                    <input type="text" class="form-control form-control-user" id="wakil_ketua" name="wakil_ketua" placeholder="Masukan Wakil Ketua Pegawai..." value="<?= $unit['wakil_ketua']; ?>">
                    <?= form_error('wakil_ketua','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama Sekretaris:</label>
                    <input type="text" class="form-control form-control-user" id="sekretaris" name="sekretaris" placeholder="Masukan Sekretaris Pegawai..." value="<?= $unit['sekretaris']; ?>">
                    <?= form_error('sekretaris','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama PJ Barang Persediaan:</label>
                    <input type="text" class="form-control form-control-user" id="pj_barang_persediaan" name="pj_barang_persediaan" placeholder="Masukan PJ Barang Persediaan Pegawai..." value="<?= $unit['pj_barang_persediaan']; ?>">
                    <?= form_error('pj_barang_persediaan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
    				<div class="col-sm-2">Logo Kantor</div>
    				<div class="col-sm-10">
    					<div class="row">
    						<div class="col-sm-3">
    							<img src="<?= base_url('assets/img/logo/').$unit['logo_kantor']; ?>" class="img-thumbnail ">
    						</div>
    						<div class="col-sm-9">
    							<div class="custom-file">
 									<label class="custom-file-label" for="logo_kantor">Choose file</label>
  									<input type="file" class="custom-file-input" id="logo_kantor" name="logo_kantor">
								</div>
    						</div>
    					</div>
    				</div>
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