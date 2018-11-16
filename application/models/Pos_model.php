<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pos_model extends CI_Model {
 
     
    public function __construct(){
        parent::__construct();

    }

    public function get_items(){
        
        $this->db->select();
        $this->db->join('images', 'items.id=images.iditem', 'inner');
        $this->db->where('items.idoutlet', $this->session->userdata()['idoutlet']);
        $this->db->where('items.idvariant', null);
        // $this->db->where('items.status','1');
        return $this->db->get('items')->result_array();

    }
     
 
}