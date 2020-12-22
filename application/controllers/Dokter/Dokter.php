<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Dokter_model', 'model');
        $this->load->model('Pegawai_model', 'model_pegawai');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('file','date');    

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
			$data['title'] = "Data Dokter";
            $data['dokter'] = $this->model->getDokter();
            $data['spesialisasi'] = $this->model->getSpesialisasi();
            $data['gender'] = $this->model_pegawai->getGender();
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("dokter/index", $data);
            $this->load->view("templates/dashboard_footer");  
            
        }
       
    }
    public function tambahDokter()
    {


        $this->form_validation->set_rules('id_dokter','ID Dokter','required|is_unique[dokter.id_dokter]');
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required');
        $this->form_validation->set_rules('lokasi_praktek', 'Lokasi Praktek', 'required');
        $this->form_validation->set_rules('jam_praktek', 'Jam Praktek', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Data Dokter";
            $data['dokter'] = $this->model->getDokter();
            $data['spesialisasi'] = $this->model->getSpesialisasi();
            $data['gender'] = $this->model_pegawai->getGender();
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("dokter/index", $data);
            $this->load->view("templates/dashboard_footer");  

        } else 
        {
            $poto = $_FILES['image']['name'];
            if(empty($_POST['image']['name'])){
                $poto = "defaultdokter.jpg"; // default value
            }else{
                $poto = $_FILES['image']['name']; 
            }
            if ($poto)
            {
                $config['upload_path'] = './upload/profil/Dokter/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '100';
                $config['max_width'] = '10000';
                $config['max_height'] = '10000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image'))
                {

                    //$error = array('error' => $this->upload->display_errors());
                    //$this->load->view('upload_form', $error);
                    $error =$this->upload->display_errors();
                    function phpAlert($msg) {
                        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
                    }
                    phpAlert($error);

                }else
                {
                    $poto = $this->upload->data('file_name');
                }
            }
           
            $data = [ 
                  'id_dokter' => $this->input->post('id_dokter'),
                  'nama_dokter' => $this->input->post('nama_dokter'),
                  'alamat' => $this->input->post('alamat'),
                  'tanggal_lahir' => $this->input->post('tgl'),
                  'jenis_kelamin' => $this->input->post('gender'),
                  'telepon' => $this->input->post('telepon'),
                  'spesialisasi' => $this->input->post('spesialisasi'),
                  'lokasi_praktek' => $this->input->post('lokasi_praktek'),
                  'jam_praktek' => $this->input->post('jam_praktek'),
                  'foto' => $poto
              ];
              $this->model->setDokter($data);
              $error = $this->db->error();
              if ($error['code'] != 0 )
              {
                  var_dump($error);
                 // die;
                  
                  $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$error['message'].'</div>');
                  redirect('Dokter/Dokter/index');
      
              } else
              { 
                   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Aset</div>');
                  redirect('Dokter/Dokter/index');
      
              }

        }

    }

    public function delDokter($data,$image)
    {
        if($image != "defaultdokter.jpg")
        {
            unlink(FCPATH.'upload/profil/Dokter/'.$image);
        }

        $this->model->delDokter($data);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {    
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$error['message'].'</div>');
            redirect('Dokter/Dokter/index');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Dokter</div>');
            redirect('Dokter/Dokter/index');

        }

    }

    public function editDokter()
    {
        $oldid = $this->input->post('oldid');

        if($this->input->post('id_dokter') != $oldid) {
            $is_unique =  '|is_unique[dokter.id_dokter]';
         } else {
            $is_unique =  '' ;
         }
         
         $this->form_validation->set_rules('id_dokter','ID DOKTER','required'.$is_unique);
         $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required');
         $this->form_validation->set_rules('alamat', 'Alamat', 'required');
         $this->form_validation->set_rules('telepon', 'Telepon', 'required');
         $this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
         $this->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required');
         $this->form_validation->set_rules('lokasi_praktek', 'Lokasi Praktek', 'required');
         $this->form_validation->set_rules('jam_praktek', 'Jam Praktek', 'required');

if ($this->form_validation->run() == FALSE){

    $data['title'] = "Data Dokter";
    $data['dokter'] = $this->model->getDokter();
    $data['spesialisasi'] = $this->model->getSpesialisasi();
    $data['gender'] = $this->model_pegawai->getGender();
    $this->load->view("templates/dashboard_header");
    $this->load->view("templates/dashboard_sidebar", $data);
    $this->load->view("templates/dashboard_topbar", $data);
    $this->load->view("dokter/index", $data);
    $this->load->view("templates/dashboard_footer");  

    } else
    {
        $poto = $_FILES['image']['name'];

        if ($poto)
        {
            $config['upload_path'] = './upload/profil/Dokter';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '100';
            $config['max_width'] = '10000';
            $config['max_height'] = '10000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image'))
            {

               // $error = array('error' => $this->upload->display_errors());
               // $this->load->view('upload_form', $error);
                echo $this->upload->display_errors();
                die;
                echo '<script>alert("Username yang Anda masukan salah.");window.location.href="' . base_url('pegawai') . '";</script>';
               
            }else
            {
                $old_image = $this->input->post('old');
                if($old_image != "defaultdokter.jpg")
                {
                    unlink(FCPATH.'upload/profil/Dokter/'.$old_image);
                }
        
                $poto = $this->upload->data('file_name');
                
            }

        $data = [ 
            'id_dokter' => $this->input->post('id_dokter'),
            'nama_dokter' => $this->input->post('nama_dokter'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_lahir' => $this->input->post('tgl'),
            'jenis_kelamin' => $this->input->post('gender'),
            'telepon' => $this->input->post('telepon'),
            'spesialisasi' => $this->input->post('spesialisasi'),
            'lokasi_praktek' => $this->input->post('lokasi_praktek'),
            'jam_praktek' => $this->input->post('jam_praktek'),
            'foto' => $poto
        ];
        //jika foto ada
        $this->model->updateDokter($data,$oldid);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Edit data Dokter </div>');
        redirect('Dokter/Dokter/index');

       

    } else 
    {
        //jika foto tidak ada
        $data = [ 
            'id_dokter' => $this->input->post('id_dokter'),
            'nama_dokter' => $this->input->post('nama_dokter'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_lahir' => $this->input->post('tgl'),
            'jenis_kelamin' => $this->input->post('gender'),
            'telepon' => $this->input->post('telepon'),
            'spesialisasi' => $this->input->post('spesialisasi'),
            'lokasi_praktek' => $this->input->post('lokasi_praktek'),
            'jam_praktek' => $this->input->post('jam_praktek'),
            
        ];
        $this->model->updateDokter($data,$oldid);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Edit data Dokter </div>');
        redirect('Dokter/Dokter/index');
        
    }

    }
}
}
