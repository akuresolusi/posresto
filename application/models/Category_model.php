<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Category_model extends CI_Model {
 
    var $table = 'categories';
     
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
     
     
    public function get_all_category()
    {
        $this->db->from('categories');
        $query=$this->db->get();
        return $query->result();
    }
     
     
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
     
    return $query->row();
    }
     
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
     
    public function update_data($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
     
    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
 
 
}