<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan_model extends CI_Model
{

    public function createKK($data)
    {
        return $this->db->insert('tbl_kartukeluarga', $data);
    }

    public function createAnggota($data)
    {
        return $this->db->insert('tbl_anggotakeluarga', $data);
    }

    //edit tapi dihapus
    public function deleteKK($kk)
    {
        $this->db->where('no_kk', $kk);
        return $this->db->delete('tbl_kartukeluarga');
    }

    public function deleteAnggota($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->delete('tbl_anggotakeluarga');
    }

    public function deleteAnggotaKK($kk)
    {
        $this->db->where('noKK', $kk);
        return $this->db->delete('tbl_anggotakeluarga');
    }
    public function getUserKK($no_kk)
    {
        $result = $this->db->get_where('tbl_kartukeluarga', ['no_kk' => $no_kk]);

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    //single
    public function getUserAnggota($nik)
    {
        $result = $this->db->get_where('tbl_anggotakeluarga', ['nik' => $nik]);

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    public function getAllKK()
    {
        $query = $this->db->query("SELECT * from tbl_kartukeluarga");
        return $query->result();
    }

    public function getAllData()
    {
        $query = $this->db->query("SELECT * FROM `tbl_kartukeluarga` kk, tbl_anggotakeluarga ak where kk.no_kk = ak.noKK");
        return $query->result();
    }

    public function getAnggotaKK($no_kk)
    {
        $query = $this->db->query("SELECT * from tbl_anggotakeluarga WHERE noKK = '" . $no_kk . "'");
        return $query->result();
    }
}
