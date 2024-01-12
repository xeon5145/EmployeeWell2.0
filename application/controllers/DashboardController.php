<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model(array('UsersModel','DBHelperModel'));
		$data['users'] = '';

		// Get all users using the model function
		$data['users'] = $this->UsersModel->getUsers();
		// Get all users using the model function

		// getting username from session
		$username = $this->session->userdata('username');
		// getting username from session

		$data['firstname'] = $this->DBHelperModel->getUserData($username,'firstname');
		$data['lastname'] = $this->DBHelperModel->getUserData($username,'lastname');
		
		
		$this->load->view('header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}
	
	public function edit_user()
	{
		// $this->load->model(array('EditUserModel'));

		$this->load->helper('url');
		$this->load->model(array('EditUserModel'));
		$this->load->helper('encryption');

		$id = $this->input->post('id');
		$username = $this->input->post('username'); 
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');


		$data['udpatestatus'] = '';

		echo $data['updatestatus'] = $this->EditUserModel->updateuser($id,$username,$firstname,$lastname,$email,encryptData($password));


		// echo "this is controller output";
		
	}

	public function delete_user()
	{
		// $this->load->model(array('EditUserModel'));

		$id = $this->input->post('id');
		$this->load->helper('url');
		$this->load->model(array('DeleteUserModel'));

		$data['deleteStatus'] = '';

		echo $data['deletestatus'] = $this->DeleteUserModel->deleteuser($id);


		// echo "this is controller output";
		
	}

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

        if (!$this->session->userdata('username') && !in_array($controller, $allowed_controllers)) {
            redirect('login', 'auto');
        }
}
}
