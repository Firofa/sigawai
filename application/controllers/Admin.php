<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	public function index()
	{
		$data['title'] = "Admin Page | Sigawai";
		//Ambil data user
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		
			$this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_topbar',$data);
			$this->load->view('templates/admin_sidebar',$data);
			$this->load->view('admin/dashboard_view',$data);
			$this->load->view('templates/admin_footer',$data);
	}

	public function pengaturanPegawai() {
		$this->form_validation->set_rules("name","Name","required|trim");
		$this->form_validation->set_rules("jabatan","Jabatan","required|trim");
		$this->form_validation->set_rules("pangkat","Pangkat","required|trim");
		$this->form_validation->set_rules("golongan","Golongan","required|trim");
		$this->form_validation->set_rules("tahun","Tahun","required|trim|numeric");
		$this->form_validation->set_rules("nip","nip","required|trim|is_unique[users.nip]");
		$this->form_validation->set_message('is_unique','NIP sudah terdaftar.');
		$this->form_validation->set_rules("password","Password","required|trim|min_length[8]|matches[password_confirmation]");
		$this->form_validation->set_message('matches','Password not match');
		$this->form_validation->set_message('min_length','Password too short');
		$this->form_validation->set_rules("password_confirmation","Password Confirmaation","required|trim|matches[password]");
		$this->form_validation->set_rules("level_access_id","Level Akses","required|trim");
		$this->form_validation->set_rules("work_unit_id","Unit Kerja","required|trim");
		$this->form_validation->set_rules("ruangan_id","Ruangan","required|trim");
		$this->form_validation->set_rules("tanggal_lahir","Tanggal Lahir","required|trim");
		$this->form_validation->set_rules("tempat_lahir","Tempat Lahir","required|trim");
		$this->form_validation->set_rules("no_rek","Nomor Rekening","required|trim");
		$this->form_validation->set_rules("npwp","NPWP","required|trim");

		if($this->form_validation->run() == false) {
		$data['title'] = "Admin Page | Sigawai";
		//Ambil data user
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		//Ambil Seluruh data pengguna
		if($this->session->userdata('level_access_id') == "1") 
		{ 
			//Mengambil data user termasuk super admin (khusus super admin)
			$data['pengguna'] = $this->user->getDetailDataUsers();
		} else {
			//Mengambil data user hanya Admin Barang dan Pegawai
			$data['pengguna'] = $this->user->getDetailDataUsersTwo();
		}
		//Mengambil data level akses
		$this->load->model('Level_access_model','level_akses');
		if($this->session->userdata('level_access_id') == "1") 
		{
			//Mengambil level akses termasuk super admin
			$data['level_akses'] = $this->level_akses->GetDataLevel();
		} else {
			//Mengambil level akses tidak termasuk super admin
			$data['level_akses'] = $this->level_akses->GetDataLevelTwo();
		}
		//Mengambil data ruangan
		$this->load->model('ruangan_model','ruangan');
		$data['ruangan'] = $this->ruangan->GetDataRuangan();
		//Mengambil data work unit
		$this->load->model('work_unit_model','work_unit');
		$data['work_unit'] = $this->work_unit->GetDataWorkUnit();
		
			$this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_topbar',$data);
			$this->load->view('templates/admin_sidebar',$data);
			$this->load->view('admin/pengaturanPegawai/pegawai_view',$data);
			$this->load->view('templates/admin_footer',$data);
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name'),true),
				'nip' => htmlspecialchars($this->input->post('nip'),true),
				'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir'),true),
				'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir'),true),
				'no_rek' => htmlspecialchars($this->input->post('no_rek'),true),
				'npwp' => htmlspecialchars($this->input->post('npwp'),true),
				'jabatan' => htmlspecialchars($this->input->post('jabatan'),true),
				'pangkat' => htmlspecialchars($this->input->post('pangkat'),true),
				'golongan' => htmlspecialchars($this->input->post('golongan'),true),
				'tahun' => htmlspecialchars($this->input->post('tahun'),true),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'level_access_id' => htmlspecialchars($this->input->post('level_access_id'),true),
				'work_unit_id' => htmlspecialchars($this->input->post('work_unit_id'),true),
				'ruangan_id' => htmlspecialchars($this->input->post('ruangan_id'),true),
				'is_active' => 1,
				'created_at' => time()
			];
			$this->db->insert('users',$data);
			$this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Akun berhasil terdaftar.</div>");
			redirect('admin/pengaturanPegawai');
		}
	}

	public function editDataUser($id_user) {
		$data['title'] = "Admin Page | Sigawai";
		//Ambil data user login
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		//Mengambil data level akses
		$this->load->model('Level_access_model','level_akses');
		$data['level_akses'] = $this->level_akses->GetDataLevel();
		//Mengambil data ruangan
		$this->load->model('ruangan_model','ruangan');
		$data['ruangan'] = $this->ruangan->GetDataRuangan();
		//Mengambil data work unit
		$this->load->model('work_unit_model','work_unit');
		$data['work_unit'] = $this->work_unit->GetDataWorkUnit();
		// Ambil data user yang akan di edit
		$data['edit_user'] = $this->user->GetDetailUser($id_user);
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_topbar',$data);
		$this->load->view('templates/admin_sidebar',$data);
		$this->load->view('admin/pengaturanPegawai/editPegawai_view',$data);
		$this->load->view('templates/admin_footer',$data);
	}

	public function doEditDataUser() {
		$id_user = $_POST['id_user'];
		$name = $_POST['name'];
		$jabatan = $_POST['jabatan'];
		$pangkat = $_POST['pangkat'];
		$golongan = $_POST['golongan'];
		$tahun = $_POST['tahun'];
		$work_unit_id = $_POST['work_unit_id'];
		$ruangan_id = $_POST['ruangan_id'];
		$is_active = $_POST['is_active'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$no_rek = $_POST['no_rek'];
		$npwp = $_POST['npwp'];

		$data = [
			'name' => $name,
			'golongan' => $golongan,
			'jabatan' => $jabatan,
			'pangkat' => $pangkat,
			'tahun' => $tahun,
			'work_unit_id' => $work_unit_id,
			'ruangan_id' => $ruangan_id,
			'is_active' => $is_active,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'no_rek' => $no_rek,
			'npwp' => $npwp,
 			'updated_at' => time()
		];
		$where = ['id_user' => $id_user];
		$this->load->model('user_model','user');
		$result = $this->user->UpdateDataUser('users',$data,$where);
		if($result >= 1) {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-success">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Data User Telah Diupdate!
				</div>');
				redirect('admin/pengaturanPegawai');
			} else {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-danger">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Data User Gagal Diupdate
				</div>');
				redirect('admin/editDataUser/'.$id_user);
			}
	}

	public function pengaturanHakAkses() {
		//Cek jika bukan super admin
		$role = $this->session->userdata('level_access_id');
		if($role !== "1") {
			redirect();
		} 
		
		$this->load->library('form_validation');

		$data['title'] = "Admin Page | Sigawai";
		//Ambil data user
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		//Ambil Seluruh data pengguna
		$data['pengguna'] = $this->user->getDetailDataUsers();
		
			$this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_topbar',$data);
			$this->load->view('templates/admin_sidebar',$data);
			$this->load->view('admin/pengaturanHakAkses/hakAkses_view',$data);
			$this->load->view('templates/admin_footer',$data);				
	}

	public function editHakAkses($id_user) {
		$role = $this->session->userdata('level_access_id');
		if($role !== "1") {
			redirect();
		} 
		$data['title'] = "Admin Page | Sigawai";
		//Ambil data user login
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		//Mengambil data level akses
		$this->load->model('Level_access_model','level_akses');
		$data['level_akses'] = $this->level_akses->GetDataLevel();
		// Ambil data user yang akan di edit
		$data['edit_user'] = $this->user->GetDetailUser($id_user);
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_topbar',$data);
		$this->load->view('templates/admin_sidebar',$data);
		$this->load->view('admin/pengaturanHakAkses/editHakAkses_view',$data);
		$this->load->view('templates/admin_footer',$data);
	}

	public function doEditHakAkses() {
		$role = $this->session->userdata('level_access_id');
		if($role !== "1") {
			redirect();
		} 
		$id_user = $_POST['id_user'];
		$level_access_id = $_POST['level_access_id'];
		$is_active = $_POST['is_active'];

		$data = [
			'level_access_id' => $level_access_id,
			'is_active' => $is_active,
			'updated_at' => time()
		];
		$where = ['id_user' => $id_user];
		$this->load->model('user_model','user');
		$result = $this->user->UpdateDataUser('users',$data,$where);
		if($result >= 1) {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-success">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Data User Telah Diupdate!
				</div>');
				redirect('admin/pengaturanHakAkses');
			} else {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-danger">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Data User Gagal Diupdate
				</div>');
				redirect('admin/editHakAkses/'.$id_user);
			}
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
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_topbar',$data);
		$this->load->view('templates/admin_sidebar',$data);
		$this->load->view('admin/ubahpassword',$data);
		$this->load->view('templates/admin_footer');
		
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


}