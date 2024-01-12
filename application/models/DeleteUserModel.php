<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DeleteUserModel extends CI_Model
{
    public $db = '';
    public function __construct()
    {
        $this->db = $this->load->database('default', true);
    }

    public function deleteuser($id)
    {
        $data = array(
            'id' => $id
        );

        $this->db->where('id', $id); // Assuming 'id' is the unique identifier for the user
        $this->db->delete('ci_users');

        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    User deleted successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        } else {
            return "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Failed to delete user
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        }
    }
}
