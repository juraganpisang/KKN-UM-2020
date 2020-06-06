<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan_model extends CI_Model
{

    public function createKK($data)
    {
        return $this->db->insert('tbl_kartukeluarga', $data);
    }

    public function createAnggota($data){
        return $this->db->insert('tbl_anggotakeluarga', $data);
    }

    // public function getUserData($no_kk)
    // {
    //     $result = $this->db->get_where('tbl_kartukeluarga', ['no_kk' => $no_kk]);

    //     if ($result->num_rows() == 1) {
    //         return $result->row_array();
    //     } else {
    //         return false;
    //     }
    // }
}
