<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {
    public function __construct() 
	{
        parent::__construct();
		//Cek jika bukan admin
		$role = $this->session->userdata('level_access_id');
		if($role !== "1" && $role !== "2") {
			redirect();
		} 
		$this->load->library('form_validation');
    }

    public function index() {
        //
        $this->form_validation->set_rules("id_user","Id User","required|trim");
        $this->form_validation->set_rules("tgl_gaji","Tanggal Gajian","required|trim");
        //validasi penghasilan
        $this->form_validation->set_rules("gaji_pokok","Gaji Pokok","required|trim");
        $this->form_validation->set_rules("tunjangan_is","Tunjangan Istri / Suami","required|trim");
        $this->form_validation->set_rules("tunjangan_anak","Tunjangan Anak","required|trim");
        $this->form_validation->set_rules("tunjangan_umum","Tunjangan Umum","required|trim");
        $this->form_validation->set_rules("tunjangan_kh","Tunjangan Kemahalan Hakim","required|trim");
        $this->form_validation->set_rules("tunjangan_struktural","Tunjangan Struktural","required|trim");
        $this->form_validation->set_rules("tunjangan_fungsional","Tunjangan Fungsional","required|trim");
        $this->form_validation->set_rules("tunjangan_beras","Tunjangan Beras","required|trim");
        $this->form_validation->set_rules("tunjangan_kp","Tunjangan Khusus Pajak","required|trim");
        //validasi potongan
        $this->form_validation->set_rules("iwp","Potongan IWP","required|trim");
        $this->form_validation->set_rules("iuran_bpjs","Iuran BPJS","required|trim");
        $this->form_validation->set_rules("potongan_pph","Potongan PPH","required|trim");
        $this->form_validation->set_rules("sewa_rumah","Sewa Rumah","required|trim");
        $this->form_validation->set_rules("taperum","Taperum","required|trim");
        $this->form_validation->set_rules("pot_lain","Pot. Lain (Persekot Gaji, TGR)","required|trim");
        //validasi potongan internal
        $this->form_validation->set_rules("iuran_ikahi","Iuran IKAHI","required|trim");
        $this->form_validation->set_rules("iuran_ydsh","Iuran YDSH","required|trim");
        $this->form_validation->set_rules("simpanan_pokok_koperasi","Simpanan Pokok Koperasi","required|trim");
        $this->form_validation->set_rules("simpanan_wajib_koperasi","Simpanan Wajib Koperasi","required|trim");
        $this->form_validation->set_rules("simpanan_sukarela_koperasi","Simpanan Sukarela Koperasi","required|trim");
        $this->form_validation->set_rules("angsuran_pinjaman_koperasi","Angsuran Pinjaman Koperasi","required|trim");
        $this->form_validation->set_rules("iuran_dharma_yukti","Iuran Dharma Yukti","required|trim");
        $this->form_validation->set_rules("iuran_ptwp","Iuran PTWP","required|trim");
        $this->form_validation->set_rules("iuran_olahraga","Iuran Olahraga","required|trim");
        $this->form_validation->set_rules("donasi_dk","Donasi Dharmayukti Karini","required|trim");
        $this->form_validation->set_rules("iuran_muslim","Iuran Muslim","required|trim");
        $this->form_validation->set_rules("arisan_cd","Arisan Cabang Dharmayukti","required|trim");
        $this->form_validation->set_rules("iuran_ipaspi","Iuran IPASPI","required|trim");
        $this->form_validation->set_rules("pot_lain_arisan","Potongan Lain/Arisan DYK Daerah","required|trim");
        $this->form_validation->set_rules("sumbangan_sosial","Sumbangan Sosial","required|trim");
        $this->form_validation->set_rules("sumbangan_pk","Sumbangan Persekutuan Kristiani","required|trim");
        $this->form_validation->set_rules("iuran_tk","Iuran Untuk Tenaga Kebersihan","required|trim");

        
        if($this->form_validation->run() == false) {
            $data['title'] = "Admin Page | SIPERMA";
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
            $data['users'] = $this->user->getDataUsersNameNip();
            //Mengambil data perkiraan
		    $this->load->model('gaji_model','gaji');
            $data['gaji'] = $this->gaji->GetDataTransaksiGaji();
            $this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_topbar',$data);
			$this->load->view('templates/admin_sidebar',$data);
			$this->load->view('admin/pengaturanGaji/pengaturanGaji_view',$data);
        } else {
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
            //Menggolongkan Data Penghasilan
            $penghasilan = [
                htmlspecialchars($this->input->post('gaji_pokok'),true),
                htmlspecialchars($this->input->post('tunjangan_is'),true),
                htmlspecialchars($this->input->post('tunjangan_anak'),true),
                htmlspecialchars($this->input->post('tunjangan_umum'),true),
                htmlspecialchars($this->input->post('tunjangan_kh'),true),
                htmlspecialchars($this->input->post('tunjangan_struktural'),true),
                htmlspecialchars($this->input->post('tunjangan_fungsional'),true),
                htmlspecialchars($this->input->post('tunjangan_beras'),true),
                htmlspecialchars($this->input->post('tunjangan_kp'),true)
            ];
            //Merapihkan Data Array Penghasilan
            $penghasilan = str_replace(["Rp ",".",",00"],"",$penghasilan,$i);
            //Menjumlahkan Penghasilan Keseluruhan
            $nilai_penghasilan = array_sum($penghasilan);
            //Menggolongkan Data Potongan KPPN
            $potongan_kppn = [
                htmlspecialchars($this->input->post('iwp'),true),
                htmlspecialchars($this->input->post('iuran_bpjs'),true),
                htmlspecialchars($this->input->post('potongan_pph'),true),
                htmlspecialchars($this->input->post('sewa_rumah'),true),
                htmlspecialchars($this->input->post('taperum'),true),
                htmlspecialchars($this->input->post('pot_lain'),true)
            ];
             //Merapihkan Data Array Potongan KPPN
            $potongan_kppn = str_replace(["Rp ",".",",00"],"",$potongan_kppn,$i);
             //Menjumlahkan Potongan KPPN Keseluruhan
            $nilai_potongan_kppn = array_sum($potongan_kppn);
            //Menggolongkan Data Potongan Internal
            $potongan_internal = [
                htmlspecialchars($this->input->post('iuran_ikahi'),true),
                htmlspecialchars($this->input->post('iuran_ydsh'),true),
                htmlspecialchars($this->input->post('simpanan_pokok_koperasi'),true),
                htmlspecialchars($this->input->post('simpanan_wajib_koperasi'),true),
                htmlspecialchars($this->input->post('simpanan_sukarela_koperasi'),true),
                htmlspecialchars($this->input->post('angsuran_pinjaman_koperasi'),true),
                htmlspecialchars($this->input->post('iuran_dharma_yukti'),true),
                htmlspecialchars($this->input->post('iuran_ptwp'),true),
                htmlspecialchars($this->input->post('iuran_olahraga'),true),
                htmlspecialchars($this->input->post('donasi_dk'),true),
                htmlspecialchars($this->input->post('iuran_muslim'),true),
                htmlspecialchars($this->input->post('arisan_cd'),true),
                htmlspecialchars($this->input->post('iuran_ipaspi'),true),
                htmlspecialchars($this->input->post('pot_lain_arisan'),true),
                htmlspecialchars($this->input->post('sumbangan_sosial'),true),
                htmlspecialchars($this->input->post('sumbangan_pk'),true),
                htmlspecialchars($this->input->post('iuran_tk'),true)
            ];
            //Merapihkan Data Array Potongan Internal
            $potongan_internal = str_replace(["Rp ",".",",00"],"",$potongan_internal,$i);
            //Menjumlahkan Data Potongan Internal Keseluruhan
            $nilai_potongan_internal = array_sum($potongan_internal);
            //Kalkulasi Penghasilan Bersih
            $penghasilan_bersih = $nilai_penghasilan - $nilai_potongan_kppn;
            //Kalkulasi Gaji Bersih
            $gaji_bersih = $penghasilan_bersih - $nilai_potongan_internal;
            //Inisialisasi Id
            $id_transaksi_gaji = uniqid('tgaji');
            //Penggolongan Data Kedalam masing" Kolom
            $data_transaksi_gaji = [
                'id_transaksi_gaji' => $id_transaksi_gaji,
                'user_id' => htmlspecialchars($this->input->post('id_user'),true),
                'tgl_gaji' => htmlspecialchars($this->input->post('tgl_gaji'),true),
                'penghasilan_kotor' => $nilai_penghasilan,
                'potongan_kppn' => $nilai_potongan_kppn,
                'penghasilan_bersih' => $penghasilan_bersih,
                'potongan_internal' => $nilai_potongan_internal,
                'gaji_bersih' => $gaji_bersih,
                'user_input_id' => $data['user']['id_user']
            ];
            //Memasukan Data Ke Database
            $this->db->insert('transaksi_gaji',$data_transaksi_gaji);
            //Persiapan Input Rincian Gaji
            $this->load->model('gaji_model','gaji');
            $data['dataGaji'] = $this->gaji->getDataGajiById($id_transaksi_gaji);
            $rincian = array_merge($penghasilan,$potongan_kppn,$potongan_internal);
            $rincian_gaji = [];
            for($i = 0; $i < count($rincian); $i++){
                if($i == 9) {
                    array_push($rincian_gaji,[
                        'transaksi_gaji_id' => $id_transaksi_gaji,
                        'perkiraan_id' => $i+1,
                        'jumlah' => $nilai_penghasilan
                    ]);
                }
                array_push($rincian_gaji,[
                    'transaksi_gaji_id' => $id_transaksi_gaji,
                    'perkiraan_id' => $i+1,
                    'jumlah' => $rincian[$i]
                ]);
            }

            $this->db->insert_batch('rincian_transaksi_gaji',$rincian_gaji);
			$this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Data Transaksi Gaji berhasil dimasukkan.</div>");
			redirect('gaji');
        }
    }

    public function editDataTransaksiGaji($id_transaksiGaji) {
		$data['title'] = "Admin Page | SIPERMA";
		//Ambil data user login
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		//Mengambil data perkiraan yang di edit
		$this->load->model('gaji_model','gaji');
        $data['gaji'] = $this->gaji->GetEditDataTransaksiGaji($id_transaksiGaji);
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_topbar',$data);
		$this->load->view('templates/admin_sidebar',$data);
		$this->load->view('admin/pengaturanGaji/pengaturanGaji_view',$data);
		$this->load->view('templates/admin_footer',$data);
    }
    
    public function doEditDataPerkiraan() {
        $id_perkiraan = $_POST['id_perkiraan'];
        $kode_perkiraan = $_POST['kode_perkiraan'];
        $nama_perkiraan = $_POST['nama_perkiraan'];
        $aktif = $_POST['aktif'];
        $status_perkiraan = $_POST['status_perkiraan'];
        $data = [
			'id_perkiraan' => $id_perkiraan,
            'kode_perkiraan' => $kode_perkiraan,
            'nama_perkiraan' => $nama_perkiraan,
            'aktif' => $aktif,
            'status_perkiraan' => $status_perkiraan
        ];
        $where = ['id_perkiraan' => $id_perkiraan];
        $this->load->model('perkiraan_model','perkiraan');
        $result = $this->perkiraan->UpdateDataPerkiraan('perkiraan',$data,$where);
        if($result >= 1) {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-dismissible alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Data Perkiraan Telah Diupdate!
            </div>');
            redirect('perkiraan');
        } else {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-dismissible alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Data Perkiraan Gagal Diupdate
            </div>');
            redirect('perkiraan/editDataPerkiraan/'.$id_perkiraan);
        }
    }
}