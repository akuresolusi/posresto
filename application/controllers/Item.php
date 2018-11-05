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
                $file_name = $this->upload_image('gambar', $ss['idoutlet']);
                
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



    public function update($id){
        // $id = $this->encrypt->decode($this->input->get('id'));

        $this->form_validation->set_rules('name','Item Name', 'required');
        $this->form_validation->set_rules('price','Price', 'required');
        $this->form_validation->set_rules('categori','Categori', 'required');

        $ss                 = $this->session->userdata();
        $data['iduser']     = $ss['iduser'];
        $data['data']       = $this->item_model->get_detail($id);
        $data['image']      = $this->item_model->get_image($id)[0];
        $image              = $data['image']['image'];
        $data['variant']    = $this->item_model->get_variant($id);
        $data['categori']   = $this->category_model->get_all_category();
        $data['content']    = "inventory/update-item";
        $data['title']      = 'Products';
        $data['id']         = $id;

        //Validasi Keamanan
        if($data['data']['idoutlet'] != $this->session->userdata()['idoutlet']){
            redirect('auth/logout');
        }


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout',$data);

        }else{

            $stop = false;

            if(!empty($_FILES["gambar"]['name'])){
                //upload image
                $file_name = $this->upload_image('gambar', $ss['idoutlet']);
                
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
                                'price'     => $this->input->post('price')
                             );
                //insert item
                $iditem = $this->item_model->update($data, $id);

                //simpan image ke database jika tidak kosong
                if($file_name != false){
                    //insert image
                    $dataimage = array('image' => $file_name );
                    $this->item_model->update_image($dataimage, $id);

                    //unlink file image
                    $ss = $this->session->userdata();
                    @unlink("assets/gambar/".$ss['idoutlet']."/".$image);
                }


                //tambah variant
                $variant_name = $this->input->post('variantname');
                $variant_price = $this->input->post('variantprice');
                for ($i=0; $i < count($variant_name); $i++){ 
                    if(!empty($variant_name[$i]) || !empty($variant_price[$i])){
                        $datavariant = array(   'name'      => $variant_name[$i],
                                                'idcategori'=> $this->input->post('categori'),
                                                'price'     => $variant_price[$i],
                                                'iduser'    => $ss['iduser'],
                                                'idoutlet'  => $ss['idoutlet'],
                                                'idvariant' => $id 
                                            );
                        $this->item_model->add($datavariant);                    
                    }
                }


                //update variant yang sudah ada
                $update_variant_name    = $this->input->post('update_variantname');
                $update_variant_price   = $this->input->post('update_variantprice');
                $update_variant_id      = $this->input->post('update_variantid');
                for ($i=0; $i < count($update_variant_name); $i++){ 
                    if(!empty($update_variant_name[$i]) || !empty($update_variant_price[$i])){
                        $update_datavariant = array('name'      => $update_variant_name[$i],
                                                    'idcategori'=> $this->input->post('categori'),
                                                    'price'     => $update_variant_price[$i]
                                            );
                        $idvariant          = $update_variant_id[$i];
                        $this->item_model->update($update_datavariant, $idvariant);   
                    }
                }            

                redirect('item');
            }
        }
    }

    public function upload_image($name, $idoutlet){

        $config['upload_path']          = 'assets/gambar/'.$idoutlet;
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1000;
        $file_ext                       = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
        $file_name                      = mt_rand().".". $file_ext;
        $config['file_name']            = $file_name;
        $this->upload->initialize($config);

        if (!is_dir('assets/gambar/'.$idoutlet)){
            mkdir('assets/gambar/'.$idoutlet, 0777, TRUE);
        }

        if(!$this->upload->do_upload('gambar')){
            return false;
        }else{
            return $file_name;
        }

    }

    public function json_detail_item(){
        $id = $this->encrypt->decode($this->input->get('id'));
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


    public function delete_variant($id){
        $data = $this->item_model->cek_transaksi_item($id);
        if(count($data) > 0){
            $status = array('status' => 'false' );
        }else{
            $this->item_model->delete($id);
            $status = array('status' => 'true' );
        }
        echo json_encode($status);

    }

    public function delete_item(){
        $id     = $this->encrypt->decode($this->input->get('id'));
        $ss     = $this->session->userdata();
        $status = "";
        $data   = $this->item_model->get_item_and_variant($id);
        foreach ($data as $value){
            $cek = $this->item_model->cek_transaksi_item($value['id']);
            if(count($cek) > 0){
                $status = "true";
            }
        }
        if($status == "true"){
            echo json_encode(array('status' => 'false' ));
        }else{
            $image = $this->item_model->get_image($id);
            foreach($image as $value) {
                @unlink("assets/gambar/".$ss['iduser']."/".$value['image']);
            }     
            $this->item_model->delete_image($id);
            $this->item_model->delete_item_and_variant($id);
            echo json_encode(array('status' => 'true' ));
        }
       

    }


	
}