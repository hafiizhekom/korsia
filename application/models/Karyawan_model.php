<?php
class Karyawan_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function karyawan($dataWhere=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_karyawan');
		$this->db->where('flag_active','Y');
		if($dataWhere!=FALSE){
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function addkaryawan($nama, $tanggal_lahir, $jenis_kelamin, $status, $npwp, $jabatan, $departemen, $no_rekening, $tanggal_masuk){
		$this->db->flush_cache();
		$data = array(
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
		if($this->db->insert('ms_karyawan', $data)){
			return true;
		}
	}

	public function editkaryawan($dataUpdate, $dataWhere){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where($dataWhere);
		if($this->db->update('ms_karyawan', $dataUpdate)){
			return true;
		}
	}
public function deletekaryawan($id){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where('id',$id);
		$dataUpdate = array('flag_active' => 'N' );
		if($this->db->update('ms_karyawan', $dataUpdate)){
			return true;
		}
	}
	
}
