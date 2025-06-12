<?php
class Status_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function status($dataWhere=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_status');
		$this->db->where('flag_active','Y');
		if($dataWhere!=FALSE){
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	
	public function addstatus($status){
		$this->db->flush_cache();
		$data = array(
				'nama_status' => $status
				);
		if($this->db->insert('ms_status', $data)){
			return true;
		}
	}

	public function editstatus($dataUpdate, $dataWhere){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where($dataWhere);
		if($this->db->update('ms_status', $dataUpdate)){
			return true;
		}
	}

	public function deletestatus($id){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where('id',$id);
		$dataUpdate = array('flag_active' => 'N' );
		if($this->db->update('ms_status', $dataUpdate)){
			return true;
		}
	}

}
