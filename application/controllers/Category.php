<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\Restserver\RestController;
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Category extends RestController {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model', 'cat');
    }

    public function getAll_post() {
        $data = $this->cat->getAll();
        if ($data) {
            // OK (200) being the HTTP response code
            $this->response([
                'status' => TRUE,
                'message' => 'display all data',
                'data' => $data
                ], RestController::HTTP_OK);
        } else {
            // NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => FALSE,
                'message' => 'data not found',
                'data' => $data
                ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function findById_post() {
        $id = $this->post('id');
        $data = $this->cat->findById($id);
        if ($data) {
            // OK (200) being the HTTP response code
            $this->response([
                'status' => TRUE,
                'message' => 'display all data',
                'data' => $data
                ], RestController::HTTP_OK);
        } else {
            // NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => FALSE,
                'message' => 'data not found',
                'data' => $data
                ], RestController::HTTP_NOT_FOUND);
        }
    }

}

/* End of file Category.php */
