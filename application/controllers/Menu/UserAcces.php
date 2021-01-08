<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAcces extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('User_model', 'modelUser');
        $this->load->model('Auth_model','modelAuth');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        
        //sesion untuk mengamankan ketika di back tidak login lagi
        if (!$this->session->userdata('user_id')) {
			redirect('auth');
        }

    }
    public function index()
    {
        if ($this->session->userdata['role_id'] == "SU")
        {
            $data['title'] = "User Access Management";
            $data['userAccess'] = $this->modelUser->getUserAcces();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $data['role'] = $this->modelAuth->getrole();
            $data['menu'] = $this->modelUser->getMenu();
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



    public function tambahAccess()
    {
        
        $this->form_validation->set_rules('role','Role', 'required|callback_check_user');
        $this->form_validation->set_rules('menu','Menu', 'required');

        if ($this->form_validation->run() == false)
        {
            $data['title'] = "User Access Management";
            $data['userAccess'] = $this->modelUser->getUserAcces();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $data['role'] = $this->modelAuth->getrole();
            $data['menu'] = $this->modelUser->getMenu();
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("menu/UserAccess", $data);
            $this->load->view("templates/dashboard_footer");

        } else
        {
            $data = [

                'role_id' => $this->input->post('role'),
                'menu_id' => $this->input->post('menu')
    
            ];
            $this->modelUser->setUserAccess($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add data Access </div>');
            redirect("Menu/UserAcces");

        }

        
    }

    public function delAccess ($id)
    {
        $this->modelUser->delAcces($id);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data access Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Menu/UserAcces');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Access</div>');
            redirect('Menu/UserAcces');

        }

    }


    public function EditAccess()
    {
        $id = $this->input->post('id_access');
        $this->form_validation->set_rules('role','Role', 'required|callback_check_user');
        $this->form_validation->set_rules('menu','Menu', 'required');

        if ($this->form_validation->run() == false)
        {
            $data['title'] = "User Access Management";
            $data['userAccess'] = $this->modelUser->getUserAcces();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $data['role'] = $this->modelAuth->getrole();
            $data['menu'] = $this->modelUser->getMenu();
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("menu/UserAccess", $data);
            $this->load->view("templates/dashboard_footer");

        } else{
            $data = [

                'role_id' => $this->input->post('role'),
                'menu_id' => $this->input->post('menu')
            ];

            $this->modelUser->editAccess($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success edit data Acces </div>');
            redirect("Menu/UserAcces");
        }
    }



    public function check_user() {
        $role = $this->input->post('role');// get fiest name
        $menu = $this->input->post('menu');// get last name
        $this->db->select('role_id, menu_id');
        $this->db->from('user_access_menu');
        $this->db->where('role_id', $role);
        $this->db->where('menu_id', $menu);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            $this->form_validation->set_message('check_user', 'menu sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}