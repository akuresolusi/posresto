<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
        parent::__construct();

        //Cek data session user
        $ss = $this->session->userdata();
        if(empty($ss['iduser']) && empty($ss['idemployee'])){
            $this->session->sess_destroy();
            redirect('login');
        }else{
            if(empty($ss['idoutlet'])){
                echo "Session Outlet Kosong";
            }
        }

    }

	public function index(){
		$data['content'] = "dashboard";
		$data['title'] = 'Dashboard';
		$this->load->view('layout',$data);
    }
}
