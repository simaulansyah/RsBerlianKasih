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
        $this->form_validation->set_rules('id_spesialisasi','ID Spesialisasi','required|is_unique');
        $this->form_validation->set_rules('nama_spesialisasi', 'Nama Spesialisasi', 'required|is_unique');

        if ($this->form_validation->run() == false)
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
                var_dump($data);
                die;    

        }


       
        

    }
}