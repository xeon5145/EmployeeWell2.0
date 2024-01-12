<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function index()
    {
        // Load the User_model
        // $this->load->model(array('UsersModel,AuthModel'));
        $this->load->model(array('AuthModel'));
        $this->load->helper('encryption');

        $data['user'] = '';

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $string = $_POST['password'];
            $password = encryptData($string);
            // User Authentication
            $data['user'] = $this->AuthModel->getUser($username, $password);

            if ($data['user'] == 1)
            {
                $this->load->helper('url');
                $this->load->library('session');
                $this->session->set_userdata('username',$username);
                redirect('dashboard', 'refresh');
            }
            elseif ($data['user'] == 0) {
                    echo "auth failed";
            }
            else{
                echo "unknown error";
            }
        }


        // Load the login view and pass users data
        $this->load->view('header');
        $this->load->view('login', $data);
        $this->load->view('footer');
    }
    // Other functions go here

    public function __construct()
    {
        parent::__construct();
        $this->check_session();
    }

	private function check_session()
    {
		$this->load->library('session');
		$this->load->helper('url');
        $controller = $this->router->class;
        $allowed_controllers = array('login');

        if ($this->session->userdata('username')) {
            redirect('dashboard', 'auto');
        }
}
}
