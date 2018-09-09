<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount extends CI_Controller {

	public function index(){
		$data['content'] = "discount/page-discount";
		$data['title'] = 'Discount';
		$this->load->view('layout',$data);
	}
}
