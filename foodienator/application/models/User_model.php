<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('nguoidung', $formArray);
    }

    public function getByUsername($username) {
        $this->db->where('tendangnhap', $username);
        $mainuser = $this->db->get('nguoidung')->row_array();
        return $mainuser;
    }

    public function getUsers() {
        $result = $this->db->get('nguoidung')->result_array();
        return $result;
    }

    public function getUser($id) {
        $this->db->where('manguoidung', $id);
        $user = $this->db->get('nguoidung')->row_array();
        return $user;
    }

    public function update($id, $formArray) {
        $this->db->where('manguoidung',$id);
        $this->db->update('nguoidung', $formArray);
    }

    public function delete($id) {
        $this->db->where('manguoidung',$id);
        $this->db->delete('nguoidung');
    }

    public function countUser() {
        $query = $this->db->get('nguoidung');
        return $query->num_rows();
    }

}
