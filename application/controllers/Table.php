<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//Cek data session user
        $ss = $this->session->userdata();
        if(empty($ss['iduser'])){
            $this->session->sess_destroy();
            redirect('login');
        }else{
            if(empty($ss['idoutlet'])){
                echo "Session Outlet Kosong";
            }
        }

		$this->load->model('table_model');
	}

	public function index(){
		$data['data']		= $this->table_model->get_table();
		$data['content'] 	= "table/page-table";
		$data['title'] 		= 'Table';
		$this->load->view('layout',$data);
	}

	public function ajax_detail(){
		$id = $this->encrypt->decode($this->input->post('id'));
		$data = $this->table_model->get_detail_table($id);
        $data['id'] = $this->encrypt->encode($data['id']);
		echo json_encode($data);
	}

	public function ajax_add(){
		$this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){
        	echo json_encode(array('status' => 'gagal', 'pesan' => strip_tags(validation_errors())));
        }else{
        	$idoutlet = $this->session->userdata()['idoutlet'];
        	$data = array(
        			'name'		=> $this->input->post('name'),
        			'status'	=> 1,
        			'idoutlet'	=> $idoutlet
        	);

           	$id = $this->table_model->add_table($data);
 	      	echo json_encode(array('status' => 'sukses', 'id'=>$id));

        }
	}


    public function ajax_update(){
		$this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){
        	echo json_encode(array('status' => 'gagal', 'pesan' => strip_tags(validation_errors())));
        }else{
        	
        	$data = array(
        			'name'		=> $this->input->post('name')
        	);
        	$id = $this->encrypt->decode($this->input->post('id'));
           	$this->table_model->update_table($data, $id);
 	      	echo json_encode(array('status' => 'sukses'));
        }
	}

	public function ajax_delete_table(){
		$id 	= $this->encrypt->decode($this->input->post('id'));
		$data 	= array('status'=>'0');
		$proses = $this->table_model->update_table($data, $id);
		echo json_encode(array('status' => 'sukses'));					
	}


	
}
