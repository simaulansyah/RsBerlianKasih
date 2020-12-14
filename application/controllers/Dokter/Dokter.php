<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

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
			$data['title'] = "Data Dokter";
			$data['dokter'] = $this->model->getDokter();
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("dokter/index", $data);
            $this->load->view("templates/dashboard_footer");  
            
        }
       
	}
}
