<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
    }

	public function login(){  
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        
        if($this->form_validation->run() === TRUE){
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $cek = $this->auth_model->cek_login($email, $password);
            if(!empty($cek) >= 1){
                $outlet = $this->auth_model->get_outlet($cek['id']);
                $userdata = array(  'iduser'    => $cek['id'],
                                'name'      => $cek['name'],
                                'email'     => $cek['email'],
                                'phone'     => $cek['phone'],
                                'idoutlet'  => $outlet['id'],
                                'outlet'    => $outlet['outlet'],
                                'address'   => $outlet['address']
                        );
                $this->session->set_userdata($userdata);
                redirect('dashboard');

            }else{
                $this->session->set_flashdata('pesan','Akun tidak ditemukan');
                $this->load->view('auth/page-login');
            }
        }else{
            $this->load->view('auth/page-login');
        
        }

    }

	// REGISTER
	public function registration(){
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');
        $this->form_validation->set_rules('outlet', 'Outlet Name', 'required');
        $this->form_validation->set_rules('address', 'Outlet Address', 'required');

        if($this->form_validation->run() === TRUE){
            $data = array(  'name' => strip_tags($this->input->post('name')),
                            'email' => strip_tags($this->input->post('email')),
                            'password' => md5($this->input->post('password')),
                            'phone' => strip_tags($this->input->post('phone')),
                            'outlet' => strip_tags($this->input->post('outlet')),
                            'address' => strip_tags($this->input->post('address'))
                    );
            $iduser = $this->auth_model->daftar_user($data);
            $this->auth_model->daftar_outlet($data, $iduser);
            $this->session->set_flashdata('pesan','Pendaftaran Berhasil, Silahkan Login');
            redirect('login');
        }else{
            $this->load->view('auth/page-signup');
        }
    
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

    public function email_check($str){
        $checkEmail = count($this->auth_model->cek_email($str));
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

	// FORGOT PASSWORD
	public function forgot(){
		$data['title'] = 'Forgot Password';
		$this->load->view('auth/page-forgot',$data);
	}
}