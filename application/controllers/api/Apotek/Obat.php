<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Obat extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();


        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->load->model('Apotek_model', 'model');
        //$this->load->model('Ruangan_model', 'ruangan');
    }

    public function index_get()
    {

        $data = $this->model->getSuplier();
        //get parameter
        $id = $this->get('id');
        if ($id === null)
        {
            // Set the response and exit
            $this->response([
                'status' => true,
                'data' => $data
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }

    }

    public function index_post()
    {

        $arr = json_decode(file_get_contents("php://input"));
       if ($arr == NULL) {
                //proses client mobile
        $data = array(
            'id_suplier'    => $this->input->post('id_suplier'),
            'nama_suplier'  => $this->input->post('nama_suplier'),
            'alamat_suplier'=> $this->input->post('alamat_suplier'),
            'telepon_suplier'=> $this->input->post('telepon_suplier')
        );

        if ($this->model->setSuplier($data) > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'data sudah masuk',
                'data' => $data
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'data gagal masuk',
                'data' => $data
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
       
    } else 
    {
        //proses client web
        $arr = json_decode(file_get_contents("php://input")); 
       
        if (empty($arr->id_suplier) OR empty($arr->nama_suplier)){
            echo "Submit gagal! Kolom barang / stok tidak boleh kosong.";
        } else {
            echo "Submit berhasil! Stok barang dengan nama <b>".$arr->id_suplier."</b> ditambah sebanyak <b>".$arr->nama_suplier."</b>.";
            $this->model->setSuplier($arr);
        }
        
    }

}

    public function index_delete()
    {
        $arr = json_decode(file_get_contents("php://input"));
        if ($arr == NULL)
        {
            $id = $this->delete('id_suplier');
            if ($id === null)
            {
                $this->response([
                    'status' => true,
                    'message' => 'id tidak ada'
                ], REST_Controller::HTTP_OK);

            } else 
            {
                if ($this->model->delSuplier($id) > 0)
                {
                    $this->response([
                        'status' => true,
                        'message' => 'berhasil di hapus'
                    ], REST_Controller::HTTP_OK);

                }
                else 
                {
                    $this->response([
                        'status' => true,
                        'message' => 'gagal di hapus'
                    ], REST_Controller::HTTP_OK);

                }
          
            }
            
        }
        else 
        {

        $this->model->delSuplier($arr);
        $this->response([
            'status' => true,
            'message' => 'data berhasil di hapus'
        ], REST_Controller::HTTP_OK);

        }
    }
    public function index_put()
    {
        $arr = json_decode(file_get_contents("php://input"));
        var_dump($arr);
        die;

    }
}