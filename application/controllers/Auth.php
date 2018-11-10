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
        $this->form_validation->set_rules('type','Account type','required');
        
        if($this->form_validation->run() === TRUE){
            $email      = $this->input->post('email');
            $password   = md5($this->input->post('password'));

            $type       = $this->input->post('type');
            if($type == "o"){
                $cek = $this->auth_model->cek_login($email, $password, "users");    
            }else{
                $cek = $this->auth_model->cek_login($email, $password, "employee");
            }
            
            if(!empty($cek) >= 1){
                if($type == "o"){
                    $outlet = $this->auth_model->get_outlet($cek['id']);
                    $userdata = array(  'iduser'    => $cek['id'],
                                        'idemployee'=> '0',
                                        'name'      => $cek['name'],
                                        'email'     => $cek['email'],
                                        'type'      => $type,
                                        'idoutlet'  => $outlet[0]['id'],
                                        'outlet'    => $outlet[0]['outlet'],
                                        'address'   => $outlet[0]['address'],
                                        'list_outlet' => $outlet
                                );
                }else{
                    $outlet = $this->auth_model->get_detail_outlet($cek['idoutlet']);
                    $userdata = array(  'iduser'    => '',
                                        'idemployee'=> $cek['id'],
                                        'name'      => $cek['name'],
                                        'email'     => $cek['email'],
                                        'type'      => $type,
                                        'idoutlet'  => $outlet['id'],
                                        'outlet'    => $outlet['outlet'],
                                        'address'   => $outlet['address'],
                                );

                }
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


    public function reset(){

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if($this->form_validation->run() === FALSE){
            echo json_encode(array('status' => 'gagal', 'pesan' => "Masukan email dan jenis akun kamu terlebih dahulu"));
        }else{

            $email  = $this->input->post('email');
            $type   = $this->input->post('type');


            if($type == "o"){
                $table = "users";
                $cek = $this->auth_model->cek_status_email($email, $table);
            }else if($type == "e"){
                $table = "employee";
                $cek = $this->auth_model->cek_status_email($email, $table);
            }

            $password = rand(10000,99999);
            if(!empty($cek)){

                $send = $this->send_email_reset($email, $cek['name'], $password);
                
                if($send){
                    $this->auth_model->update_password($email, md5($password), $table);
                    echo json_encode(array('status'=>'sukses'));
                }else{
                    echo json_encode(array('status'=>'gagal','pesan'=>'Password gagal dikirim, lakukan kembali beberapa saat'));
                }

            }else{
                echo json_encode(
                    array('status'=>'gagal','pesan'=>'Email tidak terdaftar, cek kembali email atau jenis akun kamu')
                );
            }
        }

    }
    
    
    public function send_email_reset($to, $name, $password){
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

        $this->email->subject('Akure POS | Reset Password');
        $this->email->message('
            Hi <b>'. $name.'</b> <br/>
            Password akun kamu telah direset<br/>
            Direset pada tanggal '.date('d-M-Y').", Jam ".date('H:i').'<br/>
            Email : <b> '.$to.'</b> <br/>
            Password Baru :<b> '.$password.'</b>
        ');

        if($this->email->send()){
            return true;
        }else{
            return false;
        }

    }

    public function change_outlet($id){
        $outlet = $this->auth_model->get_detail_outlet($id);
        if($outlet['iduser'] == $this->session->userdata('iduser')){
            $data = array(  'idoutlet'  => $outlet['id'],
                                'outlet'    => $outlet['outlet'],
                                'address'   => $outlet['address']
                              );
            $this->session->set_userdata($data);
            redirect('dashboard');
        }else{
            redirect('auth/logout');
        }
    }

}