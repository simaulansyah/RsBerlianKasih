<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('User_model', 'model');
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

            $data['title'] = "Data Pengguna ";
            $data['User'] = $this->model->getUser();
            $data['queryUser'] = $this->model->getJoinRole();


       

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("User/index", $data);
            $this->load->view("templates/dashboard_footer");
            

        }

    }

}