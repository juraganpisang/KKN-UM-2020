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

  public function tambahArsip($data)
  {
    return $this->db->insert('tbl_arsip', $data);
  }

  public function editArsip($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update('tbl_arsip', $data);
  }

  public function deleteArsip($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('tbl_arsip');
  }

  public function deleteScanArsip($scan)
  {

    $target = (FCPATH . '/assets/file/scanArsip/' . $scan);
    echo $target;
    if (delete_files($target)) {
      echo "BERHASIL";
    } else {
      echo "GAGAL;";
    }
  }

  public function jmlSuratMasuk()
  {
    $query = $this->db->query("SELECT COUNT(id) AS 'jml' FROM tbl_arsip WHERE status='0'");
    return $query->result();
  }

  public function jmlSuratKeluar()
  {
    $query = $this->db->query("SELECT COUNT(id) AS 'jml' FROM tbl_arsip WHERE status='1'");
    return $query->result();
  }

  public function getNoSurat()
  {
    $query = $this->db->query("SELECT no_surat FROM tbl_arsip");
    return $query->result();
  }

  public function createPeminjam($data)
  {
    return $this->db->insert('tbl_peminjaman', $data);
  }

  public function updatePeminjam($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update('tbl_peminjaman', $data);
  }

  public function deletePeminjam($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('tbl_peminjaman');
  }

  public function getUser($id)
  {
    $query = $this->db->query("SELECT * from tbl_arsip WHERE id='" . $id . "'");
    return $query->result();
  }

  //KHUSUS EDIT
  public function getUserData($id)
  {
    $result = $this->db->get_where('tbl_arsip', ['id' => $id]);

    if ($result->num_rows() == 1) {
      return $result->row_array();
    } else {
      return false;
    }
  }
}
