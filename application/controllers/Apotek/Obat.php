<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Apotek_model', 'model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('file','date');    
        $this->load->library('Fcurl');
        //sesion untuk mengamankan ketika di back tidak login lagi
        if (!$this->session->userdata('user_id')) {
			redirect('auth');
        }

    }
	public function index()
	{

    }

    public function Suplier()
    { 
 
        $data['suplier'] = $this->fcurl->urlGet(base_url('/api/Apotek/Obat'));
        $data['title'] = "Data Suplier";
        $this->load->view("templates/dashboard_header");
        $this->load->view("templates/dashboard_sidebar", $data);
        $this->load->view("templates/dashboard_topbar", $data);
        $this->load->view("Apotek/suplier", $data);
        $this->load->view("templates/dashboard_footer");  

    }

    public function tambahSuplier()
    {
        $data = [

            'id_suplier' => $this->input->post('id_suplier'),
            'nama_suplier' => $this->input->post('nama_suplier'),
            'alamat_suplier' => $this->input->post('alamat_suplier'),
            'telepon_suplier' => $this->input->post('telepon_suplier')
        ];

        //$send = $this->curl(base_url('/api/Apotek/Obat'),json_encode($data));
        $send = $this->fcurl->urlSet(base_url('/api/Apotek/Obat'), json_encode($data));
        $this->session->set_flashdata('message', json_encode(array('respon'=>$send),JSON_UNESCAPED_SLASHES));
        redirect('Apotek/Obat/Suplier');
    }



}