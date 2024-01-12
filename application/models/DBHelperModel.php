<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DBHelperModel extends CI_Model
{
    public $db = '';
    public function __construct()
    {
        $this->db = $this->load->database('default', true);
    }

    public function getUserData($username,$fieldname)
    {

        $this->db->select("$fieldname");
        $this->db->from('ci_users');
        $this->db->where('username',$username);

        $data = $this->db->get();

        if($data->num_rows() > 0)
        {
            $getData = $data->row();
            $userdata = $getData->$fieldname;
        }
        else
        {
            $userdata = "Invalid Username";
        }

        return $userdata;

    }
}
