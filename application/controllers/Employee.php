<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

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

		$this->load->model('employee_model');
	}

	public function index(){
		$data['data']		= $this->employee_model->get_employee();
		$data['content'] 	= "employee/page-employee";
		$data['title'] 		= 'Employee';
		$this->load->view('layout',$data);
	}

	public function ajax_detail(){
		$id           = $this->encrypt->decode($this->input->post('id'));
		$data         = $this->employee_model->get_detail_employee($id);
        $data['id']   = $this->encrypt->encode($data['id']);
		echo json_encode($data);
	}

	public function ajax_add(){
		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_cek_email_employee');

        if($this->form_validation->run() === FALSE){
        	echo json_encode(array('status' => 'gagal', 'pesan' => strip_tags(validation_errors())));
        }else{
        	$payment = "";
        	if(!empty($this->input->post('payment'))){
        		$payment = 1;
        	}
        	$password = rand(1000,9999);
        	$idoutlet = $this->session->userdata()['idoutlet'];
        	$outlet = $this->session->userdata()['outlet'];
        	$data = array(
        			'email'		=> $this->input->post('email'),
        			'name'		=> $this->input->post('name'),
        			'phone'		=> $this->input->post('phone'),
        			'password'	=> md5($password),
        			'status'	=> 1,
        			'idoutlet'	=> $idoutlet,
        			'a_payment'	=> $payment
        	);
        	$send = $this->send_email_employee($this->input->post('email'), $this->input->post('name'), $outlet, $password);
        	if($send){
               	$id = $this->employee_model->add_employee($data);
	 	      	echo json_encode(array('status' => 'sukses'));
        	}else{
        		echo json_encode(array('status' => 'gagal', 'pesan' => 'Email Gagal dikirim'));
        	}

        }
	}


	public function cek_email_employee($str){
        $checkEmail = count($this->employee_model->cek_email_employee($str));
        if($checkEmail > 0){
            $this->form_validation->set_message('cek_email_employee', 'Email Telah digunakan');
            return FALSE;
        }else{
            return TRUE;
        }
    }


    public function send_email_employee($to, $name, $outlet, $password){
    		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'akurepos@gmail.com',
			'smtp_pass' => 'akurepos123',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('akurepos@gmail.com', 'Akure POS');
        $this->email->to($to); 

        $this->email->subject('Akure POS | Pendaftaran Akun Pegawai');
        $this->email->message('
        	Hi <b>'. $name.'</b> <br/>
        	Email kamu telah berhasil didaftarkan sebagai pegawai pada outlet <b>'.$outlet.'</b><br/>
        	Email : <b> '.$to.'</b> <br/>
        	Password :<b> '.$password.'</b>
        ');

		if($this->email->send()){
			return true;
		}else{
			return false;
		}

    }

    public function reset_employee($to, $name, $password){
    		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'akurepos@gmail.com',
			'smtp_pass' => 'akurepos123',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('akurepos@gmail.com', 'Akure POS');
        $this->email->to($to); 

        $this->email->subject('Akure POS | Reset Akun Pegawai');
        $this->email->message('
        	Hi <b>'. $name.'</b> <br/>
        	Password akun pegawai kamu telah direset<br/>
        	Email : <b> '.$to.'</b> <br/>
        	Password Baru :<b> '.$password.'</b>
        ');

		if($this->email->send()){
			return true;
		}else{
			return false;
		}

    }


    public function ajax_update(){
		$this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){
        	echo json_encode(array('status' => 'gagal', 'pesan' => strip_tags(validation_errors())));
        }else{
        	$payment = "";
        	if(!empty($this->input->post('payment'))){
        		$payment = 1;
        	}
        	$data = array(
        			'name'		=> $this->input->post('name'),
        			'phone'		=> $this->input->post('phone'),
        			'a_payment'	=> $payment
        	);
        	$id = $this->encrypt->decode($this->input->post('id'));
           	$this->employee_model->update_employee($data, $id);
 	      	echo json_encode(array('status' => 'sukses'));

        }
	}

	public function ajax_delete_employee(){
		$id 	= $this->encrypt->decode($this->input->post('id'));
		$data 	= array('status'=>'0');
		$proses = $this->employee_model->update_employee($data, $id);
		echo json_encode(array('status' => 'sukses'));					
	}


	


	
}
