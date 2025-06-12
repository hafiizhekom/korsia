<?php
class Jabatan_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function lastjabatan() {
		$this->db->flush_cache();
		return $this->db->query("SELECT * FROM ms_jabatan WHERE id IN (SELECT MAX(id) from ms_jabatan where flag_active = 'Y')");
	}

	public function jabatan($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_jabatan');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function addjabatan($jabatan) {
		$this->db->flush_cache();
		$data = array(
			'nama_jabatan' => $jabatan,
		);
		if ($this->db->insert('ms_jabatan', $data)) {
			return true;
		}
	}

	public function editjabatan($dataUpdate, $dataWhere) {
		$this->db->flush_cache();
		$this->db->where('flag_active', 'Y');
		$this->db->where($dataWhere);
		if ($this->db->update('ms_jabatan', $dataUpdate)) {
			return true;
		}
	}

	public function deletejabatan($id) {
		$this->db->flush_cache();
		$this->db->where('flag_active', 'Y');
		$this->db->where('id', $id);
		$dataUpdate = array('flag_active' => 'N');
		if ($this->db->update('ms_jabatan', $dataUpdate)) {
			return true;
		}
	}
}
