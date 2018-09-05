<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function index(){
		$data['content'] = "inventory/page-item";
		$data['title'] = 'Item Library';
		$this->load->view('layout',$data);
	}

	public function add(){
		$data['content'] = "inventory/input-item";
		$data['title'] = 'Add Item Library';
		$this->load->view('layout',$data);
	}
	
}