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
        $perkiraan_id = $this->input->post('hidden_perkiraan_id');
        $jumlah_penghasilan = $this->input->post('hidden_jumlah_penghasilan');
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
            $penghasilan_kotor = 0;
        } else {
            $penghasilan_kotor = $dataGajiUser['penghasilan_kotor'];
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
                        'jumlah' => str_replace(["Rp ",".",",00"],"",$jumlah_penghasilan[$count]),
                        'created_at' => time(),
                        'updated_at' => time()
                    );
                } else {
                    $data = array(
                        'transaksi_gaji_id' => $dataRincianTransaksiGajiBulanSama['transaksi_gaji_id'],
                        'user_id'   => $id_user,
                        'tgl_gaji'  => $tgl_gaji,
                        'perkiraan_id' => $perkiraan_id[$count],
                        'jumlah' => str_replace(["Rp ",".",",00"],"",$jumlah_penghasilan[$count]),
                        'created_at' => time(),
                        'updated_at' => time()
                    );
                }
                $penghasilan_kotor = $penghasilan_kotor + str_replace(["Rp ",".",",00"],"",$jumlah_penghasilan[$count]);
                $this->db->insert('rincian_transaksi_gaji',$data);
                $data = [];
            } else {
                $data = array(
                    'transaksi_gaji_id' => $dataRincianTransaksiGaji['transaksi_gaji_id'],
                    'user_id' => $id_user,
                    'tgl_gaji' => $tgl_gaji,
                    'perkiraan_id' => $perkiraan_id[$count],
                    'jumlah' =>  $dataRincianTransaksiGaji['jumlah'] + str_replace(["Rp ",".",",00"],"",$jumlah_penghasilan[$count]),
                    'updated_at' => time()
                );
                $where = [
                    'id_rtg' => $dataRincianTransaksiGaji['id_rtg']
                ];
                $penghasilan_kotor = $penghasilan_kotor + str_replace(["Rp ",".",",00"],"",$jumlah_penghasilan[$count]);
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
                'penghasilan_kotor' => $penghasilan_kotor,
                'penghasilan_bersih' => $penghasilan_kotor,
                'gaji_bersih' => $penghasilan_kotor,
                'created_at' => time(),
                'updated_at' => time()
            ];
            $this->db->insert('transaksi_gaji',$transaksi_gaji);
        } else {
            $transaksi_gaji = [
                'id_transaksi_gaji' => $dataGajiUser['id_transaksi_gaji'],
                'user_id' => $id_user,
                'tgl_gajian' => $tgl_gaji,
                'penghasilan_kotor' => $penghasilan_kotor,
                'penghasilan_bersih' => $penghasilan_kotor - $dataGajiUser['potongan_kppn'],
                'gaji_bersih' => $penghasilan_kotor - ($dataGajiUser['potongan_kppn'] + $dataGajiUser['potongan_internal']),
                'updated_at' => time()
            ];
            $where = [
                'id_transaksi_gaji' => $dataGajiUser['id_transaksi_gaji']
            ];
            $this->gaji->UpdateDataTransaksiGaji('transaksi_gaji',$transaksi_gaji,$where);
        }
        
    }

    public function referensi() {
        $data['title'] = "Admin Page | SIPERMA";
        //Ambil data user
        $this->load->model('User_model','user');
        $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
        //Mengambil data perkiraan
        $this->load->model('gaji_model','gaji');
        $data['dataGaji'] = $this->gaji->GetDataTransaksiByStatus(0);
        $this->load->view('templates/admin_header',$data);
        $this->load->view('templates/admin_topbar',$data);
        $this->load->view('templates/admin_sidebar',$data);
        $this->load->view('admin/pengaturanGaji/referensiGaji_view',$data);
        $this->load->view('templates/admin_footer',$data);
    }

    public function editPenghasilan($id_rtg){
            $data['title'] = "Admin Page | Sigawai";
            //Ambil data user login
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('nip'));
            // Ambil data penghasilan yang akan di edit
            $this->load->model('gaji_model','gaji');
            $data['editData'] = $this->gaji->GetDetailDataTransaksi($id_rtg);
            $this->load->view('templates/admin_header',$data);
            $this->load->view('templates/admin_topbar',$data);
            $this->load->view('templates/admin_sidebar',$data);
            $this->load->view('admin/pengaturanGaji/editGaji_view',$data);
    }

    public function doEditPenghasilan() {
        $id_rtg = $this->input->post('id_rtg');
        $jumlahBaru = $this->input->post('jumlah');
        $jumlahBaru = str_replace(["Rp ",".",",00"],"",$jumlahBaru);
        $this->load->model('gaji_model','gaji');
        $transaksiGaji = $this->gaji->GetDetailDataTransaksi($id_rtg);
        $jumlahLama = $transaksiGaji['jumlah'];
		$data = [
			'jumlah' => $jumlahBaru,
 			'updated_at' => time()
		];
		$where = ['id_rtg' => $id_rtg];
		$result = $this->gaji->UpdateDataTransaksi('rincian_transaksi_gaji',$data,$where);
		if($result >= 1) {
                $id_transaksi_gaji = $transaksiGaji['transaksi_gaji_id'];
                $dataLamaGaji = $this->gaji->getDataGajiLamaById($id_transaksi_gaji);
                //Hitung ulang gaji
                $penghasilanKotorBaru = ($dataLamaGaji['penghasilan_kotor'] - $jumlahLama) + $jumlahBaru;
                $updateGaji = [
                    'penghasilan_kotor' => $penghasilanKotorBaru,
                    'penghasilan_bersih' => $penghasilanKotorBaru - $dataLamaGaji['potongan_kppn'],
                    'gaji_bersih'       => $penghasilanKotorBaru - ($dataLamaGaji['potongan_kppn'] + $dataLamaGaji['potongan_internal']),
                    'updated_at'        => time()
                ];
                $whereIdGaji = ['id_transaksi_gaji' => $id_transaksi_gaji];
                $result = $this->gaji->UpdateDataTransaksi('transaksi_gaji',$updateGaji,$whereIdGaji);
                if($result >= 1) {
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-dismissible alert-success">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              Data Penghasilan Telah Diupdate!
                    </div>');
                    redirect('Gaji/referensi');
                } else {
                    $this->session->set_flashdata('message', 
				    '<div class="alert alert-dismissible alert-danger">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Data Penghasilan Gagal Diupdate
				    </div>');
				    redirect('Gaji/editPenghasilan/'.$id_rtg);
                }
                
			} else {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-danger">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Data Penghasilan Gagal Diupdate
				</div>');
				redirect('Gaji/editPenghasilan/'.$id_rtg);
			}
    }
    
    public function hapusGaji() 
    {

    }

}