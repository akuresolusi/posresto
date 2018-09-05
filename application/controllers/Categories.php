<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function index(){
		$data['content'] = "categories/page-categories";
		$data['title'] = 'Categories Item';
		$this->load->view('layout',$data);
	}
}
