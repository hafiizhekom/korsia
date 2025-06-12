<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

	public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('user_model');

    }

	public function index()
	{
		if($this->session->userdata('login')){
			redirect(base_url('dashboard'));
		}else{
			$this->load->view('login/login');	
		}
		
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if(!empty($username) or !empty($password)){
			if($this->user_model->login($username, $password)==true){
				$this->session->set_userdata(array('username' => $username, 'login' => true ));
				redirect(base_url('dashboard'));
			}else{
				redirect(base_url());
			}
		}else{
				redirect(base_url());
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
