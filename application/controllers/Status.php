<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

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

	private function addStatus(){
		if(!empty($this->input->post('addStatus'))){
			$status = $this->input->post('status');

			

			if($this->status_model->addstatus($status)==true){
				redirect(base_url('status?addstatus=ok'));
			}
		}
	}

	private function editStatus(){
		if(!empty($this->input->post('editStatus'))){
			$id = $this->input->post('edit_id');
			$status = $this->input->post('edit_status');


			$dataUpdate = array(
				'nama_status' => $status
				);

			
			$dataWhere = array('id' => $id );
			if($this->status_model->editstatus($dataUpdate, $dataWhere)==true){
				redirect(base_url('status?editstatus=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";
				
			}
		}
	}

	private function deleteStatus(){
		if(!empty($this->input->post('deleteStatus'))){
			$id = $this->input->post('delete_id');

			

			if($this->status_model->deletestatus($id)==true){
				redirect(base_url('status?deleteestatus=ok'));
				//echo "<h1>".$id."</h1>";

			}
		}
	}

	public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('status_model');
        if(!$this->session->userdata('login')){
        	redirect(base_url());
        }

        $this->addStatus();
        $this->editStatus();
        $this->deleteStatus();

    }

	public function index()
	{
		
		$data['status'] = $this->status_model->status();
		$this->load->view('backend/status', $data);
	}
}
