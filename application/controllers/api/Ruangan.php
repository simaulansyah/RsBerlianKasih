<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Ruangan extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();


        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->load->model('Ruangan_model', 'model');
        //$this->load->model('Ruangan_model', 'ruangan');
    }

    public function ruangan_get()
    {

        $data = $this->model->getRuangan();



        //get parameter
        $id = $this->get('id');
        if ($id === null)
        {
            // Set the response and exit
            $this->response([
                'status' => true,
                'data' => $data
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

        }

    }

}