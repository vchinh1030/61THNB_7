<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Checkout extends CI_Controller {

    function __construct() {
        parent::__construct();

        $user = $this->session->userdata('user');
            if(empty($user)) {
                $this->session->set_flashdata('msg', 'Phiên đăng nhập đã hết hạn');
                redirect(base_url().'login/');
            }
        
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->library('cart');
        $this->load->model('Order_model');
        $this->load->model('User_model');
        $this->controller = 'checkout';
    }

    public function index() {
       $loggedUser = $this->session->userdata('user');
       $u_id = $loggedUser['user_id'];
       $user = $this->User_model->getUser($u_id);

        if($this->cart->total_items() <= 0) {
            redirect(base_url().'restaurant');
        }
            $submit = $this->input->post('placeholder');
            $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
            $this->form_validation->set_rules('diachi', 'Địa chỉ','trim|required');

            if($this->form_validation->run() == true) { 
                $formArray['diachi'] = $this->input->post('diachi');
                
                //insert data into customer table and get last inserted custid
                $this->User_model->update($u_id,$formArray);
                $order = $this->placeOrder($u_id);
                if($order) {
                    $this->session->set_flashdata('success_msg', 'Đơn hàng đã được đặt thành công!');
                       redirect(base_url().'orders');
                } else {
                     $data['error_msg'] = "Order submission failed, please try again.";
                }
            }

        $data['user'] = $user;
        $data['cartItems'] = $this->cart->contents();
        $this->load->view('front/partials/header');
        $this->load->view('front/checkout',$data);
        $this->load->view('front/partials/footer');
    }

    public function placeOrder($u_Id) {  
        $cartItems = $this->cart->contents();
        $i = 0;
        foreach($cartItems as $item) {
            $orderData[$i]['manguoidung'] = $u_Id;
            $orderData[$i]['masp'] = $item['id'];
            $orderData[$i]['maloai'] = $item['r_id'];
            $orderData[$i]['sptrongdon'] = $item['name'];
            $orderData[$i]['soluong'] = $item['qty'];
            $orderData[$i]['giatien'] = $item['subtotal'];
            $orderData[$i]['ngaytao'] = date('Y-m-d H:i:s', now());
            $orderData[$i]['ngaygiaohang'] = date('Y-m-d H:i:s', now());
            $i++;
        }

        if(!empty($orderData)) {                
        $insertOrder = $this->Order_model->insertOrder($orderData);
            if($insertOrder) {
                $this->cart->destroy();
                //return order id
                return $insertOrder;
            }
        }   
    return false;
    }
}