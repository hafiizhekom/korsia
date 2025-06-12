<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan extends CI_Controller {

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

	private function editTunjanganJabatan() {
		if (!empty($this->input->post('editTunjanganJabatan'))) {
			$id = $this->input->post('edit_id');
			$tunjanganjabatan = $this->input->post('edit_tunjanganjabatan');

			$dataUpdate = array(
				'jumlah_tunjangan' => $tunjanganjabatan,
			);

			$dataWhere = array('id' => $id);
			if ($this->tunjangan_model->edittunjanganjabatan($dataUpdate, $dataWhere) == true) {
				redirect(base_url('tunjangan/jabatan?edittunjangan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function addeditTunjanganDisiplin() {
		if (!empty($this->input->post('addeditTunjanganDisiplin'))) {
			$tunjangandisiplin = $this->input->post('addedit_tunjangandisiplin');

			if ($this->tunjangan_model->addedittunjangandisiplin($tunjangandisiplin) == true) {
				redirect(base_url('tunjangan/disiplin?edittunjangan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function addeditTunjanganKehadiran() {
		if (!empty($this->input->post('addeditTunjanganKehadiran'))) {
			$tunjangankehadiran = $this->input->post('addedit_tunjangankehadiran');

			if ($this->tunjangan_model->addeditTunjanganKehadiran($tunjangankehadiran) == true) {
				redirect(base_url('tunjangan/kehadiran?edittunjangan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function addeditTunjanganLemburKerja() {
		if (!empty($this->input->post('addeditTunjanganLemburKerja'))) {
			$tunjanganlemburkerja = $this->input->post('addedit_tunjanganlemburkerja');

			if ($this->tunjangan_model->addeditTunjanganLemburKerja($tunjanganlemburkerja) == true) {
				redirect(base_url('tunjangan/lembur_kerja?edittunjangan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function addeditTunjanganLemburLibur() {
		if (!empty($this->input->post('addeditTunjanganLemburLibur'))) {
			$tunjanganlemburlibur = $this->input->post('addedit_tunjanganlemburlibur');

			if ($this->tunjangan_model->addeditTunjanganLemburLibur($tunjanganlemburlibur) == true) {
				redirect(base_url('tunjangan/lembur_libur?edittunjangan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	public function __construct() {
		// Construct the parent class
		parent::__construct();
		$this->load->model('gaji_model');
		$this->load->model('jabatan_model');
		$this->load->model('tunjangan_model');
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}

		$this->editTunjanganJabatan();
		$this->addeditTunjanganDisiplin();
		$this->addeditTunjanganKehadiran();
		$this->addeditTunjanganLemburKerja();
		$this->addeditTunjanganLemburLibur();

	}

	public function jabatan() {

		$data['data_tunjanganjabatan'] = $this->tunjangan_model->tunjanganjabatan();
		$data['data_jabatan'] = $this->jabatan_model->jabatan();
		$this->load->view('backend/tunjangan_jabatan', $data);
	}

	public function disiplin() {
		$data['data_tunjangandisiplin'] = $this->tunjangan_model->tunjangandisiplin();
		$this->load->view('backend/tunjangan_disiplin', $data);
	}

	public function kehadiran() {
		$data['data_tunjangankehadiran'] = $this->tunjangan_model->tunjangankehadiran();
		$this->load->view('backend/tunjangan_kehadiran', $data);
	}

	public function lembur_kerja() {
		$data['data_tunjanganlemburkerja'] = $this->tunjangan_model->tunjanganlemburkerja();
		$this->load->view('backend/tunjangan_lembur_kerja', $data);
	}

	public function lembur_libur() {
		$data['data_tunjanganlemburlibur'] = $this->tunjangan_model->tunjanganlemburlibur();
		$this->load->view('backend/tunjangan_lembur_libur', $data);
	}
}
