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
            $data['title'] = "Admin";
            $data['totalKasur'] = $this->modelRuangan->getRowKasur();
            $data['statusKasurisi'] = $this->modelRuangan->getStatusKasurisi(); 
            $data['statusKasurKosong'] = $this->modelRuangan->getStatusKasurKosong(); 
            $data['totalAsset'] = $this->modelAsset->getRowAsset();
            $data['jumlahAsset'] = $this->modelAsset->getJumlahAsset();
            $data['jumlahPegawai'] = $this->modelPegawai->getRowPegawai();
            $data['jumlahDokter'] = $this->modelDokter->getRowDokter();


            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("admin/admin", $data);
            $this->load->view("templates/dashboard_footer");
            
        }
       
    }
    

}