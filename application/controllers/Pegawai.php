<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('file');    

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


            $data['jk'] = $this->pegawai->getGender();
            $data['stat'] = $this->pegawai->getStat();
            $data['pegawai'] = $this->pegawai->getpegawai();
            $data['jabatan'] = $this->pegawai->getJabatan();
            $data['queryjabatan'] = $this->pegawai->getJoinJabatan();


            $data['title'] = "Data Pegawai";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("pegawai/index", $data);
            $this->load->view("templates/dashboard_footer");
            
        }
       
    }
    public function tambahpegawai()
    {
        $this->form_validation->set_rules('nip','NIP','required');
        $this->form_validation->set_rules('nama', 'NAMA', 'required');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

        if ($this->form_validation->run()== false)
        {
            $data['pegawai'] = $this->pegawai->getpegawai();
            $data['jabatan'] = $this->pegawai->getJabatan();
            $data['queryjabatan'] = $this->pegawai->getJoinJabatan();
            
            $data['title'] = "Data Pegawai";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("pegawai/index", $data);
            $this->load->view("templates/dashboard_footer");
        }else {


            $nip = $this->input->post('nip');
            $nama_pegawai = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tlahir');
            $tgl_lahir = $this->input->post('tgl');
            $jenis_kelamin = $this->input->post('gender');
            $alamat = $this->input->post('alamat');
            $no_telp = $this->input->post('telepon');
            $tgl_masuk = $this->input->post('tglmasuk');
            $status_pernikahan = $this->input->post('status');
            $jumlah_anak = $this->input->post('anak');
            $id_jabatan = $this->input->post('jabatan');
            //$poto = $_FILES['image']['name'];  //cek gambar
            if(empty($_POST['image']['name'])){
                $poto = "default.jpg"; // default value
            }else{
                $poto = $_FILES['image']['name']; 
            }
            
            if ($poto)
            {
                $config['upload_path'] = './upload/profil/user';
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
                    echo '<script>alert("Username yang Anda masukan salah.");window.location.href="' . base_url('pegawai') . '";</script>';
                   
                }else
                {
                    $poto = $this->upload->data('file_name');
                    
                }
            }

            $data = [
                
                'nip' => $nip,
                'nama_pegawai' => $nama_pegawai,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'tgl_masuk' => $tgl_masuk,
                'status_pernikahan' => $status_pernikahan,
                'jumlah_anak' => $jumlah_anak,
                'id_jabatan' => $id_jabatan,
                'poto' => $poto
            ];
            $this->pegawai->setPegawai($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Insert data karyawan </div>');
            redirect('pegawai');

        }
        
    }

    public function hapusKaryawan($id)
    {
       $this->pegawai->DelPegawai($id);
       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Delete data karyawan </div>');
       redirect('pegawai');

    }

    public function editKaryawan()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama_pegawai = $this->input->post('nama');
        $tempat_lahir = $this->input->post('tlahir');
        $tgl_lahir = $this->input->post('tgl');
        $jenis_kelamin = $this->input->post('gender');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('telepon');
        $tgl_masuk = $this->input->post('tglmasuk');
        $status_pernikahan = $this->input->post('status');
        $jumlah_anak = $this->input->post('anak');
        $id_jabatan = $this->input->post('jabatan');
        $poto = $_FILES['image']['name'];  //cek gambar
      
       
        
        if ($poto)
        {
            $config['upload_path'] = './upload/profil/user';
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
                echo '<script>alert("Username yang Anda masukan salah.");window.location.href="' . base_url('pegawai') . '";</script>';
               
            }else
            {
                $old_image = $this->input->post('old');
                if($old_image != "default.jpg")
                {
                   
                    //unlink(FCPATH . '/upload/profil/user' . $old_image);
                }
        
                $poto = $this->upload->data('file_name');
                
            }
            $data = [
                
                'nip' => $nip,
                'nama_pegawai' => $nama_pegawai,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'tgl_masuk' => $tgl_masuk,
                'status_pernikahan' => $status_pernikahan,
                'jumlah_anak' => $jumlah_anak,
                'id_jabatan' => $id_jabatan,
                'poto' => $poto
            ];
            
            
            $this->pegawai->updatePegawai($data, $id);
            redirect('pegawai');
        }else
        {
           
            $data = [
                
                'nip' => $nip,
                'nama_pegawai' => $nama_pegawai,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'tgl_masuk' => $tgl_masuk,
                'status_pernikahan' => $status_pernikahan,
                'jumlah_anak' => $jumlah_anak,
                'id_jabatan' => $id_jabatan,
                'poto' => $this->input->post('old')
            ];
            
            
            $this->pegawai->updatePegawai($data, $id);
            redirect('pegawai');


        }


    }

}