 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data detail_gaji
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Gaji detail_gaji</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <?= form_open_multipart('gaji'); ?>

        <div class="form-group ">
            <label for="id_user">NIP detail_gaji:</label>
            <input type="text" class="form-control form-control-user" id="nip" name="nip" disabled value="<?= $detail_gaji['nip']; ?>">
            <?= form_error('id_user','<small class="text-danger pl-3">','</small>'); ?> 
        </div>
        <div class="form-group ">
            <label for="tgl_gaji">Tanggal Gajian:</label>
            <input type="date" class="form-control form-control-user" id="tgl_gaji" name="tgl_gaji" placeholder="Masukan Tanggal Gajian..." value="<?= $detail_gaji['tgl_gaji']; ?>">
            <?= form_error('tgl_gaji','<small class="text-danger pl-3">','</small>'); ?> 
        </div>
        <!-- ____________________________________ -->
        <hr>
        <h4><b>A. Penghasilan</b></h4>
        <hr>
        <div class="form-group">
            <label>Gaji Pokok:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="gaji_pokok" name="gaji_pokok" placeholder="Masukan Gaji Pokok..." value="<?= $detail_gaji['Gaji Pokok']; ?>">
            <?= form_error('gaji_pokok','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Tunjangan Istri/Suami:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_is" name="tunjangan_is" placeholder="Masukan Tunjangan Istri/Suami..." value="<?= $detail_gaji['Tunjangan Istri/Suami']; ?>">
            <?= form_error('tunjangan_is','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Tunjangan Anak:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_anak" name="tunjangan_anak" placeholder="Masukan Tunjangan Anak..." value="<?= $detail_gaji['Tunjangan Anak']; ?>">
            <?= form_error('tunjangan_anak','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Tunjangan Umum:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_umum" name="tunjangan_umum" placeholder="Masukan Tunjangan Umum..." value="<?= $detail_gaji['Tunjangan Umum']; ?>">
            <?= form_error('tunjangan_umum','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Tunjangan Kemahalan Hakim:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_kh" name="tunjangan_kh" placeholder="Masukan Tunjangan Kemahalaan Hakim..." value="<?= $detail_gaji['Tunjangan Kemahalan Hakim']; ?>">
            <?= form_error('tunjangan_kh','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Tunjangan Struktural:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_struktural" name="tunjangan_struktural" placeholder="Masukan Tunjangan Struktural..." value="<?= $detail_gaji['Tunjangan Struktural']; ?>">
            <?= form_error('tunjangan_struktural','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Tunjangan Fungsional:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_fungsional" name="tunjangan_fungsional" placeholder="Masukan Tunjangan Fungsional..." value="<?= $detail_gaji['Tunjangan Fungsional']; ?>">
            <?= form_error('tunjangan_fungsional','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Tunjangan Beras:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_beras" name="tunjangan_beras" placeholder="Masukan Tunjangan Beras..." value="<?= $detail_gaji['Tunjangan Beras']; ?>">
            <?= form_error('tunjangan_beras','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Tunjangan Khusus Pajak:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_kp" name="tunjangan_kp" placeholder="Masukan Tunjangan Khusus Pajak..." value="<?= $detail_gaji['Tunjangan Khusus Pajak']; ?>">
            <?= form_error('tunjangan_kp','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Uang Lauk Pauk:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="uang_lp" name="uang_lp" placeholder="Masukan Uang Lauk Pauk..." value="<?= $detail_gaji['Uang Lauk Pauk']; ?>">
            <?= form_error('uang_lp','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Tunjangan Kinerja:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="tunjangan_kinerja" name="tunjangan_kinerja" placeholder="Masukan Tunjangan Kinerja..." value="<?= $detail_gaji['Tunjangan Kinerja']; ?>">
            <?= form_error('tunjangan_kinerja','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Honor Lainnya:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="honor_lainnya" name="honor_lainnya" placeholder="Masukan Honor Lainnya..." value="<?= $detail_gaji['Honor Lainnya']; ?>">
            <?= form_error('honor_lainnya','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <!-- ____________________________________ -->
        <hr>
            <h4><b>B. Potongan KPPN</b></h4>
        <hr>
        <div class="form-group">
            <label>IWP:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iwp" name="iwp" placeholder="Masukan Potongan IWP..." value="<?= $detail_gaji['IWP']; ?>">
            <?= form_error('iwp','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Iuran BPJS:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_bpjs" name="iuran_bpjs" placeholder="Masukan Potongan Iuran BPJS..." value="<?= $detail_gaji['Iuran BPJS']; ?>">
            <?= form_error('iuran_bpjs','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Potongan PPH:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="potongan_pph" name="potongan_pph" placeholder="Masukan Potongan PPH..." value="<?= $detail_gaji['Potongan PPH']; ?>">
            <?= form_error('potongan_pph','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Sewa Rumah:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="sewa_rumah" name="sewa_rumah" placeholder="Masukan Potongan Sewa Rumah..." value="<?= $detail_gaji['Sewa Rumah']; ?>">
            <?= form_error('sewa_rumah','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Taperum:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="taperum" name="taperum" placeholder="Masukan Potongan Taperum..." value="<?= $detail_gaji['Taperum']; ?>">
            <?= form_error('taperum','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Pot. Lain (Persekot Gaji, TGR):</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="pot_lain" name="pot_lain" placeholder="Masukan Potongan Lain (Persekot Gaji, TGR)..." value="<?= $detail_gaji['Pot. Lain (Persekot Gaji, TGR)']; ?>">
            <?= form_error('pot_lain','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <!-- ____________________________________ -->
        <hr>
            <h4><b>C. Potongan Internal</b></h4>
        <hr>
        <div class="form-group">
            <label>Iuran IKAHI:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_ikahi" name="iuran_ikahi" placeholder="Masukan Potongan Iuran IKAHI..." value="<?= $detail_gaji['Iuran IKAHI']; ?>">
            <?= form_error('iuran_ikahi','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Iuran YDSH:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_ydsh" name="iuran_ydsh" placeholder="Masukan Potongan Iuran YDSH..." value="<?= $detail_gaji['Iuran YDSH']; ?>">
            <?= form_error('iuran_ydsh','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Simpanan Pokok Koperasi:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="simpanan_pokok_koperasi" name="simpanan_pokok_koperasi" placeholder="Masukan Potongan Simpanan Pokok Koperasi..." value="<?= $detail_gaji['Simpanan Pokok Koperasi']; ?>">
            <?= form_error('simpanan_pokok_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Simpanan Wajib Koperasi:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="simpanan_wajib_koperasi" name="simpanan_wajib_koperasi" placeholder="Masukan Potongan Simpanan Wajib Koperasi..." value="<?= $detail_gaji['Simpanan Wajib Koperasi']; ?>">
            <?= form_error('simpanan_wajib_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Simpanan Sukarela Koperasi:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="simpanan_sukarela_koperasi" name="simpanan_sukarela_koperasi" placeholder="Masukan Potongan Simpanan Sukarela Koperasi..." value="<?= $detail_gaji['Simpanan Sukarela Koperasi']; ?>">
            <?= form_error('simpanan_sukarela_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Angsuran Pinjaman Koperasi:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="angsuran_pinjaman_koperasi" name="angsuran_pinjaman_koperasi" placeholder="Masukan Potongan Angsuran Pinjaman Koperasi..." value="<?= $detail_gaji['Angsuran Pinjaman Koperasi']; ?>">
            <?= form_error('angsuran_pinjaman_koperasi','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Iuran Dharma Yukti:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_dharma_yukti" name="iuran_dharma_yukti" placeholder="Masukan Potongan Iuran Dharma Yukti..." value="<?= $detail_gaji['Iuran Dharma Yukti']; ?>">
            <?= form_error('iuran_dharma_yukti','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Iuran PTWP:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_ptwp" name="iuran_ptwp" placeholder="Masukan Potongan Iuran PTWP..." value="<?= $detail_gaji['Iuran PTWP']; ?>">
            <?= form_error('iuran_ptwp','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Iuran Olahraga:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_olahraga" name="iuran_olahraga" placeholder="Masukan Potongan Iuran Olahraga..." value="<?= $detail_gaji['Iuran Olah Raga']; ?>">
            <?= form_error('iuran_olahraga','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Donasi Dharmayukti Karini:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="donasi_dk" name="donasi_dk" placeholder="Masukan Potongan Donasi Dharmayukti karini..." value="<?= $detail_gaji['Donasi Dharmayukti Kartini']; ?>">
            <?= form_error('donasi_dk','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Iuran Muslim:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_muslim" name="iuran_muslim" placeholder="Masukan Potongan Iuran Muslim..." value="<?= $detail_gaji['Iuran Muslim']; ?>">
            <?= form_error('iuran_muslim','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Arisan Cabang Dharmayukti:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="arisan_cd" name="arisan_cd" placeholder="Masukan Potongan Arisan Cabang Dharmayukti..." value="<?= $detail_gaji['Arisan Cabang Dharmayukti']; ?>">
            <?= form_error('arisan_cd','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Iuran IPASPI</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_ipaspi" name="iuran_ipaspi" placeholder="Masukan Potongan Iuran IPASPI..." value="<?= $detail_gaji['Iuran IPASPI']; ?>">
            <?= form_error('iuran_ipaspi','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Potongan Lain/Arisan DYK Daerah:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="pot_lain_arisan" name="pot_lain_arisan" placeholder="Masukan Potongan Lain/Arisan DYK Daerah..." value="<?= $detail_gaji['Potongan Lain/Arisan DYK Daerah']; ?>">
            <?= form_error('pot_lain_arisan','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Sumbangan Sosial:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="sumbangan_sosial" name="sumbangan_sosial" placeholder="Masukan Potongan Sumbangan Sosial..." value="<?= $detail_gaji['Sumbangan Sosial']; ?>">
            <?= form_error('sumbangan_sosial','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Sumbangan Persekutuan Kristiani:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="sumbangan_pk" name="sumbangan_pk" placeholder="Masukan Potongan Sumbangan Persekutuan Kristiani..." value="<?= $detail_gaji['Sumbangan Persekutuan Kristiani']; ?>">
            <?= form_error('sumbangan_pk','<small class="text-danger pl-3">','</small>'); ?>       
        </div>
        <div class="form-group">
            <label>Iuran Untuk Tenaga Kebersihan:</label>
            <input type="text" data-type="currency" class="form-control form-control-user" id="iuran_tk" name="iuran_tk" placeholder="Masukan Potongan Iuran Untuk Tenaga Kebersihan..." value="<?= $detail_gaji['IWP']; ?>">
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->