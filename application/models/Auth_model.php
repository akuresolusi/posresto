<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model{
    
    function __construct() {
    
    }

    function cek_login($email, $password, $table){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit('1');
        return $this->db->get($table)->row_array();
    }

    function cek_email($email){
        $this->db->where('email', $email);
        $this->db->where('status', "1");
        return $this->db->get('users')->result_array();
    }

    function cek_status_email($email, $table){
        $this->db->where('email', $email);
        $this->db->where('status', "1");
        return $this->db->get($table)->row_array();
    }

    function daftar_user($data){
        $datanya = array(
                        'email' => $data['email'],
                        'password' => $data['password'],
                        'phone' => $data['phone'],
                        'name' => $data['name'],
                        'modified' => date('Y-m-d H:i:s'),
                        'status' => '1'
                );
        $this->db->insert('users', $datanya);
        return $this->db->insert_id();
    }

    function daftar_outlet($data, $iduser){
        $datanya = array(
                        'outlet' => $data['outlet'],
                        'address' => $data['address'],
                        'iduser' => $iduser,
                        'status' => '1'
                );
        $this->db->insert('outlet', $datanya);
    }

    function get_outlet($iduser){
        $this->db->where('iduser', $iduser);
        $this->db->where('status', "1");
        $this->db->order_by('id','desc');
        return $this->db->get('outlet')->result_array();
    }

    function get_detail_outlet($id){
        $this->db->where('id', $id);
        $this->db->where('status', "1");
        return $this->db->get('outlet')->row_array();
    }

    function update_password($email, $password, $table){
        $data = array('password' => $password);
        $this->db->where('email', $email);
        $this->db->update($table, $data);
        return;
    }

 
}