<?php
class Gaji_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function gaji($dataWhere=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_gaji');
		$this->db->where('flag_active','Y');
		if($dataWhere!=FALSE){
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function addgaji($jabatan, $salary){
		$this->db->flush_cache();
		$data = array(
				'jabatan' => $jabatan,
				'gaji' => $salary
				);
		if($this->db->insert('ms_gaji', $data)){
			return true;
		}
	}

	public function editgaji($dataUpdate, $dataWhere){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where($dataWhere);
		if($this->db->update('ms_gaji', $dataUpdate)){
			return true;
		}
	}

	public function deletegaji($id){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where('id',$id);
		$dataUpdate = array('flag_active' => 'N' );
		if($this->db->update('ms_gaji', $dataUpdate)){
			return true;
		}
	}
}
