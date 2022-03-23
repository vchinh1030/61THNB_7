<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Store_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('loaisanpham', $formArray);
    }

    public function getStores() {
        $result = $this->db->get('loaisanpham')->result_array();
        return $result;
    }

    public function getStore($id) {
        $this->db->where('maloai', $id);
        $store = $this->db->get('loaisanpham')->row_array();
        return $store;
    }

    public function update($id, $formArray) {
        $this->db->where('maloai', $id);
        $this->db->update('loaisanpham', $formArray);
    } 

    public function delete($id) {
        $this->db->where('maloai',$id);
        $this->db->delete('loaisanpham');
    }

    public function countStore() {
        $query = $this->db->get('loaisanpham');
        return $query->num_rows();
    }

    public function getResInfo() {
        $this->db->select('*');
        $this->db->from('loaisanpham');
        $result = $this->db->get()->result_array();
        return $result;
    }

}
