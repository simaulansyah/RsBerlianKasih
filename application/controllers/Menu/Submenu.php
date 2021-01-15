<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller {
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
            $data['title'] = "SubMenu Management";
            $data['querysubMenu'] = $this->modelUser->getSubmenu();
            $data['menu'] = $this->modelUser->getMenu();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $data['link'] = $this->modelUser->getNamaJabatan($this->session->userdata['role_id']);
            $data['linkDashboard'] = $data['link'].'/'.$data['link'];

            $this->load->view("templates/light_header", $data);
            $this->load->view("templates/light_sidebar", $data);
            $this->load->view("menu/submenu", $data);           
            $this->load->view("templates/light_footer", $data);


            
        } else
        {
            var_dump($this->session->userdata['role_id']);
            die;
            redirect("auth");
        }

    }

    public function tambahSubmenu ()
    {

        $this->form_validation->set_rules('menu','Menu', 'required',[
            'required' => 'Menu Tidak Boleh Kosong'

        ]);
      
        $this->form_validation->set_rules('title','Title', 'required|callback_check_user',[
            'required' => 'Title Tidak Boleh Kosong'

        ]);
        $this->form_validation->set_rules('url','URL', 'required|trim',[
			// custom message0
			'required' => 'Url Tidak Boleh Kosong'
		]);

        if ($this->form_validation->run() == false)
        {
            $data['title'] = "SubMenu Management";
            $data['querysubMenu'] = $this->modelUser->getSubmenu();
            $data['menu'] = $this->modelUser->getMenu();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $data['link'] = $this->modelUser->getNamaJabatan($this->session->userdata['role_id']);
            $data['linkDashboard'] = $data['link'].'/'.$data['link'];

            $this->load->view("templates/light_header", $data);
            $this->load->view("templates/light_sidebar", $data);
            $this->load->view("menu/submenu", $data);           
            $this->load->view("templates/light_footer", $data);

        } else {

        $data = 
        [
            'menu_id' => $this->input->post('menu'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('check[0]')
        ];
       $this->modelUser->setSubmenu($data);
       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add data Submenu </div>');
       redirect("Menu/Submenu");

        }



    }

    public function delSub($id)
    {
        $this->modelUser->delSub($id);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data access Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Menu/Submenu');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Access</div>');
            redirect('Menu/Submenu');

        }

    }


    public function editSub()
    {
        $id = $this->input->post('id_sub');


            // cek id kasur
            $oldmenu = $this->input->post('oldmenu');
            $oldtitle = $this->input->post('oldtitle');
            if($this->input->post('menu') != $oldmenu || $this->input->post('title') != $oldtitle ) {
                $is_unique =  '|callback_check_user';
            } else {
               $is_unique =  '' ;
            }
       
  


        $this->form_validation->set_rules('menu','Menu', 'required',[
            'required' => 'Menu Tidak Boleh Kosong'

        ]);
      
        $this->form_validation->set_rules('title','Title', 'required'.$is_unique);
        $this->form_validation->set_rules('url','URL', 'required|trim',[
			// custom message0
			'required' => 'Url Tidak Boleh Kosong'
		]);

        if ($this->form_validation->run() == false)
        {
            $data['title'] = "SubMenu Management";
            $data['querysubMenu'] = $this->modelUser->getSubmenu();
            $data['menu'] = $this->modelUser->getMenu();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $data['link'] = $this->modelUser->getNamaJabatan($this->session->userdata['role_id']);
            $data['linkDashboard'] = $data['link'].'/'.$data['link'];

            $this->load->view("templates/light_header", $data);
            $this->load->view("templates/light_sidebar", $data);
            $this->load->view("menu/submenu", $data);           
            $this->load->view("templates/light_footer", $data);

        } else {

        $data = 
        [
            'menu_id' => $this->input->post('menu'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('check[0]')
        ];

        $this->modelUser->editSub($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success edit data Submenu </div>');
        redirect("Menu/Submenu");
 
    }

    }

    public function check_user() {
        $menu = $this->input->post('menu');// get fiest name
        $title = $this->input->post('title');// get last name
        $this->db->select('menu_id, title');
        $this->db->from('user_sub_menu');
        $this->db->where('menu_id', $menu);
        $this->db->where('title', $title);
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