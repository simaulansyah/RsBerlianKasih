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



}