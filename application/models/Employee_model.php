<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Employee_model extends CI_Model {
 
    var $table = 'categories';
     
     
    public function __construct(){
        parent::__construct();

    }
     
    public function get_employee(){
        $this->db->where('status','1');
        $this->db->order_by('id','DESC');
        return $this->db->get('employee')->result_array();
    }

    public function get_detail_employee($id){
        $this->db->where('id', $id);
        return $this->db->get('employee')->row_array();
    }

    public function cek_email_employee($email){
        $this->db->where('email', $email);
        $this->db->where('status', "1");
        return $this->db->get('employee')->result_array();
    }

    public function add_employee($data){
        $this->db->insert('employee', $data);
        return $this->db->insert_id();
    }

    public function update_employee($data, $id){
        $this->db->where('id', $id);
        $this->db->update('employee', $data);
        return;
    }

 
}