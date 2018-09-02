<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index(){
		$data['title'] = 'Login';
		$this->load->view('auth/page-login',$data);
	}

	public function signup(){
		$data['title'] = 'Sign Up';
		$this->load->view('auth/page-signup',$data);
	}

	public function forgot(){
		$data['title'] = 'Forgot Password';
		$this->load->view('auth/page-forgot',$data);
	}
}
