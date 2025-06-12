<?php
class Absensi_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function absensi($idKaryawan, $waktu1, $waktu2) {
		$this->db->flush_cache();
		$waktu1 = date("Y-m-d H:i:s", strtotime($waktu1));
		$waktu2 = date("Y-m-d H:i:s", strtotime($waktu2));
		return $this->db->query("SELECT date_format(waktu_masuk, '%d %M %Y') as TanggalKerja,  DAYNAME(waktu_masuk) as Hari, date_format(waktu_masuk, '%H:%i:%s') as JamMasuk, date_format(waktu_keluar, '%H:%i:%s') as JamKeluar FROM tr_absensi WHERE waktu_masuk BETWEEN '" . $waktu1 . "' AND '" . $waktu2 . "' AND karyawan = '" . $idKaryawan . "' ORDER BY waktu_masuk");
	}

	public function harimasukkerja($idKaryawan, $month, $year) {
		$this->db->flush_cache();
		return $this->db->query("SELECT date_format(waktu_masuk, '%d-%m-%Y') as TanggalKerja,  date_format(waktu_masuk, '%H:%i:%s') as JamMasuk, date_format(waktu_keluar, '%H:%i:%s') as JamKeluar FROM tr_absensi WHERE waktu_masuk != '0000-00-00 00:00:00' AND waktu_keluar != '0000-00-00 00:00:00' AND MONTH(waktu_masuk) = " . $month . " AND YEAR(waktu_masuk) = " . $year . " AND karyawan = '" . $idKaryawan . "' ORDER BY waktu_masuk");
	}

	public function addabsensilengkap($karyawan, $waktu_masuk, $waktu_keluar) {
		$this->db->flush_cache();

		$waktu_masuk = date("Y-m-d H:i:s", strtotime($waktu_masuk));
		$waktu_keluar = date("Y-m-d H:i:s", strtotime($waktu_keluar));
		$data = array(
			'karyawan' => $karyawan,
			'waktu_masuk' => $waktu_masuk,
			'waktu_keluar' => $waktu_keluar,

		);
		if ($this->db->insert('tr_absensi', $data)) {
			return true;
		}
	}

	public function addabsensimasuk($karyawan, $waktu) {
		$this->db->flush_cache();
		$data = array(
			'karyawan' => $karyawan,
			'waktu_masuk' => $waktu,
		);
		if ($this->db->insert('tr_absensi', $data)) {
			return true;
		}
	}

	public function editabsensi($dataUpdate, $dataWhere) {
		$this->db->flush_cache();
		$this->db->where('flag_active', 'Y');
		$this->db->where($dataWhere);
		if ($this->db->update('tr_absensi', $dataUpdate)) {
			return true;
		}
	}

	public function deleteabsensi($id) {
		$this->db->flush_cache();
		$this->db->where('flag_active', 'Y');
		$this->db->where('id', $id);
		$dataUpdate = array('flag_active' => 'N');
		if ($this->db->update('tr_absensi', $dataUpdate)) {
			return true;
		}
	}
}
