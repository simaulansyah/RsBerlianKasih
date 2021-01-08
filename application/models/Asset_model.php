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

    public function delkAsset($data)
    {
        $this->db->where('id_k_asset', $data);
        $this->db->delete('kategori_asset');
    }
    public function editAsset($data, $oldid)
    {
        $this->db->update('kategori_asset', $data, array('id_k_asset' => $oldid)); 

    }
    public function getLokasi()
    {
        $query = $this->db->query('SELECT * FROM lokasi');
        $result = $query->result_array();
        return $result;
    }

    public function setLokasi($data)
    {
        $this->db->insert('lokasi', $data);
    }

    public function delLokasi($data)
    {
        $this->db->where('id_lokasi', $data);
        $this->db->delete('lokasi');

    }

    public function editLokasi($data, $oldid)
    {
        $this->db->update('lokasi', $data, array('id_lokasi' => $oldid)); 

    }

    public function getAsset()
    {
        $query = $this->db->query('SELECT * FROM asset');
        $result = $query->result_array();
        return $result;

    }
    public function setAsset($data)
    {
        $this->db->insert('asset', $data);
    }

    public function delAset($data)
    {
        $this->db->where('id_asset', $data);
        $this->db->delete('asset');
    }
    public function maxID()
    {
        $query = $this->db->query('SELECT MAX(id_asset) FROM asset');
        $result = $query->row_array();
        $id = implode("-", $result); //int
        $urutan = (int)substr($id,4);
        $urutan++;
        $huruf = "Ast-";
        $finalID = $huruf . sprintf("%03s", $urutan);
        if ($finalID == "Ast-000")
        {
        return "Ast-001";
        }
        else
        {
        return $finalID;
        
        }

    }


    public function EditdtAsset($data, $oldid)
    {
        $this->db->update('asset', $data, array('id_asset' => $oldid)); 
    }


    public function getRowAsset() 
    {
        //$query = $this->db->query('SELECT COUNT(id_kasur) FROM kasur');
        $query = $this->db->query('SELECT * FROM asset');
        $result = $query->num_rows();//get total row
        return $result;
    }

    public function getJumlahAsset()
    {
        $query = $this->db->query('SELECT SUM(harga) FROM asset');
        $result = $query->row_array();//get string
        return $result;

    }


}