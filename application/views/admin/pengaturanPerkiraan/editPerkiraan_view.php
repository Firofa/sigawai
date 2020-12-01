 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Perkiraan
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Perkiraan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <?= $this->session->flashdata('message'); ?>
        <?= form_open_multipart('perkiraan/doEditDataPerkiraan/'); ?>
                <div class="form-group ">
                    <input type="text" class="form-control form-control-user" id="id_perkiraan" name="id_perkiraan" value="<?= $perkiraan['id_perkiraan'];?>" READONLY>
                    <?= form_error('id_perkiraan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Kode Perkiraan:</label>
                    <input type="text" class="form-control form-control-user" id="kode_perkiraan" name="kode_perkiraan" value="<?= $perkiraan['kode_perkiraan'];?>" placeholder="Masukan Kode Perkiraan..." value="<?= set_value('kode_perkiraan'); ?>">
                    <?= form_error('nama_perkiraan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nama Perkiraan:</label>
                    <input type="text" class="form-control form-control-user" id="nama_perkiraan" name="nama_perkiraan" value="<?= $perkiraan['nama_perkiraan'];?>" placeholder="Masukan Nama Perkiraan..." value="<?= set_value('nama_perkiraan'); ?>">
                    <?= form_error('nama_perkiraan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Aktif/Tidak (Y/N):</label>
                    <select name="aktif" class="form-control">
                        <option disabled>Pilih Aktif/Tidak Aktif:</option>
                        <option value="<?= $perkiraan['aktif'];?>">Data Saat ini: <?= $perkiraan['aktif'];?></option>
                        <option value="Y"><?= "Y" ?></option>
                        <option value="N"><?= "N" ?></option>
                    </select>
                    <?= form_error('aktif','<small class="text-danger pl-3">','</small>'); ?>  
                </div>
                <div class="form-group ">
                    <label>Status Perkiraan:</label>
                    <select name="status_perkiraan" class="form-control">
                        <option disabled>Pilih Status Perkiraan:</option>
                        <option value="<?= $perkiraan['status_perkiraan'];?>">Data Saat ini: <?php echo $perkiraan['status_perkiraan'] == 0 ? "Penghasilan" : ($perkiraan['status_perkiraan'] == 1 ? "Potongan KKN" : "Potongan Internal"); ?></option>
                        <option value="0"><?= "Penghasilan" ?></option>
                        <option value="1"><?= "Potongan KKN" ?></option>
                        <option value="2"><?= "Potongan Internal" ?></option>
                    </select>
                    <?= form_error('status_perkiraan','<small class="text-danger pl-3">','</small>'); ?>  
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