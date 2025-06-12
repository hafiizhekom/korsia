<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

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

	private function addGaji() {
		if (!empty($this->input->post('addGaji'))) {
			$jabatan = $this->input->post('jabatan');
			$gaji = $this->input->post('gaji');

			$checkingGaji = $this->gaji_model->gaji(array('jabatan' => $jabatan));
			if ($checkingGaji->num_rows() > 0) {
				$dataUpdate = array('gaji' => $gaji, 'jabatan' => $jabatan);
				$dataWhere = array('id' => $checkingGaji->result()[0]->id);
				if ($this->gaji_model->editgaji($dataUpdate, $dataWhere) == true) {
					redirect(base_url('gaji?editgaji=ok'));
				}
			} else {

				if ($this->gaji_model->addGaji($jabatan, $gaji) == true) {
					redirect(base_url('gaji?addgaji=ok'));
				}
			}
		}
	}

	private function editGaji() {
		if (!empty($this->input->post('editGaji'))) {
			$id = $this->input->post('edit_id');
			$gaji = $this->input->post('edit_gaji');

			$dataUpdate = array(
				'gaji' => $gaji,
			);

			$dataWhere = array('id' => $id);
			if ($this->gaji_model->editgaji($dataUpdate, $dataWhere) == true) {
				redirect(base_url('gaji?editgaji=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function deleteGaji() {
		if (!empty($this->input->post('deleteGaji'))) {
			$id = $this->input->post('delete_id');

			if ($this->gaji_model->deletegaji($id) == true) {
				redirect(base_url('gaji?deletegaji=ok'));
				//echo "<h1>".$id."</h1>";

			}
		}
	}

	public function __construct() {
		// Construct the parent class
		parent::__construct();
		$this->load->model('gaji_model');
		$this->load->model('jabatan_model');
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}

		$this->addGaji();
		$this->editGaji();
		$this->deleteGaji();

	}

	public function index() {

		$data['data_gaji'] = $this->gaji_model->gaji();
		$data['data_jabatan'] = $this->jabatan_model->jabatan();
		$this->load->view('backend/gaji', $data);
	}
}
