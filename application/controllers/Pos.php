<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {

	public function index(){
		$data['isi'] = "pos/pointofsale";
		$data['title'] = 'Point Of Sale';
		$this->load->view('page-pos',$data);
	}
}
