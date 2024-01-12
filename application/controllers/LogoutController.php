<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LogoutController extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $this->load->helper('url');

        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('login', 'auto');
    }
}

?>