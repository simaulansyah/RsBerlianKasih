<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bed extends CI_Controller {

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
            $data ['total'] = $this->model->getRowKasur();
            $data['stat'] = $this->model->getStatus();
            $data['title'] = "Data Tempat Tidur ";
            $data['ruangan'] = $this->model->getRuangan();
            $data['bed'] = $this->model->getBed();

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Ruangan/bed", $data);
            $this->load->view("templates/dashboard_footer");
            
        }
    }
    
    public function tambahdata ()
    {
        $this->form_validation->set_rules('nokasur','No Kasur', 'required|is_unique[kasur.id_kasur]');
        $this->form_validation->set_rules('idruangan','ID Ruangan', 'required');
        $this->form_validation->set_rules('namaruangan','Nama Ruangan', 'required');
        $this->form_validation->set_rules('kelas','Kelas', 'required');
        $this->form_validation->set_rules('tarif','Tarif', 'required');
        $this->form_validation->set_rules('status','Status', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Data Tempat Tidur ";
            $data['ruangan'] = $this->model->getRuangan();
            $data['bed'] = $this->model->getBed();

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Ruangan/bed", $data);
            $this->load->view("templates/dashboard_footer");
        
        } else 
        {
                $nokasur = $this->input->post('nokasur');
                $id_ruangan = $this->input->post('idruangan'); //berdasarkan name
                $nama_ruangan = $this->input->post('namaruangan');
                $kelas = $this->input->post('kelas');
                $tarif = $this->input->post('tarif');
                $status = $this->input->post('status');

                $data=array(
                    'id_kasur' => $nokasur,
                    'id_ruangan' => $id_ruangan,
                    'nama_ruangan' => $nama_ruangan,
                    'kelas' => $kelas,
                    'tarif' => $tarif,
                    'status' => $status
                );
               
                $this->model->setBed($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add data Kasur </div>');
                redirect("Ruangan/Bed");

        }

    }
    public function hapusKasur($id_kasur)
    {
        $this->model->delBed($id_kasur);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Kasur Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Ruangan/Bed');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Kasur</div>');
            redirect('Ruangan/Bed');

        }
    }

    public function editKasur()
    {
          // cek id kasur
         $oldid = $this->input->post('oldid');
     if($this->input->post('nokasur') != $oldid) {
         $is_unique =  '|is_unique[kasur.id_kasur]';
     } else {
        $is_unique =  '' ;
     }

        $this->form_validation->set_rules('nokasur','No Kasur', 'required'.$is_unique);
        $this->form_validation->set_rules('tarif','Tarif', 'required');
        $this->form_validation->set_rules('status','Status', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Data Tempat Tidur ";
            $data['ruangan'] = $this->model->getRuangan();
            $data['bed'] = $this->model->getBed();

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Ruangan/bed", $data);
            $this->load->view("templates/dashboard_footer");
        
        } else {

            $nokasur = $this->input->post('nokasur');
            $id_ruangan = $this->input->post('idruangan'); //berdasarkan name
            $nama_ruangan = $this->input->post('namaruangan');
            $kelas = $this->input->post('kelas');
            $tarif = $this->input->post('tarif');
            $status = $this->input->post('status');

            $data=array(
                'id_kasur' => $nokasur,
                'id_ruangan' => $id_ruangan,
                'nama_ruangan' => $nama_ruangan,
                'kelas' => $kelas,
                'tarif' => $tarif,
                'status' => $status
            );

            $this->model->editKasur($data, $oldid);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success edit data Kasur </div>');
            redirect("Ruangan/Bed");




        }


              

                

    }
}
