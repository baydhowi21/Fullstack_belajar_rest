<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\Restserver\RestController;
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Post extends RestController {

    function __construct() {
        parent::__construct();
        $this->load->model('post_model', 'content');
    }

    public function getAll_post() {
        $id = $this->post('id'); // id category
        $data = $this->content->getAll($id);
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

    public function getDetail_post() {
        $id = $this->post('id'); // id post
        $data = $this->content->getDetail($id);
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

/* End of file Post.php */
