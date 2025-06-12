<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

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

	private function addAbsensi() {
		if (!empty($this->input->post('addAbsensi'))) {
			$karyawan = $this->input->post('karyawan');
			$waktu_masuk = $this->input->post('waktu_masuk');
			$waktu_keluar = $this->input->post('waktu_masuk');

			$checkingAbsensi = $this->absensi_model->absensi(array('jabatan' => $jabatan));
			if ($checkingAbsensi->num_rows() > 0) {
				$dataUpdate = array('absensi' => $absensi, 'jabatan' => $jabatan);
				$dataWhere = array('id' => $checkingAbsensi->result()[0]->id);
				if ($this->absensi_model->editabsensi($dataUpdate, $dataWhere) == true) {
					redirect(base_url('absensi?editabsensi=ok'));
				}
			} else {

				if ($this->absensi_model->addAbsensi($jabatan, $absensi) == true) {
					redirect(base_url('absensi?addabsensi=ok'));
				}
			}
		}
	}

	private function editAbsensi() {
		if (!empty($this->input->post('editAbsensi'))) {
			$id = $this->input->post('edit_id');
			$absensi = $this->input->post('edit_absensi');

			$dataUpdate = array(
				'absensi' => $absensi,
			);

			$dataWhere = array('id' => $id);
			if ($this->absensi_model->editabsensi($dataUpdate, $dataWhere) == true) {
				redirect(base_url('absensi?editabsensi=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function deleteAbsensi() {
		if (!empty($this->input->post('deleteAbsensi'))) {
			$id = $this->input->post('delete_id');

			if ($this->absensi_model->deleteabsensi($id) == true) {
				redirect(base_url('absensi?deleteabsensi=ok'));
				//echo "<h1>".$id."</h1>";

			}
		}
	}

	public function __construct() {
		// Construct the parent class
		parent::__construct();
		$this->load->model('absensi_model');
		$this->load->model('jabatan_model');
		$this->load->model('karyawan_model');
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}

		$this->addAbsensi();
		$this->editAbsensi();
		$this->deleteAbsensi();

	}

	public function index() {
		$id_karyawan = $this->input->post('karyawan');
		$waktu1 = $this->input->post('tanggal_awal');
		$waktu2 = $this->input->post('tanggal_akhir');
		$data['data_karyawan'] = $this->karyawan_model->karyawan();
		$data['data_absensi'] = $this->absensi_model->absensi($id_karyawan, $waktu1, $waktu2);
		//print_r($data['data_absensi']->result());
		//$data['data_jabatan']=$this->jabatan_model->jabatan();
		$this->load->view('backend/absensi', $data);
	}

	public function absensi() {

	}

	public function contoh_slipgaji() {
		$this->load->view('backend/slip_gaji');
	}

	public function print_slipgaji() {
		$this->load->view('backend/print_slip_gaji');
	}
}
