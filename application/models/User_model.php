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

    public function getNamaUser($id)
    {
        $this->db->where('id_user', $id); 
        $this->db->from('user');
        return $this->db->get()->result_array();  
    }

    public function getMenu()
    {
        return $this->db->query('SELECT * from user_menu')->result_array();
    }

    public function setMenu($menu)
    {
        $this->db->insert('user_menu', $menu);
    }

    public function editMenu($id, $data)
    {
        $this->db->update('user_menu', $data, array('id_menu' => $id));
    }
    public function delMenu($id)
    {
        $this->db->delete('user_menu', array('id_menu' => $id));
    }

    public function getUserAcces()
    {
        //return $this->db->query('SELECT * from user_access_menu')->result_array();
        $this->db->select('*')
                 ->from('user_access_menu')//jabatan adalah anak & pegawai adalah tabel utama 
                 ->join('user_role', 'user_role.role_id = user_access_menu.role_id')
                 ->join('user_menu', 'user_menu.id_menu = user_access_menu.menu_id','left');


        $query = $this->db->get();
        $result = $query->result_array();
   
        return $result;
    }

}