<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remunerasi extends CI_Controller {
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
            $data['jenis_penghasilan'] = $this->perkiraan->GetDataPerkiraanByStatus(3);
            //Ambil Data Gaji Seluruh Pegawai
            $this->load->model('gaji_model','gaji');
            $data['gaji'] = $this->gaji->GetDataTransaksiGaji();
            $this->load->view('templates/admin_header',$data);
            $this->load->view('templates/admin_topbar',$data);
            $this->load->view('templates/admin_sidebar',$data);
            $this->load->view('admin/pengaturanRemunerasi/pengaturanRemunerasi_view',$data);
    }
}