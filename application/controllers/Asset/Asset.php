<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Asset_model', 'model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('file','date');    

        //sesion untuk mengamankan ketika di back tidak login lagi
        if (!$this->session->userdata('user_id')) {
			redirect('auth');
        }

    }
	public function index()
	{
        if ($this->session->userdata['role_id'] != 1)
        {
            redirect("auth");
        } else
        {

            $data['title'] = "Data Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/index", $data);
            $this->load->view("templates/dashboard_footer");
            
        }
       
    }
    
    public function Kategori()
    {
        if ($this->session->userdata['role_id'] != 1)
        {
            redirect("auth");
        } else
        {
            $data['kategori'] = $this->model->getKategoriAsset();
            $data['title'] = "Kategori Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/kategori", $data);
            $this->load->view("templates/dashboard_footer");  
        }

    }
    public function tambahKategori()
    {
        $this->form_validation->set_rules('id_k_asset','ID','required|is_unique[kategori_asset.id_k_asset]');
        $this->form_validation->set_rules('nama_k_asset', 'Nama Asset ', 'required|is_unique[kategori_asset.nama_k_asset]');

        if ($this->form_validation->run()== false)
        {
            $data['kategori'] = $this->model->getKategoriAsset();
            $data['title'] = "Kategori Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/kategori", $data);
            $this->load->view("templates/dashboard_footer"); 
        }else {


            $data = [
                
                'id_k_asset' => $this->input->post('id_k_asset'),
                'nama_k_asset' => $this->input->post('nama_k_asset'),
                'update_time' => date('Y-m-d')
            ];

            $this->model->setKategori($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add data Kategori Asset </div>');
            redirect("Asset/Asset/Kategori");
    }
  }
  public function delAsset($data)
  {
        $this->model->delAsset($data);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Kategori Aset Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Asset/Asset/Kategori');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Kategori ASet</div>');
            redirect('Asset/Asset/Kategori');

        }
  }

  public function EditKategori()
  {
       // cek id asset
       $oldid = $this->input->post('oldid');
       if($this->input->post('id_k_asset') != $oldid) {
           $is_unique =  '|is_unique[kategori_asset.id_k_asset]';
       } else {
          $is_unique =  '' ;
       }
       // cek nama kategori asset
       $oldname = $this->input->post('oldname');
       if($this->input->post('nama_k_asset') != $oldname) {
           $is_uniqueName =  '|is_unique[kategori_asset.nama_k_asset]';
       } else {
        $is_uniqueName =  '' ;
       }
        $this->form_validation->set_rules('id_k_asset','ID','required'.$is_unique);
        $this->form_validation->set_rules('nama_k_asset', 'Nama Asset ', 'alpha_numeric|required'.$is_uniqueName);

        if ($this->form_validation->run()== false)
        {
            $data['kategori'] = $this->model->getKategoriAsset();
            $data['title'] = "Kategori Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/kategori", $data);
            $this->load->view("templates/dashboard_footer"); 
        }else {
            $data = [  
                'id_k_asset' => $this->input->post('id_k_asset'),
                'nama_k_asset' => $this->input->post('nama_k_asset'),
                'update_time' => date('Y-m-d')
            ];

            $this->model->editAsset($data,$oldid);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Mengedit Data Kategori ASet</div>');
            redirect('Asset/Asset/Kategori');

        }

  }

}
