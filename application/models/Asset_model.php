<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asset_model extends CI_Model
{
    public function getKategoriAsset()
    {
        $query = $this->db->query('SELECT * FROM kategori_asset');
        $result = $query->result_array();
        return $result;
    }

    public function setKategori($data)
    {
        $this->db->insert('kategori_asset', $data);
    }

    public function delAsset($data)
    {
        $this->db->where('id_k_asset', $data);
        $this->db->delete('kategori_asset');
    }
    public function editAsset($data, $oldid)
    {
        $this->db->update('kategori_asset', $data, array('id_k_asset' => $oldid)); 

    }

}