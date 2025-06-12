<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

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

	


	private function editKaryawan(){
		if(!empty($this->input->post('editKaryawan'))){
			$id = $this->input->post('edit_id');
			$nama = $this->input->post('edit_nama');
			$tanggal_lahir = $this->input->post('edit_tanggal_lahir');
			$jenis_kelamin = $this->input->post('edit_jenis_kelamin');
			$status = $this->input->post('edit_status');
			$npwp = $this->input->post('edit_npwp');
			$jabatan = $this->input->post('edit_jabatan');
			$departemen = $this->input->post('edit_departemen');
			$no_rekening = $this->input->post('edit_no_rekening');
			$tanggal_masuk = $this->input->post('edit_tanggal_masuk');

			$date = new DateTime($tanggal_lahir);
			$tanggal_lahir = $date->format('Y-m-d');
			
			$date = new DateTime($tanggal_masuk);
			$tanggal_masuk = $date->format('Y-m-d');

			$dataUpdate = array(
				'nama' => $nama,
				'tanggal_lahir' => $tanggal_lahir,
				'jenis_kelamin' => $jenis_kelamin,
				'status' => $status,
				'npwp' => $npwp,
				'jabatan' => $jabatan,
				'departemen' => $departemen,
				'no_rekening' => $no_rekening,
				'tanggal_masuk' => $tanggal_masuk
				);

			
			$dataWhere = array('id' => $id );
			if($this->karyawan_model->editkaryawan($dataUpdate, $dataWhere)==true){
				redirect(base_url('karyawan?editkaryawan=ok'));
			}
		}
	}

	private function addKaryawan(){
		if(!empty($this->input->post('addKaryawan'))){
			$nama = $this->input->post('nama');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$status = $this->input->post('status');
			$npwp = $this->input->post('npwp');
			$jabatan = $this->input->post('jabatan');
			$departemen = $this->input->post('departemen');
			$no_rekening = $this->input->post('no_rekening');
			$tanggal_masuk = $this->input->post('tanggal_masuk');

			$date1 = new DateTime($tanggal_lahir);
			$tanggal_lahir = $date1->format('Y-m-d');
			
			$date2 = new DateTime($tanggal_masuk);
			$tanggal_masuk = $date2->format('Y-m-d');

			

			if($this->karyawan_model->addkaryawan($nama, $tanggal_lahir, $jenis_kelamin, $status, $npwp, $jabatan, $departemen, $no_rekening, $tanggal_masuk)==true){
				redirect(base_url('karyawan?addkaryawan=ok'));
			}
		}
	}

	private function deleteKaryawan(){
		if(!empty($this->input->post('deleteKaryawan'))){
			$id = $this->input->post('delete_id');

			

			if($this->karyawan_model->deletekaryawan($id)==true){
				redirect(base_url('karyawan?deletekaryawan=ok'));

			}
		}
	}


	public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('karyawan_model');
        $this->load->model('jabatan_model');
        $this->load->model('departemen_model');
        $this->load->model('status_model');
        if(!$this->session->userdata('login')){
        	redirect(base_url());
        }

        $this->addKaryawan();
        $this->editKaryawan();
        $this->deleteKaryawan();

    }

	public function index()
	{
		
		$data['karyawan'] = $this->karyawan_model->karyawan();
		$data['status'] = $this->status_model->status();
		$data['jabatan'] = $this->jabatan_model->jabatan();
		$data['departemen'] = $this->departemen_model->departemen();
		$this->load->view('backend/karyawan', $data);
	}
}
