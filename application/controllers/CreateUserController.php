<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateUserController extends CI_Controller
{
    public function index()
    {
        
        $this->load->helper('url');
        $data['newuser'] = '';
        
        $this->load->view('header');
        $this->load->view('createuser');
        $this->load->view('footer');
        
        
    }  
    
    public function create_user()
    {
        $this->load->helper('url');
        $this->load->helper('encryption');

        $this->load->model(array('CreateUserModel'));

		$username = $this->input->post('username'); 
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');


        echo $data['updatestatus'] = $this->CreateUserModel->createuser($username,$firstname,$lastname,$email,encryptData($password));

    }
}