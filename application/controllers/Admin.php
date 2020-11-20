<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Auth_model', 'model');
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
            $data['title'] = "Admin";

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("admin/admin", $data);
            $this->load->view("templates/dashboard_footer");
            
        }
       
    }
    

}