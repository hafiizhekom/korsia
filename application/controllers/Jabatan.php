<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

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

	private function addJabatan() {
		if (!empty($this->input->post('addJabatan'))) {
			$jabatan = $this->input->post('jabatan');

			if ($this->jabatan_model->addjabatan($jabatan) == true) {
				$last_id_jabatan = $this->jabatan_model->lastjabatan()->result()[0]->id;
				$tunjangan_jabatan = 0;
				if ($this->tunjangan_model->addtunjanganjabatan($last_id_jabatan, $tunjangan_jabatan)) {
					redirect(base_url('jabatan?addjabatan=ok'));
				}
			}
		}
	}

	private function editJabatan() {
		if (!empty($this->input->post('editJabatan'))) {
			$id = $this->input->post('edit_id');
			$jabatan = $this->input->post('edit_jabatan');

			$dataUpdate = array(
				'nama_jabatan' => $jabatan,
			);

			$dataWhere = array('id' => $id);
			if ($this->jabatan_model->editjabatan($dataUpdate, $dataWhere) == true) {
				redirect(base_url('jabatan?editjabatan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function deleteJabatan() {
		if (!empty($this->input->post('deleteJabatan'))) {
			$id = $this->input->post('delete_id');

			if ($this->jabatan_model->deletejabatan($id) == true) {
				if ($this->tunjangan_model->deletetunjanganjabatan($id) == true) {
					redirect(base_url('jabatan?deletejabatan=ok'));
				}

				//echo "<h1>".$id."</h1>";

			}
		}
	}

	public function __construct() {
		// Construct the parent class
		parent::__construct();
		$this->load->model('jabatan_model');
		$this->load->model('tunjangan_model');
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}

		$this->addJabatan();
		$this->editJabatan();
		$this->deleteJabatan();

	}

	public function index() {

		$data['jabatan'] = $this->jabatan_model->jabatan();
		$this->load->view('backend/jabatan', $data);
	}
}
