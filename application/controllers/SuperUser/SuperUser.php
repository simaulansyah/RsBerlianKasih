<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperUser extends CI_Controller {
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
        if ($this->session->userdata['role_id'] == "SU")
        {
            $data['title'] = "Super User";
            $data['totalKasur'] = $this->modelRuangan->getRowKasur();
            $data['statusKasurisi'] = $this->modelRuangan->getStatusKasurisi(); 
            $data['statusKasurKosong'] = $this->modelRuangan->getStatusKasurKosong(); 
            $data['totalAsset'] = $this->modelAsset->getRowAsset();
            $data['jumlahAsset'] = $this->modelAsset->getJumlahAsset();
            $data['jumlahPegawai'] = $this->modelPegawai->getRowPegawai();
            $data['jumlahDokter'] = $this->modelDokter->getRowDokter();


            $data['namauser'] = $this->modelUser->getNamaUser($this->session->userdata['user_id']);
            $data['link'] = $this->modelUser->getNamaJabatan($this->session->userdata['role_id']);
            $data['linkDashboard'] = str_replace(' ', '', $data['link'].'/'.$data['link']);
            // <?php echo str_replace(' ', '', $data['linkDashboard']); 
            $this->load->view("templates/light_header", $data);
            $this->load->view("templates/light_sidebar", $data);
            $this->load->view("superuser/super", $data);
            $this->load->view("templates/light_footer", $data);
        } else
        {
            var_dump($this->session->userdata['role_id']);
            die;
            redirect("auth");
        }
       
    }
    

}