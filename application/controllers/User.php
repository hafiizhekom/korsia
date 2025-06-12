<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	private function addUser(){
		if(!empty($this->input->post('addUser'))){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password2 = $this->input->post('password2');

			if($password == $password2){
				if($this->user_model->adduser($username, $password)==true){
				redirect(base_url('user?adduser=ok'));
			}
			}else{
				redirect(base_url('user?adduser=fail'));
				
			}

			

			
		}
	}

	private function editUser(){
		if(!empty($this->input->post('editUser'))){
			$username = $this->input->post('edit_username');
			$password = $this->input->post('edit_password');


			$dataUpdate = array(
				'username' => $username,
				'password' => md5($password)
				);

			
			$dataWhere = array('username' => $username );
			if($this->user_model->edituser($dataUpdate, $dataWhere)==true){
				redirect(base_url('user?edituser=ok'));
				
			}
		}
	}

	private function deleteUser(){
		if(!empty($this->input->post('deleteUser'))){
			$id = $this->input->post('delete_id');

			

			if($this->user_model->deleteuser($id)==true){
				redirect(base_url('user?deleteuser=ok'));

			}
		}
	}

	public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('user_model');
        if(!$this->session->userdata('login')){
        	redirect(base_url());
        }

        $this->addUser();
        $this->editUser();
        $this->deleteUser();

    }

	public function index()
	{
		
		$data['user'] = $this->user_model->user();
		$this->load->view('backend/user', $data);
	}
}
