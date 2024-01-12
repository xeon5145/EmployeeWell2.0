<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateUserModel extends CI_Model
{
    private $db = '';
    public function __construct()
    {
        $this->db = $this->load->database('default', true);
    }

    public function createuser($username, $firstname, $lastname, $email, $password)
    {
        $data = array(
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password
        );

        // checking if user exits or not
        $userCheck = $this->db->select('*')
            ->from('ci_users')
            // ->where("(username = '$username' OR email = '$email')")
            ->or_group_start()
            ->where('username', $username)
            ->or_where('email', $email)
            ->group_end()
            ->get();


        if ($userCheck->num_rows() > 0) {
            return "
                    <div class='alert alert-warning text-center' role='alert'>
                    Username or email is already registered.
                    </div>        
                    ";
        } else {

            // checking if user exits or not
            // var_dump($data);
            $this->db->insert('ci_users', $data);
            $insertionStatus = $this->db->affected_rows();

            if($insertionStatus > 0)
            {
                return "
                <div class='alert alert-success text-center' role='alert'>
                User created successfully.
                </div>        
                ";
            }
            // echo $this->db->last_query();
        }
    }
}
