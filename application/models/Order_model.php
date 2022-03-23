<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Order_model extends CI_Model {

    public function getOrders() {
        $this->db->order_by('madon','DESC');
        $result = $this->db->get('donhang')->result_array();
        return $result;
    }

    public function getOrder($id) {
        $this->db->where('madon', $id);
        $result = $this->db->get('donhang')->row_array();
        return $result;
    }

    public function getUserOrder($id) {
        $this->db->where('manguoidung', $id);
        $this->db->order_by('madon','DESC');
        $result = $this->db->get('donhang')->result_array();
        return $result;
    }

    public function update($id, $status) {
        $this->db->where('madon', $id);
        $this->db->update('donhang', $status);
    }

    public function deleteOrder($id) {
        $this->db->where('madon', $id);
        $this->db->delete('donhang');
    }

    public function insertOrder($orderData) {
        $this->db->insert_batch('donhang', $orderData);
        return $this->db->insert_id();
    }

    public function countOrders() {
        $query = $this->db->get('donhang');
        return $query->num_rows();
    }

    public function countPendingOrders() {
        $this->db->where('trangthai', NULL);
        $query = $this->db->get('donhang');
        return $query->num_rows();
    }

    public function countDeliveredOrders() {
        $this->db->where('trangthai','closed');
        $query = $this->db->get('donhang');
        return $query->num_rows();
    }

    public function countRejectedOrders() {
        $this->db->where('trangthai','rejected');
        $query = $this->db->get('donhang');
        return $query->num_rows();
    }

    public function getAllOrders() {
        $this->db->order_by('madon','DESC');
        $this->db->select('madon, sptrongdon, soluong, giatien, trangthai, ngaytao, tendangnhap, diachi');
        $this->db->from('donhang');
        $this->db->join('nguoidung', 'nguoidung.manguoidung = donhang.manguoidung');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getOrderByUser($id) {
        $this->db->select('madon, maloai, masp, nguoidung.manguoidung, sptrongdon, soluong, giatien, trangthai, ho_tendem, tenchinh, donhang.ngaytao, nguoidung.email, nguoidung.sdt,  ngaygiaohang, tendangnhap, diachi');
        $this->db->from('donhang');
        $this->db->join('nguoidung', 'nguoidung.manguoidung = donhang.manguoidung');
        $this->db->where('madon', $id);
        $result = $this->db->get()->row_array();
        return $result;
    }
}