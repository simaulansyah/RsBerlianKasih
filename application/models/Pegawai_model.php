<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function getpegawai()
    {
        $query = $this->db->query('SELECT * FROM pegawai');
        $result = $query->result_array();
        return $result;
    }

    public function getJabatan()
    {
        $query = $this->db->query('SELECT * FROM jabatan');
        $result = $query->result_array();
        return $result;

    }
    public function setPegawai($data)
    {
        $this->db->insert('pegawai', $data);
    }
    public function DelPegawai($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pegawai');
    }
    public function getJoinJabatan()
    {
        $this->db->select('*')
                 ->from('pegawai')
                 ->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
     
    }

    public function getGender()
    {
        $jk = array('Pria','Wanita');
        return $jk;
    }
    public function getStat()
    {
        $stat = array('Lajang','Cerai','Menikah');
        return $stat;
    }

    public function updatePegawai($data, $id)
    {
        $query = $this->db->update('pegawai', $data, array('id' => $id)); 

    }

}