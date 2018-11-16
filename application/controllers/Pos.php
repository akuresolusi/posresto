<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {

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
        
        $this->load->model('category_model');
        $this->load->model('item_model');
        $this->load->model('pos_model');  
    }

	public function index(){
		$data['isi'] 			= "pos/pointofsale";
		$data['title'] 			= 'Point Of Sale';
		$data['list_categori']	= $this->category_model->get_all_category();
		$data['data']			= json_encode($this->pos_model->get_items());

		$this->load->view('page-pos',$data);
	}

}
