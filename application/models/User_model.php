<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUser()
    {
        return $this->db->query('SELECT * FROM user')->result_array();
    }

    public function getJoinRole()
    {
        $this->db->select('*')
                 ->from('user_role')//jabatan adalah anak & pegawai adalah tabel utama 
                 ->join('user', 'user.role_id = user_role.role_id');

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
     
    }

}