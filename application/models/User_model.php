<?php
class User_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function login($username, $password){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_user');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$this->db->where('flag_active','Y');
		$query=$this->db->get();
		return $query->num_rows();
	}

	public function user($dataWhere=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_user');
		if($dataWhere!=FALSE){
			$this->db->where($dataWhere);
		}
		$this->db->where('flag_active','Y');
		return $this->db->get();
	}

	public function adduser($username, $password){
		$this->db->flush_cache();
		$data = array(
				'username' => $username,
				'password' => md5($password)
				);
		if($this->db->insert('ms_user', $data)){
			return true;
		}
	}

	public function edituser($dataUpdate, $dataWhere){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where($dataWhere);
		if($this->db->update('ms_user', $dataUpdate)){
			return true;
		}
	}

	public function deleteuser($id){
		$this->db->flush_cache();
		$this->db->where('flag_active','Y');
		$this->db->where('id',$id);
		$dataUpdate = array('flag_active' => 'N' );
		if($this->db->update('ms_user', $dataUpdate)){
			return true;
		}
	}
}
