<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {

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

	private function addDepartemen(){
		if(!empty($this->input->post('addDepartemen'))){
			$departemen = $this->input->post('departemen');

			

			if($this->departemen_model->adddepartemen($departemen)==true){
				redirect(base_url('departemen?adddepartemen=ok'));
			}
		}
	}

	private function editDepartemen(){
		if(!empty($this->input->post('editDepartemen'))){
			$id = $this->input->post('edit_id');
			$departemen = $this->input->post('edit_departemen');


			$dataUpdate = array(
				'nama_departemen' => $departemen
				);

			
			$dataWhere = array('id' => $id );
			if($this->departemen_model->editdepartemen($dataUpdate, $dataWhere)==true){
				redirect(base_url('departemen?editdepartemen=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";
				
			}
		}
	}

	private function deleteDepartemen(){
		if(!empty($this->input->post('deleteDepartemen'))){
			$id = $this->input->post('delete_id');

			

			if($this->departemen_model->deletedepartemen($id)==true){
				redirect(base_url('departemen?deletedepartemen=ok'));

			}
		}
	}

	public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('departemen_model');
        if(!$this->session->userdata('login')){
        	redirect(base_url());
        }

        $this->addDepartemen();
        $this->editDepartemen();
        $this->deleteDepartemen();


    }

	public function index()
	{
		
		$data['departemen'] = $this->departemen_model->departemen();
		$this->load->view('backend/departemen', $data);
	}
}
