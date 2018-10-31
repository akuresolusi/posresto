<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function index(){
		$data['content'] = "employee/page-employee";
		$data['title'] = 'Employee';
		$this->load->view('layout',$data);
	}
}
