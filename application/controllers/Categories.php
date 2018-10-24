<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

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

		$this->load->model('category_model');
	}

	public function index(){
            $data['categories']=$this->category_model->get_all_category();
            $data['content'] = "categories/page-categories";
			$data['title'] = 'Categories';
            $this->load->view('layout',$data);
	}

	public function add(){
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('categories_name','Categories Name', 'required');
		if ($this->form_validation->run() == FALSE) {
		    echo validation_errors();
		}else{
		  	$data = array(
			'id' => $this->input->post('id'),
			'idoutlet' => $this->session->userdata('idoutlet'),
			'categori' => $this->input->post('categories_name')
			);
			$insert = $this->category_model->add($data);
			echo json_encode(array("status" => TRUE));
		}
		
	}

	public function ajax_edit($id){

		$data = $this->category_model->get_by_id($id);
		echo json_encode($data);
	}

	public function update(){
		$data = array(
			'id' => $this->input->post('id'),
			'categori' => $this->input->post('categories_name'),
		);
		$this->category_model->update_data(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	
	}

	public function delete_by_id($id){
		$this->category_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	
	}
}
