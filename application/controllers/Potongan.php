<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller {
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
            $data['title'] = "Admin Page | SIGAWAI";
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
            $data['users'] = $this->user->getDataUsersNameNip();
            //Mengambil data perkiraan potongan kppn
            $this->load->model('perkiraan_model','perkiraan');
            $data['jenis_potongan_kppn'] = $this->perkiraan->GetDataPerkiraanByStatus(1);
            //Ambil Data Gaji Seluruh Pegawai
            $this->load->model('gaji_model','gaji');
            $data['gaji'] = $this->gaji->GetDataTransaksiGaji();
            $this->load->view('templates/admin_header',$data);
            $this->load->view('templates/admin_topbar',$data);
            $this->load->view('templates/admin_sidebar',$data);
            $this->load->view('admin/pengaturanPotongan/pengaturanPotonganKppn_view',$data);
    }

    public function potInternal() {
            $data['title'] = "Admin Page | SIGAWAI";
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
            $data['users'] = $this->user->getDataUsersNameNip();
            //Mengambil data perkiraan
            $this->load->model('perkiraan_model','perkiraan');
            $data['jenis_potongan_internal'] = $this->perkiraan->GetDataPerkiraanByStatus(2);
            //Ambil Data Gaji Seluruh Pegawai
            $this->load->model('gaji_model','gaji');
            $data['gaji'] = $this->gaji->GetDataTransaksiGaji();
            $this->load->view('templates/admin_header',$data);
            $this->load->view('templates/admin_topbar',$data);
            $this->load->view('templates/admin_sidebar',$data);
            $this->load->view('admin/pengaturanPotongan/pengaturanPotonganInternal_view',$data);
    }

    public function tambahPotonganInternal(){
        $perkiraan_id = $this->input->post('hidden_perkiraan_id');
        $jumlah_potongan_internal = $this->input->post('hidden_jumlah_potongan_internal');
        $transaksi_gaji_id = uniqid('itg');
        $id_user = $this->input->post('id_user');
        $tgl_gaji = $this->input->post('tgl_gaji');
        $tanggal_gajian = strtotime($tgl_gaji);
        $bulan = date('m',$tanggal_gajian);
        $tahun = date('Y',$tanggal_gajian);
        //Panggil model
        $this->load->model('gaji_model','gaji');
        //Cek sudah ada data si user pada bulan ini atau belum di database
        $dataGajiUser = $this->gaji->cekDataGajiUserByBulan($id_user,$bulan,$tahun);
        // Cek Penghasilan Kotor
        if(empty($dataGajiUser)){
            $potongan_internal = 0;
        } else {
            $potongan_internal = $dataGajiUser['potongan_internal'];
        }
		for($count = 0; $count<count($perkiraan_id); $count++) {
            //Cek apakah perkiraan pernah dimasukan pada bulan dan tahun yang sama
            $dataRincianTransaksiGaji = $this->gaji->cekDataRincianGajiUserByBulan($id_user,$perkiraan_id[$count],$bulan,$tahun);
            if(empty($dataRincianTransaksiGaji)) {
                //Cek apakah data penghasilan untuk user dengan bulan dan tahun yang sama pernah dimasukan  
                $dataRincianTransaksiGajiBulanSama = $this->gaji->cekDataRincianGajiUserBulanIni($id_user,$bulan,$tahun);
                if(empty($dataRincianTransaksiGajiBulanSama)){
                    $data = array(
                        'transaksi_gaji_id' => $transaksi_gaji_id,
                        'user_id' => $id_user,
                        'tgl_gaji' => $tgl_gaji,
                        'perkiraan_id' => $perkiraan_id[$count],
                        'jumlah' => str_replace(["Rp ",".",",00"],"",$jumlah_potongan_internal[$count]),
                        'created_at' => time()
                    );
                } else {
                    $data = array(
                        'transaksi_gaji_id' => $dataRincianTransaksiGajiBulanSama['transaksi_gaji_id'],
                        'user_id'   => $id_user,
                        'tgl_gaji'  => $tgl_gaji,
                        'perkiraan_id' => $perkiraan_id[$count],
                        'jumlah' => str_replace(["Rp ",".",",00"],"",$jumlah_potongan_internal[$count]),
                        'created_at' => time()
                    );
                }
                $potongan_internal = $potongan_internal + str_replace(["Rp ",".",",00"],"",$jumlah_potongan_internal[$count]);
                $this->db->insert('rincian_transaksi_gaji',$data);
                $data = [];
            } else {
                $data = array(
                    'transaksi_gaji_id' => $dataRincianTransaksiGaji['transaksi_gaji_id'],
                    'user_id' => $id_user,
                    'tgl_gaji' => $tgl_gaji,
                    'perkiraan_id' => $perkiraan_id[$count],
                    'jumlah' =>  $dataRincianTransaksiGaji['jumlah'] + str_replace(["Rp ",".",",00"],"",$jumlah_potongan_internal[$count]),
                    'updated_at' => time()
                );
                $where = [
                    'id_rtg' => $dataRincianTransaksiGaji['id_rtg']
                ];
                $potongan_internal = $potongan_internal + str_replace(["Rp ",".",",00"],"",$jumlah_potongan_internal[$count]);
                $this->gaji->UpdateDataTransaksiGaji('rincian_transaksi_gaji',$data,$where);
                $data = [];
            }
        }
        //Cek Data Transaksi Gaji pada bulan dan tahun yang sama
        if(empty($dataGajiUser)){
            $transaksi_gaji = [
                'id_transaksi_gaji' => $transaksi_gaji_id,
                'user_id' => $id_user,
                'tgl_gajian' => $tgl_gaji,
                'potongan_internal' => $potongan_internal,
                'gaji_bersih' => 0 - $potongan_internal,
                'created_at' => time()
            ];
            $this->db->insert('transaksi_gaji',$transaksi_gaji);
        } else {
            $transaksi_gaji = [
                'id_transaksi_gaji' => $dataGajiUser['id_transaksi_gaji'],
                'user_id' => $id_user,
                'tgl_gajian' => $tgl_gaji,
                'potongan_internal' => $potongan_internal,
                'gaji_bersih' => $dataGajiUser['penghasilan_bersih'] - $potongan_internal,
                'updated_at' => time()
            ];
            $where = [
                'id_transaksi_gaji' => $dataGajiUser['id_transaksi_gaji']
            ];
            $this->gaji->UpdateDataTransaksiGaji('transaksi_gaji',$transaksi_gaji,$where);
        }
        
    }

    public function tambahPotonganKppn(){
        $perkiraan_id = $this->input->post('hidden_perkiraan_id');
        $jumlah_potongan_kppn = $this->input->post('hidden_jumlah_potongan_kppn');
        $transaksi_gaji_id = uniqid('itg');
        $id_user = $this->input->post('id_user');
        $tgl_gaji = $this->input->post('tgl_gaji');
        $tanggal_gajian = strtotime($tgl_gaji);
        $bulan = date('m',$tanggal_gajian);
        $tahun = date('Y',$tanggal_gajian);
        //Panggil model
        $this->load->model('gaji_model','gaji');
        //Cek sudah ada data si user pada bulan ini atau belum di database
        $dataGajiUser = $this->gaji->cekDataGajiUserByBulan($id_user,$bulan,$tahun);
        // Cek Penghasilan Kotor
        if(empty($dataGajiUser)){
            $potongan_kppn = 0;
        } else {
            $potongan_kppn = $dataGajiUser['potongan_kppn'];
        }
		for($count = 0; $count<count($perkiraan_id); $count++) {
            //Cek apakah perkiraan pernah dimasukan pada bulan dan tahun yang sama
            $dataRincianTransaksiGaji = $this->gaji->cekDataRincianGajiUserByBulan($id_user,$perkiraan_id[$count],$bulan,$tahun);
            if(empty($dataRincianTransaksiGaji)) {
                //Cek apakah data penghasilan untuk user dengan bulan dan tahun yang sama pernah dimasukan  
                $dataRincianTransaksiGajiBulanSama = $this->gaji->cekDataRincianGajiUserBulanIni($id_user,$bulan,$tahun);
                if(empty($dataRincianTransaksiGajiBulanSama)){
                    $data = array(
                        'transaksi_gaji_id' => $transaksi_gaji_id,
                        'user_id' => $id_user,
                        'tgl_gaji' => $tgl_gaji,
                        'perkiraan_id' => $perkiraan_id[$count],
                        'jumlah' => str_replace(["Rp ",".",",00"],"",$jumlah_potongan_kppn[$count]),
                        'created_at' => time()
                    );
                } else {
                    $data = array(
                        'transaksi_gaji_id' => $dataRincianTransaksiGajiBulanSama['transaksi_gaji_id'],
                        'user_id'   => $id_user,
                        'tgl_gaji'  => $tgl_gaji,
                        'perkiraan_id' => $perkiraan_id[$count],
                        'jumlah' => str_replace(["Rp ",".",",00"],"",$jumlah_potongan_kppn[$count]),
                        'created_at' => time()
                    );
                }
                $potongan_kppn = $potongan_kppn + str_replace(["Rp ",".",",00"],"",$jumlah_potongan_kppn[$count]);
                $this->db->insert('rincian_transaksi_gaji',$data);
                $data = [];
            } else {
                $data = array(
                    'transaksi_gaji_id' => $dataRincianTransaksiGaji['transaksi_gaji_id'],
                    'user_id' => $id_user,
                    'tgl_gaji' => $tgl_gaji,
                    'perkiraan_id' => $perkiraan_id[$count],
                    'jumlah' =>  $dataRincianTransaksiGaji['jumlah'] + str_replace(["Rp ",".",",00"],"",$jumlah_potongan_kppn[$count]),
                    'updated_at' => time()
                );
                $where = [
                    'id_rtg' => $dataRincianTransaksiGaji['id_rtg']
                ];
                $potongan_kppn = $potongan_kppn + str_replace(["Rp ",".",",00"],"",$jumlah_potongan_kppn[$count]);
                $this->gaji->UpdateDataTransaksiGaji('rincian_transaksi_gaji',$data,$where);
                $data = [];
            }
        }
        //Cek Data Transaksi Gaji pada bulan dan tahun yang sama
        if(empty($dataGajiUser)){
            $transaksi_gaji = [
                'id_transaksi_gaji' => $transaksi_gaji_id,
                'user_id' => $id_user,
                'tgl_gajian' => $tgl_gaji,
                'potongan_kppn' => $potongan_kppn,
                'penghasilan_bersih' => 0 - $potongan_kppn,
                'gaji_bersih' => 0 - $potongan_kppn,
                'created_at' => time()
            ];
            $this->db->insert('transaksi_gaji',$transaksi_gaji);
        } else {
            $transaksi_gaji = [
                'id_transaksi_gaji' => $dataGajiUser['id_transaksi_gaji'],
                'user_id' => $id_user,
                'tgl_gajian' => $tgl_gaji,
                'potongan_kppn' => $potongan_kppn,
                'penghasilan_bersih' => $dataGajiUser['penghasilan_kotor'] - $potongan_kppn,
                'gaji_bersih' => $dataGajiUser['penghasilan_kotor'] - ($potongan_kppn + $dataGajiUser['potongan_internal']),
                'updated_at' => time()
            ];
            $where = [
                'id_transaksi_gaji' => $dataGajiUser['id_transaksi_gaji']
            ];
            $this->gaji->UpdateDataTransaksiGaji('transaksi_gaji',$transaksi_gaji,$where);
        }
        
    }

    public function referensiPotonganInternal() {
        $data['title'] = "Admin Page | SIPERMA";
        //Ambil data user
        $this->load->model('User_model','user');
        $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
        //Mengambil data perkiraan
        $this->load->model('gaji_model','gaji');
        $data['dataPotonganInternal'] = $this->gaji->GetDataTransaksiByStatus(2);
        $this->load->view('templates/admin_header',$data);
        $this->load->view('templates/admin_topbar',$data);
        $this->load->view('templates/admin_sidebar',$data);
        $this->load->view('admin/pengaturanPotongan/referensiPotonganInternal_view',$data);
        $this->load->view('templates/admin_footer',$data);
    }

    public function referensiPotonganKppn() {
        $data['title'] = "Admin Page | SIPERMA";
        //Ambil data user
        $this->load->model('User_model','user');
        $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
        //Mengambil data perkiraan
        $this->load->model('gaji_model','gaji');
        $data['dataPotonganKppn'] = $this->gaji->GetDataTransaksiByStatus(1);
        $this->load->view('templates/admin_header',$data);
        $this->load->view('templates/admin_topbar',$data);
        $this->load->view('templates/admin_sidebar',$data);
        $this->load->view('admin/pengaturanPotongan/referensiPotonganKppn_view',$data);
        $this->load->view('templates/admin_footer',$data);
    }
}