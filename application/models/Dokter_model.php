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

    public function setSpesialisasi($data)
    {
        $this->db->insert('spesialisasi', $data);
    }
    public function delSpesialisasi($data)
    {
        $this->db->where('id_spesialisasi', $data);
        $this->db->delete('spesialisasi');
    }
    public function editSpesialisasi($data, $oldid)
    {
        $this->db->update('spesialisasi', $data, array('id_spesialisasi' => $oldid)); 

    }

    public function setDokter($data)
    {
        $this->db->insert('dokter', $data);
    }
    public function delDokter($data)
    {
        $this->db->where('id_dokter', $data);
        $this->db->delete('dokter');

    }

    public function getRowDokter() 
    {
        //$query = $this->db->query('SELECT COUNT(id_kasur) FROM kasur');
        $query = $this->db->query('SELECT * FROM dokter');
        $result = $query->num_rows();//get total row
        return $result;
    }

    public function updateDokter($data, $oldid)
    {
        $this->db->update('dokter', $data, array('id_dokter' => $oldid));    

    }

}