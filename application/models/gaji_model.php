<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends CI_Model {
    
    public function GetDataTransaksiGaji() {
        $data = $this->db->query("SELECT `transaksi_gaji`.*, `users`.`name`, `users`.`nip` 
                                FROM `transaksi_gaji` 
                                JOIN `users` ON `transaksi_gaji`.`user_id` = `users`.`id_user`
                                ORDER BY `transaksi_gaji`.`updated_at` DESC");
        return $data->result_array();
    }

    public function GetDataTransaksiGajiByUser($id_user) {
        $data = $this->db->query("SELECT `transaksi_gaji`.*, `users`.`name`, `users`.`nip` 
                                FROM `transaksi_gaji` 
                                JOIN `users` ON `transaksi_gaji`.`user_id` = `users`.`id_user`
                                WHERE `transaksi_gaji`.`user_id` = '".$id_user."'
                                ORDER BY `transaksi_gaji`.`updated_at` DESC");
        return $data->result_array();
    }

    public function GetEditDataTransaksiGaji($id_transaksi_gaji) {
        $data = $this->db->query("SELECT * FROM `transaksi_gaji` WHERE `transaksi_gaji`.`id_transaksi_gaji` = ".$id_transaksi_gaji);
        return $data->row_array();
    }

    public function UpdateDataTransaksiGaji($tableName,$data,$where){
        return $this->db->Update($tableName,$data,$where);
        
    }

    public function DeleteDataTransaksiGaji($tableName, $where) {
		$res = $this->db->Delete($tableName,$where);
		return $res;
    }
    
    public function getDataGajiById($id_transaksi_gaji){
        $data = $this->db->query("SELECT * 
                                FROM `transaksi_gaji`
                                WHERE `id_transaksi_gaji` = '".$id_transaksi_gaji."'");
        return $data->row_array();
    }

    public function GetRincianGaji($id_transaksiGaji){
        $data = $this->db->query('SELECT `rincian_transaksi_gaji`.*, `perkiraan`.`nama_perkiraan`, `transaksi_gaji`.`user_id`, `transaksi_gaji`.`tgl_gaji`, `users`.`name`, `users`.`nip`
                                FROM `rincian_transaksi_gaji`
                                JOIN `perkiraan`
                                ON `rincian_transaksi_gaji`.`perkiraan_id` = `perkiraan`.`id_perkiraan`
                                JOIN `transaksi_gaji`
                                ON `rincian_transaksi_gaji`.`transaksi_gaji_id` = `transaksi_gaji`.`id_transaksi_gaji`
                                JOIN `users`
                                ON `transaksi_gaji`.`user_id` = `users`.`id_user`
                                WHERE `rincian_transaksi_gaji`.`transaksi_gaji_id` = '.'"'.$id_transaksiGaji.'"'
                                );
        return $data->result_array();
    }

    public function cekDataGajiUserByBulan($id_user,$bulan,$tahun){
        $data = $this->db->query("SELECT *
                                FROM `transaksi_gaji`
                                WHERE `transaksi_gaji`.`user_id` = '".$id_user."'
                                AND MONTH(`transaksi_gaji`.`tgl_gajian`) = '".$bulan."'
                                AND YEAR(`transaksi_gaji`.`tgl_gajian`) = '".$tahun."'"
                                );
        return $data->row_array();
    }

    public function cekDataRincianGajiUserByBulan($id_user,$perkiraan_id,$bulan,$tahun){
        $data = $this->db->query('SELECT *
                                FROM `rincian_transaksi_gaji`
                                WHERE `rincian_transaksi_gaji`.`user_id` = "'.$id_user.'"
                                AND MONTH(`rincian_transaksi_gaji`.`tgl_gaji`) = "'.$bulan.'"
                                AND YEAR(`rincian_transaksi_gaji`.`tgl_gaji`) = "'.$tahun.'"
                                AND `rincian_transaksi_gaji`.`perkiraan_id` = "'.$perkiraan_id.'"'
                                );
        return $data->row_array();
    }

    public function cekDataRincianGajiUserBulanIni($id_user,$bulan,$tahun){
        $data = $this->db->query('SELECT *
                                FROM `rincian_transaksi_gaji`
                                WHERE `rincian_transaksi_gaji`.`user_id` = "'.$id_user.'"
                                AND MONTH(`rincian_transaksi_gaji`.`tgl_gaji`) = "'.$bulan.'"
                                AND YEAR(`rincian_transaksi_gaji`.`tgl_gaji`) = "'.$tahun.'"'
                                );
        return $data->row_array();
    }

    public function updateDataRincianGajiByBulan($id_user,$perkiraan_id,$bulan,$tahun,$jumlah,$created_at){
        $data = $this->db->query('UPDATE `rincian_transaksi_gaji`
                                SET `rincian_transaksi_gaji`.`jumlah` = "'.$jumlah.'",
                                `rincian_transaksi_gaji`.`created_at` = "'.$created_at.'"
                                WHERE `rincian_transaksi_gaji`.`user_id` = "'.$id_user.'"
                                AND `rincian_transaksi_gaji`.`perkiraan_id` = "'.$perkiraan_id.'"
                                AND MONTH(`rincian_transaksi_gaji`.`tgl_gaji`) = "'.$bulan.'"
                                AND YEAR(`rincian_transaksi_gaji`.`tgl_gaji`) = "'.$tahun.'"
                                ');
    }

    public function GetDataTransaksiByStatus($status_perkiraan) {
        $data = $this->db->query('SELECT `rincian_transaksi_gaji`.*, `perkiraan`.*, `users`.`name`, `users`.`nip` 
                                FROM `rincian_transaksi_gaji` 
                                JOIN `perkiraan` 
                                ON `rincian_transaksi_gaji`.`perkiraan_id` = `perkiraan`.`id_perkiraan`
                                JOIN `users`
                                ON `rincian_transaksi_gaji`.`user_id` = `users`.`id_user`
                                WHERE `perkiraan`.`status_perkiraan` = "'.$status_perkiraan.'"
                                ');
        return $data->result_array();
    }

    public function GetDetailDataTransaksi($id_rtg){
        $data = $this->db->query('SELECT `rincian_transaksi_gaji`.*,`perkiraan`.`nama_perkiraan`, `users`.`name`, `users`.`nip`
                                FROM `rincian_transaksi_gaji`
                                JOIN `perkiraan`
                                ON `rincian_transaksi_gaji`.`perkiraan_id` = `perkiraan`.`id_perkiraan`
                                JOIN `users`
                                ON `rincian_transaksi_gaji`.`user_id` = `users`.`id_user`
                                WHERE `rincian_transaksi_gaji`.`id_rtg` ='.$id_rtg);
        return $data->row_array();;
    }

    public function getDataGajiLamaById($id_transaksi_gaji){
        $data = $this->db->query('SELECT * FROM `transaksi_gaji` WHERE `transaksi_gaji`.`id_transaksi_gaji` = "'.$id_transaksi_gaji.'"');
        return $data->row_array();
    }

    public function UpdateDataTransaksi($tableName,$data,$where){
        $res = $this->db->Update($tableName,$data,$where);
        return $res;
    }

    public function GetDetailTransaksiById($id_transaksi_gaji,$status_perkiraan) {
        $data = $this->db->query("SELECT `rincian_transaksi_gaji`.*, `users`.`name`, `users`.`nip`, `users`.`no_rek`, `transaksi_gaji`.*, `perkiraan`.`nama_perkiraan` 
                                FROM `rincian_transaksi_gaji`
                                JOIN  `users`
                                ON `rincian_transaksi_gaji`.`user_id` = `users`.`id_user`
                                JOIN `transaksi_gaji`
                                ON `rincian_transaksi_gaji`.`transaksi_gaji_id` = `transaksi_gaji`.`id_transaksi_gaji`
                                JOIN `perkiraan`
                                ON `rincian_transaksi_gaji`.`perkiraan_id` = `perkiraan`.`id_perkiraan`
                                WHERE `rincian_transaksi_gaji`.`transaksi_gaji_id` = '".$id_transaksi_gaji."'
                                AND `perkiraan`.`status_perkiraan` = '".$status_perkiraan."'
                                ");
        return $data->result_array();
    }

    

    public function getAllTransaksiGajiByUser($id_user){
        $data = $this->db->query("SELECT `transaksi_gaji`.`id_transaksi_gaji`, MONTH(`transaksi_gaji`.`tgl_gajian`) as 'bulan_gajian', YEAR(`transaksi_gaji`.`tgl_gajian`) as tahun_gajian
                                FROM `transaksi_gaji` 
                                WHERE `transaksi_gaji`.`user_id` = '".$id_user."'"
                                );
        return $data->result_array();
    }

    public function GetDetailTransaksiByBulanAndTahun($id_user,$bulan_gaji,$tahun_gaji,$status_perkiraan){
        $data = $this->db->query("SELECT `perkiraan`.`nama_perkiraan`, `rincian_transaksi_gaji`.`jumlah`
                                FROM `rincian_transaksi_gaji`
                                JOIN `perkiraan`
                                ON `rincian_transaksi_gaji`.`perkiraan_id` = `perkiraan`.`id_perkiraan`
                                WHERE `rincian_transaksi_gaji`.`user_id` = '".$id_user."'
                                AND MONTH(`rincian_transaksi_gaji`.`tgl_gaji`) = '".$bulan_gaji."'
                                AND YEAR(`rincian_transaksi_gaji`.`tgl_gaji`) = '".$tahun_gaji."'
                                AND `perkiraan`.`status_perkiraan` = '".$status_perkiraan."'");
        return $data->result_array();

    }

    public function getIdTransaksiGaji($id_user,$bulan_gaji,$tahun_gaji){
        $data = $this->db->query("SELECT `transaksi_gaji`.`id_transaksi_gaji`
                                FROM `transaksi_gaji`
                                WHERE `transaksi_gaji`.`user_id` = '".$id_user."'
                                AND MONTH(`transaksi_gaji`.`tgl_gajian`) = '".$bulan_gaji."'
                                AND YEAR(`transaksi_gaji`.`tgl_gajian`) = '".$tahun_gaji."'"
                                );
        return $data->row_array();
    }

    
}