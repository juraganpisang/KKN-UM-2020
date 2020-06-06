<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getUser($username)
    {
        // Validate
        $this->db->where('username', $username);

        $result = $this->db->get('tbl_user');

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    public function createUser($data)
    {
        $this->db->insert('tbl_user', $data);
    }
}
