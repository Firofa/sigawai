<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		//Cek jika bukan pengguna
		if($this->session->userdata('level_access_id') !== '3') {
			redirect();
		}
		$this->load->library('form_validation');		
    }
    
    public function index()
	{
		$data['title'] = "Admin Page | Sigawai";
		//Ambil data user
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		$data['user']['menu'] = "Home";
		$this->load->view('templates/user_header',$data);
        $this->load->view('templates/user_topbar',$data);
        $this->load->view('templates/user_sidebar',$data);
        $this->load->view('user/home_view',$data);
        $this->load->view('templates/user_footer',$data);
    }
    
    public function changepassword() {
		$data['title'] = "Change Password";
		$data['user'] = $this->db->get_where('users', [
			'nip' => $this->session->userdata('nip')])->row_array();
		$this->form_validation->set_rules('currentPassword','Current password','required|trim');
		$this->form_validation->set_rules('new_password1', 'New password', 'required|trim|min_length[8]|matches[new_password2]' , [
					'matches' => 'Password dont match!',
					'min_length' => 'Password too short!',
			]);
		$this->form_validation->set_rules('new_password2', 'Confirm new password', 'required|trim|matches[new_password1]');
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/user_header',$data);
		$this->load->view('templates/user_topbar',$data);
		$this->load->view('templates/user_sidebar',$data);
		$this->load->view('user/ubahpassword',$data);
		$this->load->view('templates/user_footer');
		} else {
		$currentPassword = $this->input->post('currentPassword');
		$newPassword = $this->input->post('new_password1');
		if(!password_verify($currentPassword, $data['user']['password'])) {
			$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-danger">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						<strong>Oops!</strong> Password Lama Salah!
				</div>');
			redirect('admin/changepassword');
		} else {
			if($currentPassword	== $newPassword) {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-warning">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						<strong>Oops!</strong> Password Lama Dan Baru Tidak Boleh Sama!
				</div>');
				redirect('admin/changepassword');
			} else {
				$password_hash = password_hash($newPassword,PASSWORD_DEFAULT);
				$this->db->set('password',$password_hash);
				$this->db->where('nip',$this->session->userdata('nip'));
				$this->db->update('users');

				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-success">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						<strong>Well Done!</strong> Password Berhasil Diubah!
				</div>');
			redirect('admin/changepassword');
			}
		}
		}
	}
	
	public function slipGaji(){
		$data['title'] = "Admin Page | Sigawai";
		//Ambil data user
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		$id_user = $data['user']['id_user'];
		$this->load->model('Gaji_model','gaji');
		$data['bulan'] = [
            ['nama_bulan' => 'Januari', 'nomor_bulan' => 1],
            ['nama_bulan' => 'Februari', 'nomor_bulan' => 2],
            ['nama_bulan' => 'Maret', 'nomor_bulan' => 3],
            ['nama_bulan' => 'April', 'nomor_bulan' => 4],
            ['nama_bulan' => 'Mei', 'nomor_bulan' => 5],
            ['nama_bulan' => 'Juni', 'nomor_bulan' => 6],
            ['nama_bulan' => 'Juli', 'nomor_bulan' => 7],
            ['nama_bulan' => 'Agustus', 'nomor_bulan' => 8],
            ['nama_bulan' => 'September', 'nomor_bulan' => 9],
            ['nama_bulan' => 'Oktober', 'nomor_bulan' => 10],
            ['nama_bulan' => 'November', 'nomor_bulan' => 11],
            ['nama_bulan' => 'Desember', 'nomor_bulan' => 12]
        ];
		$data['tgl_transaksi'] = $this->gaji->getAllTransaksiGajiByUser($id_user);
		$this->load->view('templates/user_header',$data);
        $this->load->view('templates/user_topbar',$data);
        $this->load->view('templates/user_sidebar',$data);
        $this->load->view('user/slip_gaji_view',$data);
	}

	public function rincianGaji(){
		$data['title'] = "Admin Page | Sigawai";
		//Ambil data user
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		$id_user = $data['user']['id_user'];
		$this->load->model('Gaji_model','gaji');
		$data['bulan'] = [
            ['nama_bulan' => 'Januari', 'nomor_bulan' => 1],
            ['nama_bulan' => 'Februari', 'nomor_bulan' => 2],
            ['nama_bulan' => 'Maret', 'nomor_bulan' => 3],
            ['nama_bulan' => 'April', 'nomor_bulan' => 4],
            ['nama_bulan' => 'Mei', 'nomor_bulan' => 5],
            ['nama_bulan' => 'Juni', 'nomor_bulan' => 6],
            ['nama_bulan' => 'Juli', 'nomor_bulan' => 7],
            ['nama_bulan' => 'Agustus', 'nomor_bulan' => 8],
            ['nama_bulan' => 'September', 'nomor_bulan' => 9],
            ['nama_bulan' => 'Oktober', 'nomor_bulan' => 10],
            ['nama_bulan' => 'November', 'nomor_bulan' => 11],
            ['nama_bulan' => 'Desember', 'nomor_bulan' => 12]
        ];
		$data['tgl_transaksi'] = $this->gaji->getAllTransaksiGajiByUser($id_user);
		$this->load->view('templates/user_header',$data);
        $this->load->view('templates/user_topbar',$data);
        $this->load->view('templates/user_sidebar',$data);
        $this->load->view('user/rincian_gaji_view',$data);
	}

	public function slipGajiDetail() {
		$this->load->model('User_model','user');
		$data['user'] = $this->user->getDataUsersNameNipById($this->session->userdata('nip'));
		$id_user = $data['user']['id_user'];
		//POST DATA
		$bulan_gaji = $this->input->post('bulan_gaji');
		$tahun_gaji = $this->input->post('tahun_gaji');
		
		//GET DATA
		$this->load->model('Gaji_model','gaji');
		$data['dataPenghasilan'] = $this->gaji->GetDetailTransaksiByBulanAndTahun($id_user,$bulan_gaji,$tahun_gaji,0);
        $data['dataPotonganKppn'] = $this->gaji->GetDetailTransaksiByBulanAndTahun($id_user,$bulan_gaji,$tahun_gaji,1);
        $data['dataPotonganInternal'] = $this->gaji->GetDetailTransaksiByBulanAndTahun($id_user,$bulan_gaji,$tahun_gaji,2);
		$data['transaksi_gaji_id'] = $this->gaji->getIdTransaksiGaji($id_user,$bulan_gaji,$tahun_gaji);
		echo json_encode($data);
	}

	public function rincianGajiDetail() {
		$this->load->model('User_model','user');
		$data['user'] = $this->user->getDataUsersNameNipById($this->session->userdata('nip'));
		$id_user = $data['user']['id_user'];
		//POST DATA
		$bulan_gaji = $this->input->post('bulan_gaji');
		$tahun_gaji = $this->input->post('tahun_gaji');
		
		//GET DATA
		$this->load->model('Gaji_model','gaji');
		$data['dataPenghasilan'] = $this->gaji->GetDetailTransaksiByBulanAndTahun($id_user,$bulan_gaji,$tahun_gaji,0);
        $data['dataUangMakan'] = $this->gaji->GetDetailTransaksiByBulanAndTahun($id_user,$bulan_gaji,$tahun_gaji,3);
        $data['dataRemunerasi'] = $this->gaji->GetDetailTransaksiByBulanAndTahun($id_user,$bulan_gaji,$tahun_gaji,4);
        $data['dataPotonganKppn'] = $this->gaji->GetDetailTransaksiByBulanAndTahun($id_user,$bulan_gaji,$tahun_gaji,1);
        $data['dataPotonganInternal'] = $this->gaji->GetDetailTransaksiByBulanAndTahun($id_user,$bulan_gaji,$tahun_gaji,2);
		$data['transaksi_gaji_id'] = $this->gaji->getIdTransaksiGaji($id_user,$bulan_gaji,$tahun_gaji);
		echo json_encode($data);
	}

	public function cetakSlipGajiPdf($id_transaksi_gaji) {
		//Ambil Informasi Pegawai
        $this->load->model('User_model','user');
        $data['pegawai'] = $this->user->getDataUserByIdTransaksi($id_transaksi_gaji);
        //Ambil Data Penghasilan
        $this->load->model('gaji_model','gaji');
        $data['title'] = "Slip Gaji";
        $date = $data['pegawai']['tgl_gajian'];
        $data['date'] = date_parse_from_format("Y-m-d", $date);
        $data['dataPenghasilan'] = $this->gaji->GetDetailTransaksiById($id_transaksi_gaji,0);
        $data['dataPotonganKppn'] = $this->gaji->GetDetailTransaksiById($id_transaksi_gaji,1);
        $data['dataPotonganInternal'] = $this->gaji->GetDetailTransaksiById($id_transaksi_gaji,2);
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "slip_gaji.pdf";
        $this->pdf->load_view('user/laporan_slipGaji_pdf', $data);
	}

	public function cetakRincianGajiPdf($id_transaksi_gaji) {
		//Ambil Informasi Pegawai
        $this->load->model('User_model','user');
        $data['pegawai'] = $this->user->getDataUserByIdTransaksi($id_transaksi_gaji);
        //Ambil Data Penghasilan
        $this->load->model('gaji_model','gaji');
        $data['title'] = "Rincian Gaji";
        $date = $data['pegawai']['tgl_gajian'];
        $data['date'] = date_parse_from_format("Y-m-d", $date);
        $data['dataPenghasilan'] = $this->gaji->GetDetailTransaksiById($id_transaksi_gaji,0);
        $data['dataUangMakan'] = $this->gaji->GetDetailTransaksiById($id_transaksi_gaji,3);
        $data['dataRemunerasi'] = $this->gaji->GetDetailTransaksiById($id_transaksi_gaji,4);
        $data['dataPotonganKppn'] = $this->gaji->GetDetailTransaksiById($id_transaksi_gaji,1);
        $data['dataPotonganInternal'] = $this->gaji->GetDetailTransaksiById($id_transaksi_gaji,2);
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "rincian_gaji.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
	}

	public function rekapitulasiGaji() {
            $data['title'] = "Rekapitulasi Gaji Page | SIGAWAI";
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
			$id_user = $data['user']['id_user'];
            //Ambil Data Gaji Seluruh Pegawai
		    $this->load->model('gaji_model','gaji');
			$data['gaji'] = $this->gaji->GetDataTransaksiGajiByUser($id_user);
            $this->load->view('templates/user_header',$data);
			$this->load->view('templates/user_topbar',$data);
			$this->load->view('templates/user_sidebar',$data);
			$this->load->view('user/rekapitulasiGaji_view',$data);
	}
}