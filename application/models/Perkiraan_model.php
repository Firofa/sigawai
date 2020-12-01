<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perkiraan_model extends CI_Model {
    
    public function GetDataPerkiraan() {
        $data = $this->db->get('perkiraan');
        return $data->result_array();
    }

    public function GetEditDataPerkiraan($id_perkiraan) {
        $data = $this->db->query("SELECT * FROM `perkiraan` WHERE `perkiraan`.`id_perkiraan` = ".$id_perkiraan);
        return $data->row_array();
    }

    public function UpdateDataPerkiraan($tableName,$data,$where){
        $res = $this->db->Update($tableName,$data,$where);
        return $res;
    }

    public function DeleteData($tableName, $where) {
		$res = $this->db->Delete($tableName,$where);
		return $res;
	}
}