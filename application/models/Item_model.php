<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Item_model extends CI_Model {
 
    public function __construct(){
        parent::__construct();

    }

    public function get_all(){
        $this->db->from('items');
        $this->db->join('categories', 'items.idcategori=categories.id', 'inner');
        $this->db->order_by('items.id','desc');
        $this->db->where('items.idvariant', null);
        return $this->db->get('')->result_array(); 
    }

    public function add($data){
        $this->db->insert('items',$data);
        return $this->db->insert_id();
    }

    public function add_image($data){
        $this->db->insert('images',$data);
        return;
    }

 
}