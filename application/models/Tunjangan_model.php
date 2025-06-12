<?php
class Tunjangan_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function tunjangandisiplin($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_tunjangan_disiplin');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function tunjanganjabatan($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_tunjangan_jabatan');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function tunjangankehadiran($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_tunjangan_kehadiran');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function tunjanganlemburkerja($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_tunjangan_lembur_kerja');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function tunjanganlemburlibur($dataWhere = FALSE) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_tunjangan_lembur_libur');
		$this->db->where('flag_active', 'Y');
		if ($dataWhere != FALSE) {
			$this->db->where($dataWhere);
		}
		return $this->db->get();
	}

	public function addedittunjangandisiplin($tunjangan) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_tunjangan_disiplin');
		$this->db->where('flag_active', 'Y');

		if ($this->db->get()->num_rows() > 0) {
			$this->db->flush_cache();
			$this->db->where('flag_active', 'Y');
			if ($this->db->update('ms_tunjangan_disiplin', array('jumlah_tunjangan' => $tunjangan))) {
				return true;
			}
		} else {
			$this->db->flush_cache();
			$data = array(
				'jumlah_tunjangan' => $tunjangan,
			);
			if ($this->db->insert('ms_tunjangan_disiplin', $data)) {
				return true;
			}
		}
	}

	public function addedittunjangankehadiran($tunjangan) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_tunjangan_kehadiran');
		$this->db->where('flag_active', 'Y');

		if ($this->db->get()->num_rows() > 0) {
			$this->db->flush_cache();
			$this->db->where('flag_active', 'Y');
			if ($this->db->update('ms_tunjangan_kehadiran', array('jumlah_tunjangan' => $tunjangan))) {
				return true;
			}
		} else {
			$this->db->flush_cache();
			$data = array(
				'jumlah_tunjangan' => $tunjangan,
			);
			if ($this->db->insert('ms_tunjangan_kehadiran', $data)) {
				return true;
			}
		}
	}

	public function addedittunjanganlemburkerja($tunjangan) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_tunjangan_lembur_kerja');
		$this->db->where('flag_active', 'Y');

		if ($this->db->get()->num_rows() > 0) {
			$this->db->flush_cache();
			$this->db->where('flag_active', 'Y');
			if ($this->db->update('ms_tunjangan_lembur_kerja', array('jumlah_tunjangan' => $tunjangan))) {
				return true;
			}
		} else {
			$this->db->flush_cache();
			$data = array(
				'jumlah_tunjangan' => $tunjangan,
			);
			if ($this->db->insert('ms_tunjangan_lembur_kerja', $data)) {
				return true;
			}
		}
	}

	public function addedittunjanganlemburlibur($tunjangan) {
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('ms_tunjangan_lembur_libur');
		$this->db->where('flag_active', 'Y');

		if ($this->db->get()->num_rows() > 0) {
			$this->db->flush_cache();
			$this->db->where('flag_active', 'Y');
			if ($this->db->update('ms_tunjangan_lembur_libur', array('jumlah_tunjangan' => $tunjangan))) {
				return true;
			}
		} else {
			$this->db->flush_cache();
			$data = array(
				'jumlah_tunjangan' => $tunjangan,
			);
			if ($this->db->insert('ms_tunjangan_lembur_libur', $data)) {
				return true;
			}
		}
	}

	public function addtunjanganjabatan($jabatan, $tunjangan) {
		$this->db->flush_cache();
		$data = array(
			'jabatan' => $jabatan,
			'jumlah_tunjangan' => $tunjangan,
		);
		if ($this->db->insert('ms_tunjangan_jabatan', $data)) {
			return true;
		}
	}

	public function edittunjanganjabatan($dataUpdate, $dataWhere) {
		$this->db->flush_cache();
		$this->db->where('flag_active', 'Y');
		$this->db->where($dataWhere);
		if ($this->db->update('ms_tunjangan_jabatan', $dataUpdate)) {
			return true;
		}
	}

	public function deletetunjanganjabatan($jabatan) {
		$this->db->flush_cache();
		$this->db->where('flag_active', 'Y');
		$this->db->where('jabatan', $jabatan);
		$dataUpdate = array('flag_active' => 'N');
		if ($this->db->update('ms_tunjangan_jabatan', $dataUpdate)) {
			return true;
		}
	}

}
