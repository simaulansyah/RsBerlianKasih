<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji_model extends CI_Model
{
    public function getGaji()
    {
        $query = $this->db->query('SELECT * FROM gaji');
        $result = $query->result_array();
        return $result;
    }

    public function getQueryGaji()
    {
        $this->db->select('*')
                 ->from('pegawai as t1')
                 ->join('jabatan as t2', 't2.id_jabatan = t1.id_jabatan','LEFT');

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;

    }
    public function SetGaji($data)
    {
        $this->db->insert('gaji', $data);
    }



}