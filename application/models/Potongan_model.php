<?php
class Potongan_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function potongankesehatan($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_potongan_kesehatan');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function potonganketenagakerjaan($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_potongan_ketenagakerjaan');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function potonganpensiun($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_potongan_pensiun');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function potonganabsen($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_potongan_absen');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function addeditpotongankesehatan($potongan) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_potongan_kesehatan');
		$this->db->where('flag_active', 'Y');

		if ($this->db->get()->num_rows() > 0) {
			$this->db->flush_cache();
			$this->db->where('flag_active', 'Y');
			if ($this->db->update('ms_potongan_kesehatan', array('jumlah_potongan' => $potongan))) {
				return true;
			}
		} else {
			$this->db->flush_cache();
			$data = array(
				'jumlah_potongan' => $potongan,
			);
			if ($this->db->insert('ms_potongan_kesehatan', $data)) {
				return true;
			}
		}
	}

	public function addeditpotonganketenagakerjaan($potongan) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_potongan_ketenagakerjaan');
		$this->db->where('flag_active', 'Y');

		if ($this->db->get()->num_rows() > 0) {
			$this->db->flush_cache();
			$this->db->where('flag_active', 'Y');
			if ($this->db->update('ms_potongan_ketenagakerjaan', array('jumlah_potongan' => $potongan))) {
				return true;
			}
		} else {
			$this->db->flush_cache();
			$data = array(
				'jumlah_potongan' => $potongan,
			);
			if ($this->db->insert('ms_potongan_ketenagakerjaan', $data)) {
				return true;
			}
		}
	}

	public function addeditpotonganpensiun($potongan) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_potongan_pensiun');
		$this->db->where('flag_active', 'Y');

		if ($this->db->get()->num_rows() > 0) {
			$this->db->flush_cache();
			$this->db->where('flag_active', 'Y');
			if ($this->db->update('ms_potongan_pensiun', array('jumlah_potongan' => $potongan))) {
				return true;
			}
		} else {
			$this->db->flush_cache();
			$data = array(
				'jumlah_potongan' => $potongan,
			);
			if ($this->db->insert('ms_potongan_pensiun', $data)) {
				return true;
			}
		}
	}

	public function addeditpotonganabsen($potongan) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_potongan_absen');
		$this->db->where('flag_active', 'Y');

		if ($this->db->get()->num_rows() > 0) {
			$this->db->flush_cache();
			$this->db->where('flag_active', 'Y');
			if ($this->db->update('ms_potongan_absen', array('jumlah_potongan' => $potongan))) {
				return true;
			}
		} else {
			$this->db->flush_cache();
			$data = array(
				'jumlah_potongan' => $potongan,
			);
			if ($this->db->insert('ms_potongan_absen', $data)) {
				return true;
			}
		}
	}

}