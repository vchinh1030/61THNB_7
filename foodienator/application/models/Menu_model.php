<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Menu_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('sanpham', $formArray);
    }

    public function getMenu() {
        $result = $this->db->get('sanpham')->result_array();
        return $result;
    }

    public function getSingleDish($id) {
        $this->db->where('masp', $id);
        $dish = $this->db->get('sanpham')->row_array();
        return $dish;
    }

    public function update($id, $formArray) {
        $this->db->where('masp', $id);
        $this->db->update('sanpham', $formArray);
    } 

    public function delete($id) {
        $this->db->where('masp',$id);
        $this->db->delete('sanpham');
    }

    public function countDish() {
        $query = $this->db->get('sanpham');
        return $query->num_rows();
    }

    public function getDishesh($id) {
        $this->db->where('maloai', $id);
        $dish = $this->db->get('sanpham')->result_array();
        return $dish;
    }
}
