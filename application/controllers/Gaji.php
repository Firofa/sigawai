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
            $data['title'] = "Admin Page | SIGAWAI";
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
            $data['users'] = $this->user->getDataUsersNameNip();
            //Mengambil data perkiraan
            $this->load->model('perkiraan_model','perkiraan');
            $data['jenis_penghasilan'] = $this->perkiraan->GetDataPerkiraanByStatus(0);
            //Ambil Data Gaji Seluruh Pegawai
		    $this->load->model('gaji_model','gaji');
            $data['gaji'] = $this->gaji->GetDataTransaksiGaji();
            $this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_topbar',$data);
			$this->load->view('templates/admin_sidebar',$data);
			$this->load->view('admin/pengaturanGaji/pengaturanGaji_view',$data);
    }

   

    public function tambahGaji(){
        $a = $this->input->post();
        var_dump($a);die;
		for($count = 0; $count<count($a); $count++) {
			$data = array(
				'user_id' => $this->input->post('id_user'),
				'tgl_gaji' => $this->input->post('tgl_gaji'),
				'perkiraan_id' => $a[$count],
				'periode_permintaan' => $this->input->post('periode_permintaan'),
				'jumlah' => str_replace(["Rp ",".",",00"],"",$_POST['hidden_jumlah_penghasilan'][$count]),
				'created_at' => time()
            );
        }
		$this->db->insert('rincian_transaksi_gaji',$data);
    }

    public function editDataTransaksiGaji($id_transaksiGaji) {
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
        $this->form_validation->set_rules("uang_lp","Uang Lauk Pauk","required|trim");
        $this->form_validation->set_rules("tunjangan_kinerja","Tunjangan Kinerja","required|trim");
        $this->form_validation->set_rules("honor_lainnya","Honor Lainnya","required|trim");
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
		//Ambil data user login
		$this->load->model('User_model','user');
        $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		//Mengambil data perkiraan yang di edit
		$this->load->model('gaji_model','gaji');
        $dataDetailGaji = $this->gaji->GetRincianGaji($id_transaksiGaji);
        $data['detail_gaji'] = [];
        //Memasukkan Data inputan kedalam variabel sesuai nama perkiraan untuk di edit
        for($i = 0; $i <= count($dataDetailGaji); $i++) {
            $data['detail_gaji'][$dataDetailGaji[$i]['nama_perkiraan']]=$dataDetailGaji[$i]['jumlah'];
        }
        $data['detail_gaji']['nip'] = $dataDetailGaji[0]['nip'];
        $data['detail_gaji']['tgl_gaji'] = $dataDetailGaji[0]['tgl_gaji'];
        var_dump($data['detail_gaji']);die;
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_topbar',$data);
		$this->load->view('templates/admin_sidebar',$data);
		$this->load->view('admin/dashboard_view',$data);
        $this->load->view('templates/admin_footer',$data);
        } else {

        }
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