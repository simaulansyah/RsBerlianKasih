<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spesialisasi extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Dokter_model', 'model');
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
			$data['title'] = "Data Spesialisasi";
			$data['spesialisasi'] = $this->model->getSpesialisasi();
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("dokter/spesialisasi", $data);
            $this->load->view("templates/dashboard_footer");  
            
        }
    }
    

    public function tambahdata()
    {
        $this->form_validation->set_rules('id_spesialisasi','ID Spesialisasi','required|is_unique[spesialisasi.id_spesialisasi]');
        $this->form_validation->set_rules('nama_spesialisasi', 'Nama Spesialisasi', 'required|is_unique[spesialisasi.nama_spesialisasi]');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Data Spesialisasi";
			$data['spesialisasi'] = $this->model->getSpesialisasi();
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("dokter/spesialisasi", $data);
            $this->load->view("templates/dashboard_footer"); 
        } else 
        {
            $data = [ 
                'id_spesialisasi' => $this->input->post('id_spesialisasi'),  
                'nama_spesialisasi' => $this->input->post('nama_spesialisasi')
            ];
            $this->model->setSpesialisasi($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success tambah data spesialisasi </div>');
            redirect("Dokter/Spesialisasi/index");       
        }
    }

    public function delSpesialisasi($data)
    {
        $this->model->delSpesialisasi($data);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Aset Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Dokter/Spesialisasi/index');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Aset</div>');
            redirect('Dokter/Spesialisasi/index');

        }

    }

    public function editSpesialisasi()
    {
      // cek idSpesialisasi
      $oldid = $this->input->post('oldid');
      if($this->input->post('id_spesialisasi') != $oldid) {
          $is_unique =  '|is_unique[spesialisasi.id_spesialisasi]';
      } else {
         $is_unique =  '' ;
      }
 
      //cek nama spesialisasi sebelmunya
 
      $oldname = $this->input->post('oldname');
      if($this->input->post('nama_spesialisasi') != $oldname) {
          $is_uniqueName =  '|is_unique[spesialisasi.nama_spesialisasi]';
       } else {
          $is_uniqueName =  '' ;
       }
 
        $this->form_validation->set_rules('id_spesialisasi','ID Spesialisasi','required'.$is_unique);
        $this->form_validation->set_rules('nama_spesialisasi', 'Nama Spesialisasi', 'required'.$is_uniqueName);
        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Data Spesialisasi";
			$data['spesialisasi'] = $this->model->getSpesialisasi();
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("dokter/spesialisasi", $data);
            $this->load->view("templates/dashboard_footer"); 
        } else 
        {
            $data = [ 
                'id_spesialisasi' => $this->input->post('id_spesialisasi'),  
                'nama_spesialisasi' => $this->input->post('nama_spesialisasi')
            ];
            $this->model->editSpesialisasi($data,$oldid);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success edit data spesialisasi </div>');
            redirect("Dokter/Spesialisasi/index");       
        }
    }

}

