<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Auth_model', 'model');
        $this->load->model('Gaji_model', 'gaji');
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
            $data['title'] = "Data Gaji";
            $data['gaji'] = $this->gaji->getGaji();
            $data['qgaji'] = $this->gaji->getQueryGaji();
            

            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("gaji/index", $data);
            $this->load->view("templates/dashboard_footer");
            
        }
       
    }

    public function tambahGaji ()
    {
    $gajip = $this->input->post('gaji_pokok');
    $tunj = $this->input->post('tunj_jabatan');
    
    $potongan = $this->input->post('potongan');
    $gajibersih = ($gajip+$tunj) - $potongan;

  

     $data = array (
        'no_slip' => $this->input->post('no_slip'),
        'nip' => $this->input->post('nip'),
        'nama_pegawai' => $this->input->post('nama_pegawai'),
        'tgl_slip' => $this->input->post('tgl'),
        'gaji_pokok' => $gajip,
        'tunj_jabatan' => $tunj,
        'potongan' => $potongan,
        'gaji_bersih' =>  $gajibersih,
        'id_user' => 1,
        'keterangan' => $this->input->post('keterangan')

    );

    $this->gaji->SetGaji($data);
    redirect('gaji');    
    }

    public function hapusGaji()
    {
        $id = $_GET['param'];
        $this->gaji->DelGaji($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sukses Delete </div>');
        redirect('gaji');
    }
}