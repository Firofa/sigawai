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
    


}