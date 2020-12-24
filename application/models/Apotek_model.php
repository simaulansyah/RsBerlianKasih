<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apotek_model extends CI_Model
{
    public function getSuplier()
    {
        return $this->db->get('suplier_obat')->result_array();
    }

    public function setSuplier($data)
    {
        $this->db->insert('suplier_obat', $data);
        return $this->db->affected_rows();
    }

    public function delSuplier($data)
    {
        $this->db->where('id_suplier', $data);
        $this->db->delete('suplier_obat');
        return $this->db->affected_rows();
    }

    public function update_suplier($data, $oldid)
    {
        $this->db->update('suplier_obat', $data, array('id_suplier' => $oldid)); 
        return $this->db->affected_rows();
    }

}