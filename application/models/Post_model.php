<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    public function getAll($id) {
        $this->db->select('cat.id_category, cat.category_name, cat.DESCRIPTION,
        post.subject, post.date_created, post.preview_content, post.content, post.id_content,
        user.first_name, user.last_name');
        $this->db->from('category_master as cat');
        $this->db->join('content_post as post', 'post.id_category = cat.id_category','left');
        $this->db->join('user_master as user', 'user.id_user = post.id_user','left');
        $this->db->where('cat.id_category', $id);
        $data = $this->db->get()->result_array();
        
        return $data;
    }

    public function getDetail($id) {
        $this->db->select('cat.id_category, cat.category_name, cat.DESCRIPTION,
        post.subject, post.date_created, post.preview_content, post.content, post.id_content,
        user.first_name, user.last_name');
        $this->db->from('category_master as cat');
        $this->db->join('content_post as post', 'post.id_category = cat.id_category','left');
        $this->db->join('user_master as user', 'user.id_user = post.id_user','left');
        $this->db->where('post.id_content', $id);
        $data = $this->db->get()->result_array();
        
        return $data;
    }

}

/* End of file Post_model.php */
