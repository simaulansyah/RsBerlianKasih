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
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

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
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $role = $this->input->post('role');


        // CEK KE DATABASE BERDASARKAN email
        $cek_login =  $this->Auth_model->getuserlogin($email);

       if ($cek_login == NULL)
       {
           //jika tidak ada
        echo '<script>alert("email yang Anda masukan salah.");window.location.href="' . base_url('auth') . '";</script>';
       } else
       {
           
           //jika ada, lalu cek password
           
           if (password_verify($pass, $cek_login->password) == false)
          // if($pass != $cek_login->password)
           {
               //jika password salah
               echo '<script>alert("Password yang Anda masukan salah.");window.location.href="' . base_url('auth') . '";</script>';
           }
           else {
                //jika password betul cek jabatan
               if ($role != $cek_login->role_id)
               {
                //var_dump($role , $cek_login->role_id);
                //die;
                echo '<script>alert("Jabatan yang Anda masukan Tidak Sesuai.");window.location.href="' . base_url('auth') . '";</script>';
               die;
               }
               if ($cek_login->is_active == 0)
               {
                echo '<script>alert("Akun anda Belum Aktif.");window.location.href="' . base_url('auth') . '";</script>';
               }
            else
               {
                $session_data = array(
                    'user_id'   => $cek_login->id_user,
                    'role_id'   => $cek_login->role_id
                );
                $this->session->set_userdata($session_data);

                if ($this->session->userdata['role_id'] == "SUs") {
                    redirect('admin');
                }
                if ($this->session->userdata['role_id'] == "Rs03s") {
                    redirect('Perawat/Perawat');
                }
                if ($this->session->userdata['role_id'] == "Rs01s") {
                    redirect('admin');
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
		$this->form_validation->set_rules('nip','Nip','required|trim|is_unique[user.nip]', [
			// custom message0
			'is_unique' => 'nip is already exists!'
		]);
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
            if ($this->form_validation->run() == false )
            {
                $data['role'] = $this->Auth_model->getrole();
                $this->load->view('templates/auth_header');
                $this->load->view('templates/auth_footer');
                $this->load->view('Auth/regis', $data); 
            }
            else {

               $iduser = $this->input->post('nip');
               $get = $this->Auth_model->getPegawai($iduser);
               if (!$get)
               {
                echo '<script>alert("nip tidak ada.");window.location.href="' . base_url('auth/regis') . '";</script>';
               } else 
               {
                $password = $this->input->post("password", true);
                $data = [
                    'nip' => $this->input->post('nip'),
                    'nama_user' => $get["nama_pegawai"],
                    'email' => $this->input->post('email', TRUE),
                    'image' => 'default.jpg',
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    'role_id' => $get["id_jabatan"],
                    'is_active' => 0,
                    'date_created' => time()
                ];
                $this->Auth_model->setUser($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> buka email anda dan verifikasi untuk login </div>');
            
                redirect('Auth/Regis');   
            }
               echo '<script>alert("nip tidak ada.");window.location.href="' . base_url('auth/regis') . '";</script>';


            }
    
    }

    public function verify()
	{
       if($this->Auth_model->run_verify() == 0);{
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Selamat Akun Anda Telah Aktif Silahkan login </div>');
        redirect('Auth');
       } if ($this->Auth_model->run_verify() == "invalid token")
       {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> invalid token</div>');
        redirect('Auth');

       } if ($this->Auth_model->run_verify() == "expired")
       {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">expired</div>');
        redirect('Auth');
       } else 
       {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">invalid email</div>');
        redirect('Auth');
       }
       
       
        
	}
}