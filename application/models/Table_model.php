<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Table_model extends CI_Model {
 
    var $table = 'categories';
     
     
    public function __construct(){
        parent::__construct();

    }
     
    public function get_table(){
        $this->db->where('status','1');
        $this->db->order_by('id','DESC');
        return $this->db->get('table')->result_array();
    }

    public function get_detail_table($id){
        $this->db->where('id', $id);
        return $this->db->get('table')->row_array();
    }


    public function add_table($data){
        $this->db->insert('table', $data);
        return $this->db->insert_id();
    }

    public function update_table($data, $id){
        $this->db->where('id', $id);
        $this->db->update('table', $data);
        return;
    }

 
}