<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
        parent::__construct();	
        $this->load->model('auth_model');
    }

	public function index(){
		$data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->auth_model->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $data['content'] = "dashboard";
			$data['title'] = 'Dashboard';
            $this->load->view('layout',$data);
        }else{
            redirect('auth/login');
        }
	}
}
