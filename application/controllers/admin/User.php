<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Phiên đăng nhập đã hết hạn!');
            redirect(base_url().'admin/login/index');
        }
    }

    public function index() {
        $this->load->model('User_model');
        $users = $this->User_model->getUsers();
        $data['users'] = $users;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/user/list', $data);
        $this->load->view('admin/partials/footer');
    }
    public function create_user() {

        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('tendangnhap', 'Tên đăng nhập','trim|required');
        $this->form_validation->set_rules('hovatendem', 'Họ và tên đệm','trim|required');
        $this->form_validation->set_rules('ten', 'Tên chính','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('matkhau', 'Mật khẩu','trim|required');
        $this->form_validation->set_rules('sdt', 'Số điện thoại','trim|required');
        $this->form_validation->set_rules('diachi', 'Địa chỉ','trim|required');

        if($this->form_validation->run() == true) {

            $formArray['tendangnhap'] = $this->input->post('tendangnhap');
            $formArray['ho_tendem'] = $this->input->post('hovatendem');
            $formArray['tenchinh'] = $this->input->post('ten');
            $formArray['email'] = $this->input->post('email');
            $formArray['matkhau'] = password_hash($this->input->post('matkhau'), PASSWORD_DEFAULT);
            $formArray['sdt'] = $this->input->post('sdt');
            $formArray['diachi'] = $this->input->post('diachi');


            $this->User_model->create($formArray);

            $this->session->set_flashdata('success', 'User added successfully');
            redirect(base_url(). 'admin/user/index');


        } else {
            $this->load->view('admin/partials/header');
            $this->load->view('admin/user/add_user');
            $this->load->view('admin/partials/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($id);

        if(empty($user)) {
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url().'admin/user/index');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('tendangnhap', 'Tên đăng nhập','trim|required');
        $this->form_validation->set_rules('hovatendem', 'Họ và tên đệm','trim|required');
        $this->form_validation->set_rules('ten', 'Tên chính','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('matkhau', 'Mật khẩu','trim|required');
        $this->form_validation->set_rules('sdt', 'Số điện thoại','trim|required');
        $this->form_validation->set_rules('diachi', 'Địa chỉ','trim|required');

        if($this->form_validation->run() == true) { 

            $formArray['tendangnhap'] = $this->input->post('tendangnhap');
            $formArray['ho_tendem'] = $this->input->post('hovatendem');
            $formArray['tenchinh'] = $this->input->post('ten');
            $formArray['email'] = $this->input->post('email');
            $formArray['matkhau'] = password_hash($this->input->post('matkhau'), PASSWORD_DEFAULT);
            $formArray['sdt'] = $this->input->post('sdt');
            $formArray['diachi'] = $this->input->post('diachi');


            $this->User_model->update($id,$formArray);

            $this->session->set_flashdata('success', 'Cập nhật người dùng thành công');
            redirect(base_url(). 'admin/user/index');


        } else {
            $data['user'] = $user;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/user/edit', $data);
            $this->load->view('admin/partials/footer');
        }
    }

    public function delete($id) {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($id);

        if(empty($user)) {
            $this->session->set_flashdata('error', 'Không có người dùng nào!');
            redirect(base_url().'admin/user/index');
        }

        $this->User_model->delete($id);

        $this->session->set_flashdata('success', 'Xóa người dùng thành công!');
        redirect(base_url().'admin/user/index');

    }

}