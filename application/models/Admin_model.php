<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function getByUsername($username) {

        $this->db->where('tendangnhap', $username);
        $admin = $this->db->get('admin')->row_array();
        return $admin;
    }
    
    public function getAllOrders() {
        $this->db->order_by('madon','DESC');
        $this->db->select('madon, sptrongdon, soluong, giatien, trangthai, ngaytao, tendangnhap, diachi');
        $this->db->from('donhang');
        $this->db->join('nguoidung', 'nguoidung.manguoidung = donhang.manguoidung');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getResReport() {
        $this->db->group_by('u.maloai');
        $this->db->select('u.maloai, tenloai, giatien, ngaygiaohang');
        $this->db->select_sum('giatien');
        $this->db->from('donhang as u');
        $this->db->join('loaisanpham as r', 'r.maloai = u.maloai');
        $result = $this->db->get()->result();
        return $result;
    }

    public function dishReport() {
        $query = $this->db->query('SELECT masp, sptrongdon, 
        SUM(soluong) AS qty
        FROM donhang
        GROUP BY masp
        ORDER BY SUM(soluong) DESC');
        return $query->result();
    }

    public function mostOrderdDishes() {
        $sql = 'SELECT u.maloai, r.tenloai, u.giatien, u.sptrongdon, 
        MAX(u.soluong) AS soluong, 
        SUM(giatien) AS total
        FROM donhang AS u
        INNER JOIN loaisanpham as r
        ON u.maloai = r.maloai
        GROUP BY u.maloai';

        $query = $this->db->query($sql);
        return $query->result();
    }
}
