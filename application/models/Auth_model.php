<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getrole()
    {
        $query = $this->db->query('SELECT * FROM user_role');
        $result = $query->result_array();
        return $result;
    }

    public function getuserlogin($user)
    {
        $hasil = $this->db->where('nama_user', $user)->limit(1)->get('user');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }

    }

}