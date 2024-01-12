<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{

    private $db = '';
    public function __construct()
    {
        $this->db = $this->load->database('default', true);
    }

    public function getUser($username, $password)
    {

        $this->db->select('password');
        $this->db->from('ci_users');
        $this->db->where('username', $username);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row();

            $fetchedPassword = $row->password;

            if ($password == $fetchedPassword) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        else{
            $status = 0;
        }

        return $status;
    }
}
