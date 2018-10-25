<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function __construct() {
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
        $this->load->model('item_model');
        $this->load->library('upload');    
    }

	public function index(){
        $data['list']      = $this->item_model->get_all();
        $data['content']   = "inventory/page-item";
		$data['title']     = 'Products';
        $this->load->view('layout',$data);
	}

	public function add(){
        $this->form_validation->set_rules('name','Item Name', 'required');
        $this->form_validation->set_rules('price','Price', 'required');
        $this->form_validation->set_rules('categori','Categori', 'required');
        
        $data['categori']   = $this->category_model->get_all_category();
        $data['content']    = "inventory/input-item";
        $data['title']      = 'Products';
        $ss                 = $this->session->userdata();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout',$data);

        }else{

            if(!empty($_FILES["gambar"]['name'])){
                //upload image
                $file_name = $this->upload_image('gambar', $ss['iduser']);
                
                //jika upload error
                if($file_name ==  false){
                    $this->session->set_flashdata('pesan','File Image Error');
                    $this->load->view('layout',$data);
                    $stop = true ;
                }
            }

            if($stop != true){
                $data = array(  'name'      => $this->input->post('name'),
                                'idcategori'=> $this->input->post('categori'),
                                'desc'      => $this->input->post('desc'),
                                'price'     => $this->input->post('price'),
                                'iduser'    => $ss['iduser'],
                                'idoutlet'  => $ss['idoutlet']
                             );
                //insert item
                $iditem = $this->item_model->add($data);

                //simpan image ke database jika tidak kosong
                if(!empty($file_name)){
                    //insert image
                    $dataimage = array('iditem' => $iditem, 'image'=> $file_name );
                    $this->item_model->add_image($dataimage);
                }

                $variant_name = $this->input->post('variantname');
                $variant_price = $this->input->post('variantprice');
                for ($i=0; $i < count($variant_name); $i++) { 
                    if(!empty($variant_name[$i]) || !empty($variant_price[$i])){
                        $datavariant = array(   'name'      => $variant_name[$i],
                                                'idcategori'=> $this->input->post('categori'),
                                                'price'     => $variant_price[$i],
                                                'iduser'    => $ss['iduser'],
                                                'idoutlet'  => $ss['idoutlet'],
                                                'idvariant' => $iditem 
                                            );
                        $this->item_model->add($datavariant);                    
                    }
                }            

                redirect('item');
            }
        }
	}

    public function upload_image($name, $iduser){

        $config['upload_path']          = 'assets/gambar/'.$iduser;
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 100;
        $file_name                      = mt_rand()."-".$_FILES["gambar"]['name'];
        $config['file_name']            = $file_name;
        $this->upload->initialize($config);

        if (!is_dir('assets/gambar/'.$iduser)){
            mkdir('assets/gambar/'.$iduser, 0777, TRUE);
        }

        if(!$this->upload->do_upload('gambar')){
            return false;
        }else{
            return $file_name;
        }

    }

    public function json_detail_item(){
        $id = $this->input->get('id');
        $iditem = $this->input->post_get($id);
        $data = $this->item_model->get_detail($id);
        $data_images = $this->item_model->get_image($id);
        $data_variant = $this->item_model->get_variant($id);
        array_push($data, $data_variant);
        array_push($data, $data_images);
        echo json_encode($data);

        // [item][value] untuk item
        // [item][0][value] untuk variant item
        // [item][1][0][value] untuk image
    }


	
}