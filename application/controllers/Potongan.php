<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller {

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

	private function addeditPotonganKesehatan() {
		if (!empty($this->input->post('addeditPotonganKesehatan'))) {
			$potongankesehatan = $this->input->post('addedit_potongankesehatan');

			if ($this->potongan_model->addeditpotongankesehatan($potongankesehatan) == true) {
				redirect(base_url('potongan/kesehatan?editpotongan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function addeditPotonganKetenagakerjaan() {
		if (!empty($this->input->post('addeditPotonganKetenagakerjaan'))) {
			$potonganketenagakerjaan = $this->input->post('addedit_potonganketanagakerjaan');

			if ($this->potongan_model->addeditpotonganketenagakerjaan($potonganketenagakerjaan) == true) {
				redirect(base_url('potongan/ketenagakerjaan?editpotongan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function addeditPotonganPensiun() {
		if (!empty($this->input->post('addeditPotonganPensiun'))) {
			$potonganpensiun = $this->input->post('addedit_potonganpensiun');

			if ($this->potongan_model->addeditpotonganpensiun($potonganpensiun) == true) {
				redirect(base_url('potongan/pensiun?editpotongan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	private function addeditPotonganAbsen() {
		if (!empty($this->input->post('addeditPotonganAbsen'))) {
			$potonganabsen = $this->input->post('addedit_potonganabsen');

			if ($this->potongan_model->addeditpotonganabsen($potonganabsen) == true) {
				redirect(base_url('potongan/absen?editpotongan=ok'));
				//echo "<h1>".$this->db->last_query()."</h1>";

			}
		}
	}

	public function __construct() {
		// Construct the parent class
		parent::__construct();
		$this->load->model('gaji_model');
		$this->load->model('jabatan_model');
		$this->load->model('potongan_model');
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}

		$this->addeditPotonganKesehatan();
		$this->addeditPotonganKetenagakerjaan();
		$this->addeditPotonganPensiun();
		$this->addeditPotonganAbsen();

	}

	public function kesehatan() {

		$data['data_potongankesehatan'] = $this->potongan_model->potongankesehatan();
		$this->load->view('backend/potongan_kesehatan', $data);
	}

	public function ketenagakerjaan() {
		$data['data_potonganketenagakerjaan'] = $this->potongan_model->potonganketenagakerjaan();
		$this->load->view('backend/potongan_ketenagakerjaan', $data);
	}

	public function pensiun() {
		$data['data_potonganpensiun'] = $this->potongan_model->potonganpensiun();
		$this->load->view('backend/potongan_pensiun', $data);
	}

	public function absen() {
		$data['data_potonganabsen'] = $this->potongan_model->potonganabsen();
		$this->load->view('backend/potongan_absen', $data);
	}
}
