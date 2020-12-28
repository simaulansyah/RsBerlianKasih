<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Auth_model');
        $this->load->library('session');
      //  $this->load->library('form_validation');
      //  $this->load->helper(array('form', 'url'));
    }

	public function index()
	{ 
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'username', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['role'] = $this->Auth_model->getrole();
            $this->load->view('templates/auth_header');
            $this->load->view('templates/auth_footer');
            $this->load->view('Auth/login', $data);
        } else
        {
            $this->_login();
        }
    }
    private function _login()
    {
        $user = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        $role = $this->input->post('role');

        // CEK KE DATABASE BERDASARKAN username
        $cek_login =  $this->Auth_model->getuserlogin($user);

       if ($cek_login == NULL)
       {
           //jika tidak ada
        echo '<script>alert("Username yang Anda masukan salah.");window.location.href="' . base_url('auth') . '";</script>';
       } else
       {
           //jika ada, lalu cek password
           if($pass != $cek_login->password)
           {
               //jika password salah
               echo '<script>alert("Password yang Anda masukan salah.");window.location.href="' . base_url('auth') . '";</script>';
           }
           else {
                //jika password betul cek jabatan
               if ($role != $cek_login->role_id)
               {
                echo '<script>alert("Jabatan yang Anda masukan Tidak Sesuai.");window.location.href="' . base_url('auth') . '";</script>';
                
               }
               else
               {
                $session_data = array(
                    'user_id'   => $cek_login->id_user,
                    'role_id'   => $cek_login->role_id
                );
                $this->session->set_userdata($session_data);

                if ($this->session->userdata['role_id'] == 1) {
                    redirect('admin');
                }
                if ($this->session->userdata['role_id'] == 2) {
                    redirect('perawat');
                }
                if ($this->session->userdata['role_id'] == 3) {
                    redirect('apotek');
                } else {
                    redirect('welcome');
                }

               }
            

           }

       }

    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        //$this->session->unset_userdata(array('user_name' => ''));
        redirect('auth');
    }

    public function Regis()
    {
        	// set rules
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', [
			// custom message
			'is_unique' => 'Email is already exists!'
		]);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]|matches[password2]', [
			// custom message
			'matches' => 'Password didn\'t match!',
			'min_length' => 'Password is too short!' 
		]);
        $this->form_validation->set_rules('password2','confirmation password','matches[password]');
        $this->form_validation->set_rules('role','Jabatan','required');
            if ($this->form_validation->run() == false )
            {
                $data['role'] = $this->Auth_model->getrole();
                $this->load->view('templates/auth_header');
                $this->load->view('templates/auth_footer');
                $this->load->view('Auth/regis', $data);        
            }
            else {
                 
        $data = [
            'nama_user' => $this->input->post('username', TRUE),
            'email' => $this->input->post('email', TRUE),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role', TRUE),
            'is_active' => 0,
            'date_created' => time()
        ];

        $role = $this->input->post('role', TRUE);
            $this->Auth_model->setUser($data, $role);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> buka email anda dan verifikasi untuk login </div>');
            redirect('Auth/Regis');

            }

     
        
    
    }

    public function verify()
	{
        $this->Auth_model->run_verify();
        var_dump($this->Auth_model->run_verify());
        die;
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> buka email anda dan verifikasi untuk login </div>');
            redirect('Auth/Regis');
        
	}
}