<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    private $db = '';
    public function __construct() {
        $this->db = $this->load->database('default', true);
    }

    public function getUsers() {
        // Query to get all users from your user table
        
        $this->db->select('*');
        $this->db->from('ci_users');
        $query = $this->db->get(); //
       
        return $query->result(); // 
    }
}
