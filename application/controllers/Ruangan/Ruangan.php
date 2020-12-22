<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Ruangan_model', 'model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

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
            $data['title'] = "Data Ruangan ";
            $data['ruangan'] = $this->model->getRuangan();

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Ruangan/index", $data);
            $this->load->view("templates/dashboard_footer");
            
        }
    }
    

    public function tambahdata()
    {
        $this->form_validation->set_rules('idruangan','ID Ruangan', 'required|is_unique[ruangan.id_ruangan]');
        $this->form_validation->set_rules('namaruangan','Nama Ruangan', 'required|is_unique[ruangan.nama_ruangan]');
        $this->form_validation->set_rules('kapasitas','Kapasitas', 'required');
        $this->form_validation->set_rules('kelas','Kelas', 'required');
        $this->form_validation->set_rules('jenis','Jenis', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Data Ruangan ";
            $data['ruangan'] = $this->model->getRuangan();

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Ruangan/index", $data);
            $this->load->view("templates/dashboard_footer");
        
        } else 
        {
                $id_ruangan = $this->input->post('idruangan');
                $nama_ruangan = $this->input->post('namaruangan');
                $kapasitas = $this->input->post('kapasitas');
                $kelas = $this->input->post('kelas');
                $jenis = $this->input->post('jenis');

            $data=array(

                'id_ruangan' => $id_ruangan,
                'nama_ruangan' => $nama_ruangan,
                'kapasitas' => $kapasitas,
                'kelas' => $kelas,
                'jenis' => $jenis
            );
            $this->model->tambahData($data, 'ruangan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add data Ruangan </div>');
            redirect("Ruangan/Ruangan");

        }
    }


    public function hapusRuangan($id_ruangan)
    {
        $this->model->delRuangan($id_ruangan);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Ruangan Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Ruangan/Ruangan');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Ruangan</div>');
            redirect('Ruangan/Ruangan');

        }

    }
    public function editDataRuangan()
    {
        // cek idruangan
     $oldid = $this->input->post('oldid');
     if($this->input->post('idruangan') != $oldid) {
         $is_unique =  '|is_unique[jabatan.id_jabatan]';
     } else {
        $is_unique =  '' ;
     }

     //cek nama ruangan sebelmunya

     $oldname = $this->input->post('oldname');
     if($this->input->post('nama_ruangan') != $oldname) {
         $is_uniqueName =  '|is_unique[jabatan.nama_jabatan]';
      } else {
         $is_uniqueName =  '' ;
      }



        $this->form_validation->set_rules('idruangan','ID Ruangan', 'required'.$is_unique);
        $this->form_validation->set_rules('namaruangan','Nama Ruangan', 'required'.$is_uniqueName);
        $this->form_validation->set_rules('kapasitas','Kapasitas', 'required');
        $this->form_validation->set_rules('kelas','Kelas', 'required');
        $this->form_validation->set_rules('jenis','Jenis', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Data Ruangan ";
            $data['ruangan'] = $this->model->getRuangan();

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Ruangan/index", $data);
            $this->load->view("templates/dashboard_footer");
        
        } else {

        $oldid = $this->input->post('oldid');
        $newid = $this->input->post('idruangan');
        $nama_ruangan = $this->input->post('namaruangan');
        $kapasitas = $this->input->post('kapasitas');
        $kelas = $this->input->post('kelas');
        $jenis = $this->input->post('jenis');

        $data=array(

            'id_ruangan' => $newid,
            'nama_ruangan' => $nama_ruangan,
            'kapasitas' => $kapasitas,
            'kelas' => $kelas,
            'jenis' => $jenis
        );
        $this->model->editRuangan($data, $oldid);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success edit data Ruangan </div>');
        redirect("Ruangan/Ruangan");
        }
     


    }
}