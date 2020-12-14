<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_model extends CI_Model
{
    public function getDokter()
    {
        $query = $this->db->query('SELECT * FROM dokter');
        $result = $query->result_array();
        return $result;
    }
    public function getSpesialisasi()
    {
        $query = $this->db->query('SELECT * FROM spesialisasi');
        $result = $query->result_array();
        return $result;

    }

}