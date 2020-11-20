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



}