<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perkiraan extends CI_Controller {
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
        $this->form_validation->set_rules("kode_perkiraan","Kode Perkiraan","required|trim");
        $this->form_validation->set_rules("nama_perkiraan","Nama Perkiraan","required|trim");
        $this->form_validation->set_rules("status_perkiraan","Status Perkiraan","required|trim");
        if($this->form_validation->run() == false) {
            $data['title'] = "Admin Page | SIGAWAI";
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
            //Mengambil data perkiraan
		    $this->load->model('perkiraan_model','perkiraan');
            $data['perkiraan'] = $this->perkiraan->GetDataPerkiraan();
            $this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_topbar',$data);
			$this->load->view('templates/admin_sidebar',$data);
			$this->load->view('admin/pengaturanPerkiraan/perkiraan_view',$data);
			$this->load->view('templates/admin_footer',$data);
        } else {
            $data = [
                'kode_perkiraan' => htmlspecialchars($this->input->post('kode_perkiraan'),true),
                'nama_perkiraan' => htmlspecialchars($this->input->post('nama_perkiraan'),true),
                'status_perkiraan' => htmlspecialchars($this->input->post('status_perkiraan'),true),
                'aktif' => "Y"
            ];
            $this->db->insert('perkiraan',$data);
			$this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Perkiraan berhasil terdaftar.</div>");
			redirect('perkiraan');
        }
    }

    public function editDataPerkiraan($id_perkiraan) {
		$data['title'] = "Admin Page | SIGAWAI";
		//Ambil data user login
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('nip'));
		//Mengambil data perkiraan yang di edit
		$this->load->model('perkiraan_model','perkiraan');
        $data['perkiraan'] = $this->perkiraan->GetEditDataPerkiraan($id_perkiraan);
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_topbar',$data);
		$this->load->view('templates/admin_sidebar',$data);
		$this->load->view('admin/pengaturanPerkiraan/editPerkiraan_view',$data);
		$this->load->view('templates/admin_footer',$data);
    }
    
    public function doEditDataPerkiraan() {
        $id_perkiraan = $_POST['id_perkiraan'];
        $kode_perkiraan = $_POST['kode_perkiraan'];
        $nama_perkiraan = $_POST['nama_perkiraan'];
        $aktif = $_POST['aktif'];
        $data = [
			'id_perkiraan' => $id_perkiraan,
            'kode_perkiraan' => $kode_perkiraan,
            'nama_perkiraan' => $nama_perkiraan,
            'aktif' => $aktif
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