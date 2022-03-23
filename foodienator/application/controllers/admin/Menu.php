<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Phiên đăng nhập đã hết hạn!');
            redirect(base_url().'admin/login/index');
        }
        $this->load->helper('url');
    }

    public function index() {
        $this->load->model('Menu_model');
        $dishesh = $this->Menu_model->getMenu();
        $data['dishesh'] = $dishesh;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/menu/list', $data);
        $this->load->view('admin/partials/footer');
    }

    public function create_menu(){

        $this->load->helper('common_helper');
        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();

        $config['upload_path']          = './public/uploads/dishesh/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('tensanpham', 'Tên sản phẩm','trim|required');
        $this->form_validation->set_rules('thongtinsanpham', 'Thông tin sản phẩm','trim|required');
        $this->form_validation->set_rules('giatien', 'Giá tiền','trim|required');
        $this->form_validation->set_rules('tenloaisanpham', 'Tên loại sản phẩm','trim|required');


        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){
                //image is selected
                if($this->upload->do_upload('image')) {
                    //file uploaded suceessfully
                    $data = $this->upload->data();
                    //resizing image
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'front_thumb/'.$data['file_name'], 1120,270);


                    $formArray['anh'] = $data['file_name'];
                    $formArray['tensp'] = $this->input->post('tensanpham');
                    $formArray['thongtinsp'] = $this->input->post('thongtinsanpham');
                    $formArray['giatien'] = $this->input->post('giatien');
                    $formArray['maloai'] = $this->input->post('tenloaisanpham');
        
                    $this->Menu_model->create($formArray);
        
                    $this->session->set_flashdata('dish_success', 'Thêm sản phẩm thành công');
                    redirect(base_url(). 'admin/menu/index');

                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error; 
                    $data['stores']= $store;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/menu/add_menu', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {
                //if no image is selcted we will add res data without image
                $formArray['tensp'] = $this->input->post('tensanpham');
                $formArray['thongtinsp'] = $this->input->post('thongtinsanpham');
                $formArray['giatien'] = $this->input->post('giatien');
                $formArray['maloai'] = $this->input->post('tenloaisanpham');
    
                $this->Menu_model->create($formArray);
                
                $this->session->set_flashdata('dish_success', 'Thêm sản phẩm thành công !');
                redirect(base_url(). 'admin/menu/index');
            }

        } else {
            $store_data['stores']= $store;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/menu/add_menu', $store_data);
            $this->load->view('admin/partials/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('Menu_model');
        $dish = $this->Menu_model->getSingleDish($id);

        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();
        
        if(empty($dish)) {

            $this->session->set_flashdata('error', 'Không có sản phẩm !');
            redirect(base_url(). 'admin/menu/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/dishesh/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('tensanpham', 'Tên sản phẩm','trim|required');
        $this->form_validation->set_rules('thongtinsanpham', 'Thông tin sản phẩm','trim|required');
        $this->form_validation->set_rules('giatien', 'Giá tiền','trim|required');
        $this->form_validation->set_rules('tenloaisanpham', 'Tên loại sản phẩm','trim|required');

        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){
                //image is selected
                if($this->upload->do_upload('image')) {
                    //file uploaded suceessfully
                    $data = $this->upload->data();
                    //resizing image
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);

                    $formArray['anh'] = $data['file_name'];
                    $formArray['tensp'] = $this->input->post('tensanpham');
                    $formArray['thongtinsp'] = $this->input->post('thongtinsanpham');
                    $formArray['giatien'] = $this->input->post('giatien');
                    $formArray['maloai'] = $this->input->post('tenloaisanpham');
        
                    $this->Menu_model->update($id, $formArray);

                    //deleting existing images

                    if (file_exists('./public/uploads/dishesh/'.$dish['anh'])) {
                        unlink('./public/uploads/dishesh/'.$dish['anh']);
                    }

                    if(file_exists('./public/uploads/dishesh/thumb/'.$dish['anh'])) {
                        unlink('./public/uploads/dishesh/thumb/'.$dish['anh']);
                    }
        
                    $this->session->set_flashdata('dish_success', 'Dish updated successfully');
                    redirect(base_url(). 'admin/menu/index');

                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['dish'] = $dish;
                    $data['stores'] = $store;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/menu/edit', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {
                //if no image is selcted we will add res data without image
                $formArray['tensp'] = $this->input->post('tensanpham');
                $formArray['thongtinsp'] = $this->input->post('thongtinsanpham');
                $formArray['giatien'] = $this->input->post('giatien');
                $formArray['maloai'] = $this->input->post('tenloaisanpham');
    
                $this->Menu_model->update($id, $formArray);
    
                $this->session->set_flashdata('dish_success', 'Sản phẩm cập nhật thành công');
                redirect(base_url(). 'admin/menu/index');
            }

        } else {
            $data['dish'] = $dish;
            $data['stores'] = $store;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/menu/edit', $data);
            $this->load->view('admin/partials/footer');

        }

    }
    public function delete($id){

        $this->load->model('Menu_model');
        $dish = $this->Menu_model->getSingleDish($id);

        if(empty($dish)) {
            $this->session->set_flashdata('error', 'dish not found');
            redirect(base_url().'admin/menu');
        }

        if (file_exists('./public/uploads/dishesh/'.$dish['anh'])) {
            unlink('./public/uploads/dishesh/'.$dish['anh']);
        }

        if(file_exists('./public/uploads/dishesh/thumb/'.$dish['anh'])) {
            unlink('./public/uploads/dishesh/thumb/'.$dish['anh']);
        }

        $this->Menu_model->delete($id);

        $this->session->set_flashdata('dish_success', 'dish deleted successfully');
        redirect(base_url().'admin/menu/index');

    }
}