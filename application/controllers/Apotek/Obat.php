<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Apotek_model', 'model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('file','date');    
        $this->load->library('Fcurl');
        $this->load->model('User_model', 'modelUser');

        //sesion untuk mengamankan ketika di back tidak login lagi
        if (!$this->session->userdata('user_id')) {
			redirect('auth');
        }

    }
	public function index()
	{

    }

    public function Suplier()
    { 
        $data['suplier'] = $this->fcurl->urlGet(base_url('/api/Apotek/Obat'));
        $data['title'] = "Data Suplier";
        $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
        $this->load->view("templates/dashboard_header");
        $this->load->view("templates/dashboard_sidebar", $data);
        $this->load->view("templates/dashboard_topbar", $data);
        $this->load->view("Apotek/suplier", $data);
        $this->load->view("templates/dashboard_footer");  

    }

    public function tambahSuplier()
    {
        $this->form_validation->set_rules('id_suplier','ID Suplier', 'required|is_unique[suplier_obat.id_suplier]');
        $this->form_validation->set_rules('nama_suplier','Nama Suplier', 'required|is_unique[suplier_obat.nama_suplier]');
        $this->form_validation->set_rules('alamat_suplier','Alamat', 'required');

        if ($this->form_validation->run() == FALSE)
        {

        $data['suplier'] = $this->fcurl->urlGet(base_url('/api/Apotek/Obat'));
        $data['title'] = "Data Suplier";
        $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);

        $this->load->view("templates/dashboard_header");
        $this->load->view("templates/dashboard_sidebar", $data);
        $this->load->view("templates/dashboard_topbar", $data);
        $this->load->view("Apotek/suplier", $data);
        $this->load->view("templates/dashboard_footer"); 

        } else

        {
            $data = [
                'id_suplier' => $this->input->post('id_suplier'),
                'nama_suplier' => $this->input->post('nama_suplier'),
                'alamat_suplier' => $this->input->post('alamat_suplier'),
                'telepon_suplier' => $this->input->post('telepon_suplier')
            ];
            $send = $this->fcurl->urlSet(base_url('/api/Apotek/Obat'), json_encode($data));
            $this->session->set_flashdata('message', json_encode(array('respon'=>$send),JSON_UNESCAPED_SLASHES));
            redirect('Apotek/Obat/Suplier');

        }
    }

    public function hapusSuplier($data)
    {
    
        $send = $this->fcurl->urlDel(base_url('/api/Apotek/Obat'), json_encode($data));
        $this->session->set_flashdata('message', json_encode(array('respon'=>$send),JSON_UNESCAPED_SLASHES));
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Kasur Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Apotek/Obat/Suplier');

        } else
        { 
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Suplier</div>');
            redirect('Apotek/Obat/Suplier');

        }

    } 
    public function editSuplier ()
    {
        $oldid = $this->input->post('oldid');
        if($this->input->post('id_suplier') != $oldid) {
            $is_unique =  '|is_unique[suplier_obat.id_suplier]';
        } else {
           $is_unique =  '' ;
        }
        $oldname = $this->input->post('oldname');
        if($this->input->post('nama_suplier') != $oldname) {
            $is_uniquename =  '|is_unique[suplier_obat.nama_suplier]';
        } else {
           $is_uniquename =  '' ;
        }

        $this->form_validation->set_rules('id_suplier','ID Suplier', 'required'.$is_unique);
        $this->form_validation->set_rules('nama_suplier','Nama Suplier', 'required'.$is_uniquename);
        $this->form_validation->set_rules('alamat_suplier','Alamat', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['suplier'] = $this->fcurl->urlGet(base_url('/api/Apotek/Obat'));
            $data['title'] = "Data Suplier";
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Apotek/suplier", $data);
            $this->load->view("templates/dashboard_footer"); 

        }else
        {
            $data = [

                'oldid' => $this->input->post('oldid'),
                'id_suplier' => $this->input->post('id_suplier'),
                'nama_suplier' => $this->input->post('nama_suplier'),
                'alamat_suplier' => $this->input->post('alamat_suplier'),
                'telepon_suplier' => $this->input->post('telepon_suplier')
            ];
            

            $send = $this->fcurl->urlPut(base_url('/api/Apotek/Obat'), json_encode($data));
            $this->session->set_flashdata('message', json_encode(array('respon'=>$send),JSON_UNESCAPED_SLASHES));
            redirect('Apotek/Obat/Suplier');
            
        }

       

    }
}