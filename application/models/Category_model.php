<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function getAll() {
        $data = $this->db->get("category_master")->result_array();
        return $data;
    }

    public function findById($id) {
        $data = $this->db->get("category_master", array("id => $id"))->result_array();
        return $data;
    }

}

/* End of file Category_model.php */