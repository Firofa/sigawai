 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Gaji Pegawai
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- Default box -->
       <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Gaji Pegawai</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              <?php  if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                <?php  endif; ?>
                <?= $this->session->flashdata('message'); 	 ?>
        </div>
        <div class="box-body">
          <?= form_open_multipart('gaji'); ?>

                <div class="form-group ">
                  <label for="id_user">Pilih Pegawai:</label>
                    <select class="form-control" id="id_user" name="id_user">
                      <option disabled>Pilih Pegawai:</option>
                      <?php foreach($users as $us) : ?>
                        <option value="<?= $us['id_user'];?>"><?= $us['nip'].".".$us['name'];?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('id_user','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                  <label for="tgl_gaji">Tanggal Gajian:</label>
                  <input type="date" class="form-control form-control-user" id="tgl_gaji" name="tgl_gaji" placeholder="Masukan Tanggal Gajian..." value="<?= set_value('tgl_gaji'); ?>">
                    <?= form_error('tgl_gaji','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <!-- ____________________________________ -->
                <hr>
                <h4><b>A. Penghasilan</b></h4>
                <hr>
                  <div class="form-group">
                      <label>Gaji Pokok:</label>
                      <input type="number" class="form-control form-control-user" id="gaji_pokok" name="gaji_pokok" placeholder="Masukan Gaji Pokok..." value="<?= set_value('gaji_pokok'); ?>">
                      <?= form_error('gaji_pokok','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Istri/Suami:</label>
                      <input type="number" class="form-control form-control-user" id="tunjangan_is" name="tunjangan_is" placeholder="Masukan Tunjangan Istri/Suami..." value="<?= set_value('tunjangan_is'); ?>">
                      <?= form_error('tunjangan_is','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Anak:</label>
                      <input type="number" class="form-control form-control-user" id="tunjangan_anak" name="tunjangan_anak" placeholder="Masukan Tunjangan Anak..." value="<?= set_value('tunjangan_anak'); ?>">
                      <?= form_error('tunjangan_anak','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Umum:</label>
                      <input type="number" class="form-control form-control-user" id="tunjangan_umum" name="tunjangan_umum" placeholder="Masukan Tunjangan Umum..." value="<?= set_value('tunjangan_umum'); ?>">
                      <?= form_error('tunjangan_umum','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Kemahalan Hakim:</label>
                      <input type="number" class="form-control form-control-user" id="tunjangan_kh" name="tunjangan_kh" placeholder="Masukan Tunjangan Kemahalaan Hakim..." value="<?= set_value('tunjangan_kh'); ?>">
                      <?= form_error('tunjangan_kh','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Struktural:</label>
                      <input type="number" class="form-control form-control-user" id="tunjangan_struktural" name="tunjangan_struktural" placeholder="Masukan Tunjangan Struktural..." value="<?= set_value('tunjangan_struktural'); ?>">
                      <?= form_error('tunjangan_struktural','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Fungsional:</label>
                      <input type="number" class="form-control form-control-user" id="tunjangan_fungsional" name="tunjangan_fungsional" placeholder="Masukan Tunjangan Fungsional..." value="<?= set_value('tunjangan_fungsional'); ?>">
                      <?= form_error('tunjangan_fungsional','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Beras:</label>
                      <input type="number" class="form-control form-control-user" id="tunjangan_beras" name="tunjangan_beras" placeholder="Masukan Tunjangan Beras..." value="<?= set_value('tunjangan_beras'); ?>">
                      <?= form_error('tunjangan_beras','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Tunjangan Khusus Pajak:</label>
                      <input type="number" class="form-control form-control-user" id="tunjangan_kp" name="tunjangan_kp" placeholder="Masukan Tunjangan Khusus Pajak..." value="<?= set_value('tunjangan_kp'); ?>">
                      <?= form_error('tunjangan_kp','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <!-- ____________________________________ -->
                  <hr>
                    <h4><b>B. Potongan KPPN</b></h4>
                  <hr>
                  <div class="form-group">
                      <label>IWP:</label>
                      <input type="number" class="form-control form-control-user" id="iwp" name="iwp" placeholder="Masukan Potongan IWP..." value="<?= set_value('iwp'); ?>">
                      <?= form_error('iwp','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran BPJS:</label>
                      <input type="number" class="form-control form-control-user" id="iuran_bpjs" name="iuran_bpjs" placeholder="Masukan Potongan Iuran BPJS..." value="<?= set_value('iuran_bpjs'); ?>">
                      <?= form_error('iuran_bpjs','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Potongan PPH:</label>
                      <input type="number" class="form-control form-control-user" id="potongan_pph" name="potongan_pph" placeholder="Masukan Potongan PPH..." value="<?= set_value('potongan_pph'); ?>">
                      <?= form_error('potongan_pph','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Sewa Rumah:</label>
                      <input type="number" class="form-control form-control-user" id="sewa_rumah" name="sewa_rumah" placeholder="Masukan Potongan Sewa Rumah..." value="<?= set_value('sewa_rumah'); ?>">
                      <?= form_error('sewa_rumah','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Taperum:</label>
                      <input type="number" class="form-control form-control-user" id="taperum" name="taperum" placeholder="Masukan Potongan Taperum..." value="<?= set_value('taperum'); ?>">
                      <?= form_error('taperum','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Pot. Lain (Persekot Gaji, TGR):</label>
                      <input type="number" class="form-control form-control-user" id="pot_lain" name="pot_lain" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('pot_lain'); ?>">
                      <?= form_error('pot_lain','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <!-- ____________________________________ -->
                  <hr>
                      <h4><b>C. Potongan Internal</b></h4>
                  <hr>
                  <div class="form-group">
                      <label>Iuran IKAHI:</label>
                      <input type="number" class="form-control form-control-user" id="iuran_ikahi" name="iuran_ikahi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_ikahi'); ?>">
                      <?= form_error('iuran_ikahi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran YDSH:</label>
                      <input type="number" class="form-control form-control-user" id="iuran_ydsh" name="iuran_ydsh" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_ydsh'); ?>">
                      <?= form_error('iuran_ydsh','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Simpanan Pokok Koperasi:</label>
                      <input type="number" class="form-control form-control-user" id="simpanan_pokok_koperasi" name="simpanan_pokok_koperasi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('simpanan_pokok_koperasi'); ?>">
                      <?= form_error('simpanan_pokok_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Simpanan Wajib Koperasi:</label>
                      <input type="number" class="form-control form-control-user" id="simpanan_wajib_koperasi" name="simpanan_wajib_koperasi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('simpanan_wajib_koperasi'); ?>">
                      <?= form_error('simpanan_wajib_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Simpanan Sukarela Koperasi:</label>
                      <input type="number" class="form-control form-control-user" id="simpanan_sukarela_koperasi" name="simpanan_sukarela_koperasi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('simpanan_sukarela_koperasi'); ?>">
                      <?= form_error('simpanan_sukarela_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Angsuran Pinjaman Koperasi:</label>
                      <input type="number" class="form-control form-control-user" id="angsuran_pinjaman_koperasi" name="angsuran_pinjaman_koperasi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('angsuran_pinjaman_koperasi'); ?>">
                      <?= form_error('angsuran_pinjaman_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran Dharma Yukti:</label>
                      <input type="number" class="form-control form-control-user" id="iuran_dharma_yukti" name="iuran_dharma_yukti" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_dharma_yukti'); ?>">
                      <?= form_error('iuran_dharma_yukti','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran PTWP:</label>
                      <input type="number" class="form-control form-control-user" id="iuran_ptwp" name="iuran_ptwp" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_ptwp'); ?>">
                      <?= form_error('iuran_ptwp','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran Olahraga:</label>
                      <input type="number" class="form-control form-control-user" id="iuran_olahraga" name="iuran_olahraga" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_olahraga'); ?>">
                      <?= form_error('iuran_olahraga','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Donasi Dharmayukti Karini:</label>
                      <input type="number" class="form-control form-control-user" id="donasi_dk" name="donasi_dk" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('donasi_dk'); ?>">
                      <?= form_error('donasi_dk','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran Muslim:</label>
                      <input type="number" class="form-control form-control-user" id="iuran_muslim" name="iuran_muslim" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_muslim'); ?>">
                      <?= form_error('iuran_muslim','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Arisan Cabang Dharmayukti:</label>
                      <input type="number" class="form-control form-control-user" id="arisan_cd" name="arisan_cd" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('arisan_cd'); ?>">
                      <?= form_error('arisan_cd','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran IPASPI</label>
                      <input type="number" class="form-control form-control-user" id="iuran_ipaspi" name="iuran_ipaspi" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_ipaspi'); ?>">
                      <?= form_error('iuran_ipaspi','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Potongan Lain/Arisan DYK Daerah:</label>
                      <input type="number" class="form-control form-control-user" id="pot_lain_arisan" name="pot_lain_arisan" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('pot_lain_arisan'); ?>">
                      <?= form_error('pot_lain_arisan','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Sumbangan Sosial:</label>
                      <input type="number" class="form-control form-control-user" id="sumbangan_sosial" name="sumbangan_sosial" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('sumbangan_sosial'); ?>">
                      <?= form_error('sumbangan_sosial','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Sumbangan Persekutuan Kristiani:</label>
                      <input type="number" class="form-control form-control-user" id="sumbangan_pk" name="sumbangan_pk" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('sumbangan_pk'); ?>">
                      <?= form_error('sumbangan_pk','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  <div class="form-group">
                      <label>Iuran Untuk Tenaga Kebersihan:</label>
                      <input type="number" class="form-control form-control-user" id="iuran_tk" name="iuran_tk" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= set_value('iuran_tk'); ?>">
                      <?= form_error('iuran_tk','<small class="text-danger pl-3">','</small>'); ?>       
                  </div>
                  


                    
         
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
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

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Gaji Pegawai</h3>
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
            </div>
            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pegawai</th>
                      <th>NIP Pegawai</th>
                      <th>Tanggal Gajian</th>
                      <th>Penghasilan Kotor</th>
                      <th>Potongan KPPN</th>
                      <th>Penghasilan Bersih</th>
                      <th>Potongan Internal</th>
                      <th>Gaji Bersih</th>
                      <th>Created_at</th>      	
                      <th>Action</th>
				            </tr>
                  </thead>
                  <tbody>
                    <?php 	$i = 1; ?>  
                    <?php foreach ($gaji as $gj): ?>
                      <tr>
                        <td><?= $i;?></td>
                        <td><?= $gj['name'];?></td>
                        <td><?= $gj['nip'];?></td>
                        <td><?= $gj['tgl_gaji'];?></td>
                        <td><?= 'Rp.'.number_format($gj['penghasilan_kotor'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['potongan_kppn'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['penghasilan_bersih'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['potongan_internal'],2,',','.');?></td>
                        <td><?= 'Rp.'.number_format($gj['gaji_bersih'],2,',','.');?></td>
                        <td><?= $gj['waktu_input'];?></td>
                        <td>
                            <!-- <a href="<?php //base_url('Gaji/editDataTransaksiGaji/').$gj['id_transaksi_gaji'];?>" class="badge badge-success">Edit</a> -->
                            <a href="#">Edit</a>
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

