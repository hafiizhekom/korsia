<?php
class Departemen_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function departemen($dataWhere=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_departemen');
		$this->db->where('flag_active','Y');
		if($dataWhere!=FALSE){
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function adddepartemen($departemen){
		$this->db->flush_cache();
		$data = array(
				'nama_departemen' => $departemen
				);
		if($this->db->insert('ms_departemen', $data)){
			return true;
		}
	}

	public function editdepartemen($dataUpdate, $dataWhere){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where($dataWhere);
		if($this->db->update('ms_departemen', $dataUpdate)){
			return true;
		}
	}

	public function deletedepartemen($id){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where('id',$id);
		$dataUpdate = array('flag_active' => 'N' );
		if($this->db->update('ms_departemen', $dataUpdate)){
			return true;
		}
	}
}
