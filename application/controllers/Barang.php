<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index(){
		$data['content'] = "barang/page-barang";
		$data['title'] = 'Item Library';
		$this->load->view('layout',$data);
	}

	public function add(){
		$data['content'] = "barang/input-barang";
		$data['title'] = 'Add Item Library';
		$this->load->view('layout',$data);
		// echo "ayam";
	}
	
}