<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends CI_Model {
    
    public function GetDataTransaksiGaji() {
        $data = $this->db->query("SELECT `transaksi_gaji`.*, `users`.`name`, `users`.`nip` FROM `transaksi_gaji` JOIN `users` ON `transaksi_gaji`.`user_id` = `users`.`id_user`");
        return $data->result_array();
    }

    public function GetEditDataTransaksiGaji($id_transaksi_gaji) {
        $data = $this->db->query("SELECT * FROM `transaksi_gaji` WHERE `transaksi_gaji`.`id_transaksi_gaji` = ".$id_transaksi_gaji);
        return $data->row_array();
    }

    public function UpdateDataTransaksiGaji($tableName,$data,$where){
        $res = $this->db->Update($tableName,$data,$where);
        return $res;
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
}