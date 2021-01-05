<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAcces extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('User_model', 'modelUser');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        
        //sesion untuk mengamankan ketika di back tidak login lagi
        if (!$this->session->userdata('user_id')) {
			redirect('auth');
        }

    }
    public function index()
    {
        if ($this->session->userdata['role_id'] == "SUs" )
        {
            $data['title'] = "User Access Management";
            $data['userAccess'] = $this->modelUser->getUserAcces();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("menu/UserAccess", $data);
            $this->load->view("templates/dashboard_footer");

            
        } else
        {
            var_dump($this->session->userdata['role_id']);
            die;
            redirect("auth");
        }

    }

}