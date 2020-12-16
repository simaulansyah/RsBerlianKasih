<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Asset_model', 'model');
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
            $data['idasset'] = $this->model->maxID();
            $data['asset'] = $this->model->getAsset();
            $data['kategori'] = $this->model->getKategoriAsset();
            $data['lokasi'] = $this->model->getLokasi();
            $data['title'] = "Data Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/index", $data);
            $this->load->view("templates/dashboard_footer");  
            
        }
       
    }

    public function tambahAsset()
    {

        $this->form_validation->set_rules('kategori','Kategori','required');
        $this->form_validation->set_rules('nama_asset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');

        if ($this->form_validation->run()== false)
        {
            $data['idasset'] = $this->model->maxID();
            $data['asset'] = $this->model->getAsset();
            $data['kategori'] = $this->model->getKategoriAsset();
            $data['lokasi'] = $this->model->getLokasi();
            $data['title'] = "Data Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/index", $data);
            $this->load->view("templates/dashboard_footer");
        } else 
        {

            $poto = $_FILES['image']['name'];
            if ($poto)
            {
                $config['upload_path'] = './upload/Asset/';
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
                    //echo '<script>alert("gagal upload foto");window.location.href="' . base_url('/Asset/Asset/index') . '";</script>';
                }else
                {
                    $poto = $this->upload->data('file_name');
                }
                //jika ada foto


            $data = [ 
                'id_asset' => $this->input->post('id_asset'),  
                'nama_k_asset' => $this->input->post('kategori'),
                'nama_asset' => $this->input->post('nama_asset'),
                'merk' => $this->input->post('merk'),
                'nama_lokasi' => $this->input->post('lokasi'),
                'tahun_perolehan' => $this->input->post('tahun'),
                'harga' => $this->input->post('harga'),
                'foto' => $poto
            ];
           $this->model->setAsset($data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add data Asset </div>');
           redirect("Asset/Asset/index");



            } else // jika tidak ada gunakan default foto
            {


            $data = [ 
                'id_asset' => $this->input->post('id_asset'),  
                'nama_k_asset' => $this->input->post('kategori'),
                'nama_asset' => $this->input->post('nama_asset'),
                'merk' => $this->input->post('merk'),
                'nama_lokasi' => $this->input->post('lokasi'),
                'tahun_perolehan' => $this->input->post('tahun'),
                'harga' => $this->input->post('harga'),
                'foto' => "defaultasset.png"
            ];
           $this->model->setAsset($data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add data Asset </div>');
           redirect("Asset/Asset/index");



            } 



        }

    }

    public function delAsset($data,$image)
    {
        if($image != "defaultasset.png")
        {
        unlink(FCPATH.'upload/Asset/'.$image);
        }
        $this->model->delAset($data);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Aset Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Asset/Asset/index');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Aset</div>');
            redirect('Asset/Asset/index');

        }
       

    }

    public function editAsset()
    {

        $this->form_validation->set_rules('kategori','Kategori','required');
        $this->form_validation->set_rules('nama_asset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('nama_lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('tahun_perolehan', 'Tahun', 'required');
        if ($this->form_validation->run()== false)
        {
            $data['idasset'] = $this->model->maxID();
            $data['asset'] = $this->model->getAsset();
            $data['kategori'] = $this->model->getKategoriAsset();
            $data['lokasi'] = $this->model->getLokasi();
            $data['title'] = "Data Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/index", $data);
            $this->load->view("templates/dashboard_footer");

        } else 
        {
            $oldid = $this->input->post('id_asset');
            $poto = $_FILES['image']['name'];

            if ($poto)
            {
                $config['upload_path'] = './upload/Asset/';
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
                    //echo '<script>alert("gagal upload foto");window.location.href="' . base_url('/Asset/Asset/index') . '";</script>';
                }else
                {
                    $oldpoto = $this->input->post('oldfoto');
                     //unlink(FCPATH.'upload/Asset/'.$oldpoto);

                     if($oldpoto != "defaultasset.png")
                     {
                     unlink(FCPATH.'upload/Asset/'.$oldpoto);
                     }
                  
                   
                    $poto = $this->upload->data('file_name');

                    // jika foto ada

                    $data = [ 
                        'nama_k_asset' => $this->input->post('kategori'),
                        'nama_asset' => $this->input->post('nama_asset'),
                        'merk' => $this->input->post('merk'),
                        'nama_lokasi' => $this->input->post('nama_lokasi'),
                        'tahun_perolehan' => $this->input->post('tahun_perolehan'),
                        'harga' => $this->input->post('harga'),
                        'foto' => $poto
                        
                    ];
                    $this->model->editdtAsset($data, $oldid);
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success edit data Asset </div>');
                    redirect("Asset/Asset/index");
                }
            }

            

            // jika foto tidak ada

            $data = [ 
                'nama_k_asset' => $this->input->post('kategori'),
                'nama_asset' => $this->input->post('nama_asset'),
                'merk' => $this->input->post('merk'),
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'tahun_perolehan' => $this->input->post('tahun_perolehan'),
                'harga' => $this->input->post('harga'),
                
                
            ];

            $this->model->editdtAsset($data, $oldid);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success edit data Asset </div>');
            redirect("Asset/Asset/index");
    


        }

     
    

    }



















    
    public function Kategori()
    {
        if ($this->session->userdata['role_id'] != 1)
        {
            redirect("auth");
        } else
        {
            $data['kategori'] = $this->model->getKategoriAsset();
            $data['title'] = "Kategori Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/kategori", $data);
            $this->load->view("templates/dashboard_footer");  
        }

    }
    public function tambahKategori()
    {
        $this->form_validation->set_rules('id_k_asset','ID','trim|required|is_unique[kategori_asset.id_k_asset]');
        $this->form_validation->set_rules('nama_k_asset', 'Nama Asset ', 'trim|required|is_unique[kategori_asset.nama_k_asset]');

        if ($this->form_validation->run()== false)
        {
            $data['kategori'] = $this->model->getKategoriAsset();
            $data['title'] = "Kategori Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/kategori", $data);
            $this->load->view("templates/dashboard_footer"); 
        }else {


            $data = [
                
                'id_k_asset' => $this->input->post('id_k_asset'),
                'nama_k_asset' => $this->input->post('nama_k_asset'),
                'update_time' => date('Y-m-d')
            ];

            $this->model->setKategori($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add data Kategori Asset </div>');
            redirect("Asset/Asset/Kategori");
    }
  }
  public function delkAsset($data)
  {
        $this->model->delkAsset($data);
        $error = $this->db->error();
        if ($error['code'] != 0 )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Kategori Aset Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
            redirect('Asset/Asset/Kategori');

        } else
        { 
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Kategori ASet</div>');
            redirect('Asset/Asset/Kategori');

        }
  }

  public function EditKategori()
  {
       // cek id asset
       $oldid = $this->input->post('oldid');
       if($this->input->post('id_k_asset') != $oldid) {
           $is_unique =  '|is_unique[kategori_asset.id_k_asset]';
       } else {
          $is_unique =  '' ;
       }
       // cek nama kategori asset
       $oldname = $this->input->post('oldname');
       if($this->input->post('nama_k_asset') != $oldname) {
           $is_uniqueName =  '|is_unique[kategori_asset.nama_k_asset]';
       } else {
        $is_uniqueName =  '' ;
       }
        $this->form_validation->set_rules('id_k_asset','ID','trim|required'.$is_unique);
        $this->form_validation->set_rules('nama_k_asset', 'Nama Asset ', 'trim|required'.$is_uniqueName);

        if ($this->form_validation->run()== false)
        {
            $data['kategori'] = $this->model->getKategoriAsset();
            $data['title'] = "Kategori Asset";
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("Asset/kategori", $data);
            $this->load->view("templates/dashboard_footer"); 
        }else {
            $data = [  
                'id_k_asset' => $this->input->post('id_k_asset'),
                'nama_k_asset' => $this->input->post('nama_k_asset'),
                'update_time' => date('Y-m-d')
            ];

            $this->model->editAsset($data,$oldid);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Mengedit Data Kategori ASet</div>');
            redirect('Asset/Asset/Kategori');

        }

  }


   public function Lokasi()
  {
    $data['lokasi'] = $this->model->getLokasi();
    $data['title'] = "Lokasi Asset";
    $this->load->view("templates/dashboard_header");
    $this->load->view("templates/dashboard_sidebar", $data);
    $this->load->view("templates/dashboard_topbar", $data);
    $this->load->view("Asset/lokasi", $data);
    $this->load->view("templates/dashboard_footer"); 

  }


  public function tambahLokasi()
  {

    $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi ', 'required|is_unique[lokasi.nama_lokasi]');
    
    if ($this->form_validation->run()== false)
    {   
        $data['lokasi'] = $this->model->getLokasi();
        $data['title'] = "Lokasi Asset";
        $this->load->view("templates/dashboard_header");
        $this->load->view("templates/dashboard_sidebar", $data);
        $this->load->view("templates/dashboard_topbar", $data);
        $this->load->view("Asset/lokasi", $data);
        $this->load->view("templates/dashboard_footer"); 
    
    }else {


    $data = [  
        'nama_lokasi' => $this->input->post('nama_lokasi')
    ];
    $this->model->setLokasi($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menambah Data Lokasi </div>');
    redirect('Asset/Asset/Lokasi');
   }

  }

  public function delLokasi($data)
  {
    $this->model->delLokasi($data);
    $error = $this->db->error();
    if ($error['code'] != 0 )
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Lokasi Aset Sudah Terpakai Tidak dapat di hapus // Jika Ingin Di Hapus cari Data yang telah terpakai lalu hapus </div>');
        redirect('Asset/Asset/Lokasi');

    } else
    { 
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menghapus Data Lokasi </div>');
        redirect('Asset/Asset/Lokasi');

    }

  }

  public function EditLokasi()
  {
       // cek id asset
       $oldname = $this->input->post('old_name');
       if($this->input->post('nama_lokasi') != $oldname) {
           $is_unique =  '|is_unique[lokasi.nama_lokasi]';
       } else {
          $is_unique =  '' ;
       }

      $oldid = $this->input->post('id_lokasi');

    $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi ', 'required'.$is_unique);

    if ($this->form_validation->run()== false)
    {   
        $data['lokasi'] = $this->model->getLokasi();
        $data['title'] = "Lokasi Asset";
        $this->load->view("templates/dashboard_header");
        $this->load->view("templates/dashboard_sidebar", $data);
        $this->load->view("templates/dashboard_topbar", $data);
        $this->load->view("Asset/lokasi", $data);
        $this->load->view("templates/dashboard_footer"); 
    
    }else {
    $data = [  
        'nama_lokasi' => $this->input->post('nama_lokasi')
    ];

    $this->model->editLokasi($data, $oldid);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Mengedit Data Lokasi </div>');
    redirect('Asset/Asset/Lokasi');

    
    }
  }

}
