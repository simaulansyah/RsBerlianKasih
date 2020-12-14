<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan_model extends CI_Model
{
    public function getRuangan()
    {
        $query = $this->db->query('SELECT * FROM ruangan');
        $result = $query->result_array();
        return $result;
    }
    public function tambahData($data, $table)
    {
        $this->db->insert($table,$data);
    }

    public function delRuangan($id_ruangan)
    {
        $this->db->where('id_ruangan', $id_ruangan);
        $this->db->delete('ruangan');
    }
    public function getBed()
    {
        $query = $this->db->query('SELECT * FROM kasur');
        $result = $query->result_array();
        return $result;
    }
    public function setBed($data)
    {
        $this->db->insert("kasur",$data);

    }
    public function delBed ($id_kasur)
    {
        $this->db->where('id_kasur', $id_kasur);
        $this->db->delete('kasur');

    }

    public function editRuangan($data, $oldid)
    {
        $this->db->update('ruangan', $data, array('id_ruangan' => $oldid)); 

    }

    public function getStatus()
    {
        $st = array(0,1);
        return $st;
    }
    public function editKasur($data, $oldid)
    {
        $this->db->update('kasur', $data, array('id_kasur' => $oldid)); 

    }

    public function getRowKasur() 
    {
        //$query = $this->db->query('SELECT COUNT(id_kasur) FROM kasur');
        $query = $this->db->query('SELECT * FROM kasur');
        $result = $query->num_rows();
        return $result;
    }
    public function getStatusKasurisi()
    { 
        $query = $this->db->query('SELECT status FROM kasur where status=1');
        $result = $query->num_rows();
        return $result;
    }
    public function getStatusKasurKosong()
    { 
        $query = $this->db->query('SELECT status FROM kasur where status=0');
        $result = $query->num_rows();
        return $result;
    }



}