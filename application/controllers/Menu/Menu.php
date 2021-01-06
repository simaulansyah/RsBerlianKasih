<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
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
            $data['title'] = "Menu";
            $data['menu'] = $this->modelUser->getMenu();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("menu/index", $data);
            $this->load->view("templates/dashboard_footer");

            
        } else
        {
            var_dump($this->session->userdata['role_id']);
            die;
            redirect("auth");
        }
       
    }

    public function tambahMenu()
    {
        $this->form_validation->set_rules('nama_menu','Nama Menu', 'required|is_unique[user_menu.menu]');

       if ($this->form_validation->run() == false)
       {
        $data['title'] = "Menu";
        $data['menu'] = $this->modelUser->getMenu();
        $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
        $this->load->view("templates/dashboard_header");
        $this->load->view("templates/dashboard_sidebar", $data);
        $this->load->view("templates/dashboard_topbar", $data);
        $this->load->view("menu/index", $data);
        $this->load->view("templates/dashboard_footer");

       } else 
       {
           $data = [
                'menu' => $this->input->post('nama_menu')
           ];

        $this->modelUser->setMenu($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add data Menu </div>');
        redirect("Menu/Menu");

       }

     
    }


    public function EditMenu()
    {
        $id = $this->input->post('id_menu');
        $oldname = $this->input->post('oldname');
        if($this->input->post('nama_menu') != $oldname) {
            $is_unique =  '|is_unique[user_menu.menu]';
        } else {
           $is_unique =  '' ;
        }


        $this->form_validation->set_rules('nama_menu','Nama Menu', 'required'.$is_unique);
        if ($this->form_validation->run() == false)

        {
            $data['title'] = "Menu";
            $data['menu'] = $this->modelUser->getMenu();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("menu/index", $data);
            $this->load->view("templates/dashboard_footer");

        }else
        {
            $data = 
            [
                'menu' => $this->input->post('nama_menu')

            ];

            $this->modelUser->editMenu($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success edit data Menu </div>');
            redirect("Menu/Menu");

        }
    }

    public function delMenu($id)
    {
        $this->modelUser->delMenu($id);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Kasur Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Menu/Menu');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Menu</div>');
            redirect('Menu/Menu');

        }

    }


}