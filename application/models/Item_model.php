<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Item_model extends CI_Model {
 
    public function __construct(){
        parent::__construct();

    }

    public function get_all(){
        $this->db->select("*");
        $this->db->select("items.id as 'iditem'");
        $this->db->from('items');
        $this->db->join('categories', 'items.idcategori=categories.id', 'inner');
        $this->db->order_by('items.id','desc');
        $this->db->where('items.idvariant', null);
        return $this->db->get()->result_array(); 
    }

    public function add($data){
        $this->db->insert('items',$data);
        return $this->db->insert_id();
    }

    public function add_image($data){
        $this->db->insert('images',$data);
        return;
    }

    public function get_detail($id){
        $this->db->from('items');
        $this->db->join('categories', 'items.idcategori=categories.id', 'inner');
        $this->db->order_by('items.id','desc');
        $this->db->where('items.idvariant', null);
        $this->db->where('items.id', $id);
        return $this->db->get()->row_array();    
    }

    public function get_variant($id){
        $this->db->from('items');
        $this->db->order_by('id','desc');
        $this->db->where('idvariant', $id);
        return $this->db->get()->result_array(); 
    }

    public function get_image($id){
        $this->db->from('images');
        $this->db->order_by('id','desc');
        $this->db->where('iditem', $id);
        return $this->db->get()->result_array();    
    }

 
}