<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Ruangan_model', 'modelRuangan');
        $this->load->model('Auth_model', 'model');
        $this->load->model('Pegawai_model', 'modelPegawai');
        $this->load->model('Dokter_model', 'modelDokter');
        $this->load->model('Asset_model', 'modelAsset');
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
        $data['totalAsset'] = $this->modelAsset->getRowAsset();
        $data['jumlahAsset'] = $this->modelAsset->getJumlahAsset();
        $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
        $data['title'] = "Staff";
        $data['link'] = $this->modelUser->getNamaJabatan($this->session->userdata['role_id']);
        $data['linkDashboard'] = $data['link'].'/'.$data['link'];
        $this->load->view("templates/light_header", $data);
        $this->load->view("templates/light_sidebar", $data);
        $this->load->view("Staff/index", $data);
        $this->load->view("templates/light_footer", $data);
    }

}