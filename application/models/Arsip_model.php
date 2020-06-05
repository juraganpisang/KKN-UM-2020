<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip_model extends CI_Model
{
    public function getPeminjam()
    {
		$query = $this->db->query("SELECT * from tbl_peminjaman");
		return $query->result();
    }
    
    public function getArsip()
    {
		$query = $this->db->query("SELECT * from tbl_arsip");
		return $query->result();
    }

    public function tambahArsip($data){
			return $this->db->insert('tbl_arsip', $data);
    }

    public function jmlSuratMasuk(){
      $query = $this->db->query("SELECT COUNT(id) AS 'jml' FROM tbl_arsip WHERE status='0'");
      return $query->result();
    }

    public function jmlSuratKeluar(){
      $query = $this->db->query("SELECT COUNT(id) AS 'jml' FROM tbl_arsip WHERE status='1'");
      return $query->result();
    }
}
?>