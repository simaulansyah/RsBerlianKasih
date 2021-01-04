<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
        // var_dump($this->session->userdata['role_id']);
        // die;
        if ($this->session->userdata['role_id'] == "Rs01s" || $this->session->userdata['role_id'] == "SUs" )
        {
            $data['title'] = "Admin";
            $data['totalKasur'] = $this->modelRuangan->getRowKasur();
            $data['statusKasurisi'] = $this->modelRuangan->getStatusKasurisi(); 
            $data['statusKasurKosong'] = $this->modelRuangan->getStatusKasurKosong(); 
            $data['totalAsset'] = $this->modelAsset->getRowAsset();
            $data['jumlahAsset'] = $this->modelAsset->getJumlahAsset();
            $data['jumlahPegawai'] = $this->modelPegawai->getRowPegawai();
            $data['jumlahDokter'] = $this->modelDokter->getRowDokter();
            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("admin/admin", $data);
            $this->load->view("templates/dashboard_footer");

            
        } else
        {
            var_dump($this->session->userdata['role_id']);
            die;
            redirect("auth");
        }
       
    }
    

}