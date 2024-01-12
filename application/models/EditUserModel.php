<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditUserModel extends CI_Model
{
    public $db = '';
    public function __construct()
    {
        $this->db = $this->load->database('default', true);
    }

    public function updateuser($id, $username, $firstname, $lastname, $email, $password)
    {
        $data = array(
            'id' => $id,
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password
        );

        // Assuming 'users' is the table name where user information is stored
        $this->db->where('id', $id); // Assuming 'username' is the unique identifier
        $this->db->update('ci_users', $data);

        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    A simple success alert—check it out!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        } else {
            return "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Failed to update user information
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        }
    }
}
