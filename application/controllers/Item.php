<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function __construct() {
        parent::__construct();	
        $this->load->model('auth_model');
    }

	public function index(){
		$data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->auth_model->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $data['content'] = "inventory/page-item";
			$data['title'] = 'Item Library';
            $this->load->view('layout',$data);
        }else{
            redirect('auth/login');
        }
	}

	public function add(){
		$data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->auth_model->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $data['content'] = "inventory/input-item";
		$data['title'] = 'Add Item Library';
            $this->load->view('layout',$data);
        }else{
            redirect('auth/login');
        }
	}
	
}