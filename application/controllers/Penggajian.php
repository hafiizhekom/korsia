<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian extends CI_Controller {
	private $default_jamkeluar = "17:00:00";

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

	public function __construct() {
		// Construct the parent class
		parent::__construct();
		$this->load->model('gaji_model');
		$this->load->model('jabatan_model');
		$this->load->model('karyawan_model');
		$this->load->model('absensi_model');
		$this->load->model('tunjangan_model');
		$this->load->model('potongan_model');
		$this->load->model('departemen_model');
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}

	}

	public function index() {
		$data['data_karyawan'] = $this->karyawan_model->karyawan();
		$this->load->view('backend/cari_gaji', $data);
	}

	public function slip_gaji() {
		$id_karyawan = $this->input->post('karyawan');
		$month = $this->input->post('bulan');
		$year = $this->input->post('tahun');
		$data_karyawan = $this->karyawan_model->karyawan(array('id'=>$id_karyawan));
		$data['data_namakaryawan'] = $data_karyawan->result()[0]->nama;
		$data['data_npwpkaryawan'] = $data_karyawan->result()[0]->npwp;
		if($data_karyawan->result()[0]->jenis_kelamin=="L"){
			$data['data_jeniskelaminkaryawan'] = "Laki-laki";
		}else{
			$data['data_jeniskelaminkaryawan'] = "Perempuan";
		}
		
		$data['data_tanggalmasukkaryawan'] = date('d M y', strtotime($data_karyawan->result()[0]->tanggal_masuk));
		$id_departemen = $data_karyawan->result()[0]->departemen;
		$data['data_departemenkaryawan'] = $this->departemen_model->departemen(array('id'=>$id_departemen))->result()[0]->nama_departemen;
		$data['data_periode'] = $month."-".$year;
		$data['data_tanggalbayar']=date('d M y', now());

		$month = date('m',strtotime($month));
		$month = (int)$month;

		if(!empty($id_karyawan) && !empty($month) && !empty($year)){

		

		$id_jabatan = $this->karyawan_model->karyawan(array('id' => $id_karyawan))->result()[0]->jabatan;
		$gaji = $this->gaji_model->gaji(array('jabatan' => $id_jabatan))->result()[0]->gaji;
		$uangjabatan = $this->tunjangan_model->tunjanganjabatan(array('jabatan' => $id_jabatan))->result()[0]->jumlah_tunjangan;

		$bruto = 0;

		$harimasukkerjaKaryawan = $this->absensi_model->harimasukkerja($id_karyawan, $month, $year);
		$harimasukkerja = $this->getDatefromMonthYear($month, $year);
		$harimasuklibur = $this->getSaturdaySundayfromMonthYear($month, $year);

		$uanglemburkerja = $this->tunjangan_model->tunjanganlemburkerja()->result()[0]->jumlah_tunjangan;
		$uanglemburlibur = $this->tunjangan_model->tunjanganlemburlibur()->result()[0]->jumlah_tunjangan;
		$uangkehadiran = $this->tunjangan_model->tunjangankehadiran()->result()[0]->jumlah_tunjangan;

		$uangabsen = $this->potongan_model->potonganabsen()->result()[0]->jumlah_potongan;

		$persentasekesehatan = $this->potongan_model->potongankesehatan()->result()[0]->jumlah_potongan;
		$persentaseketenagakerjaan = $this->potongan_model->potonganketenagakerjaan()->result()[0]->jumlah_potongan;
		$persentasepensiun = $this->potongan_model->potonganpensiun()->result()[0]->jumlah_potongan;

		$totallemburkerja = 0;
		$totallemburlibur = 0;
		$totaluangkehadiran = 0;
		$totalpotonganabsen = 0;

		$dataMasukKaryawan = array();

		foreach ($harimasukkerjaKaryawan->result() as $key => $value) {
			if (in_array($value->TanggalKerja, $harimasukkerja)) {

				$hari = date('D', strtotime($value->TanggalKerja));
				$jam1 = new DateTime($this->default_jamkeluar);
				$jam2 = new DateTime($value->JamKeluar);

				$diffjamlemburkerja = $jam2->diff($jam1);

				$jumlahlembursehari = $diffjamlemburkerja->h * $uanglemburkerja;
				$totallemburkerja = $totallemburkerja + $jumlahlembursehari;
				$totaluangkehadiran = $totaluangkehadiran + $uangkehadiran;

				$dataMasukKaryawan[$key]['TanggalKerja'] = $value->TanggalKerja;
				$dataMasukKaryawan[$key]['Hari'] = $hari;
				$dataMasukKaryawan[$key]['Tipe'] = 'Kerja';
				$dataMasukKaryawan[$key]['JamMasuk'] = $value->JamMasuk;
				$dataMasukKaryawan[$key]['JamKeluar'] = $value->JamKeluar;
				$dataMasukKaryawan[$key]['Lembur'] = $diffjamlemburkerja->h;
				$dataMasukKaryawan[$key]['UangLembur'] = $jumlahlembursehari;

			} else if (in_array($value->TanggalKerja, $harimasuklibur)) {

				$hari = date('D', strtotime($value->TanggalKerja));
				$jam1 = new DateTime($value->JamMasuk);
				$jam2 = new DateTime($value->JamKeluar);
				$diffjamlemburlibur = $jam2->diff($jam1);

				if ($hari == "Sat") {
					$jumlahlembursehari = (1 * $uanglemburlibur) + (($diffjamlemburlibur->h - 1) * 2 * $uanglemburlibur);
				} else if ($hari == "Sun") {
					$jumlahlembursehari = (($diffjamlemburlibur->h) * 2 * $uanglemburlibur);
				}

				$totallemburlibur = $totallemburlibur + $jumlahlembursehari;

				$diffjamlemburkerja = $jam2->diff($jam1);
				$dataMasukKaryawan[$key]['TanggalKerja'] = $value->TanggalKerja;
				       $dataMasukKaryawan[$key]['Hari'] = $hari;
				$dataMasukKaryawan[$key]['Tipe'] = 'Libur';
				$dataMasukKaryawan[$key]['JamMasuk'] = $value->JamMasuk;
				$dataMasukKaryawan[$key]['JamKeluar'] = $value->JamKeluar;
				$dataMasukKaryawan[$key]['Lembur'] = $diffjamlemburlibur->h;
				$dataMasukKaryawan[$key]['UangLembur'] = $jumlahlembursehari;

				//echo "<td>" . $value->TanggalKerja . "</td><td>" . $value->JamMasuk . "</td><td>" . $value->JamKeluar . "</td><td>" . $diffjamlemburlibur->h . "</td>";

			}

		}

		$dataAbsenKaryawan = array();
		$jumlahabsen = 0;
		foreach ($harimasukkerja as $key => $value) {

			$absen = TRUE;
			foreach ($harimasukkerjaKaryawan->result() as $key2 => $value2) {
				if ($value2->TanggalKerja == $value) {
					$absen = FALSE;
				}
			}

			if ($absen == TRUE) {
				$jumlahabsen = $jumlahabsen + 1;
				$hari = date('D', strtotime($value));
				$dataAbsenKaryawan[$key]['TanggalKerja'] = $value;
				$dataAbsenKaryawan[$key]['Hari'] = $hari;
			}
		}

		$totalpotonganabsen = $jumlahabsen * $uangabsen;
		$bruto = $totallemburkerja + $totallemburlibur + $totaluangkehadiran + $gaji + $uangjabatan;

		$data['data_AbsenKaryawan'] = $dataAbsenKaryawan;
		$data['data_MasukKaryawan'] = $dataMasukKaryawan;
		$data['data_harimasukkerja'] = $harimasukkerja;
		$data['data_harimasuklibur'] = $harimasuklibur;
		$data['default_jamkeluar'] = $this->default_jamkeluar;

/*
echo "<table border='1'>";
foreach ($dataMasukKaryawan as $key => $value) {
if ($value['Tipe'] == "Kerja") {
echo "<tr>";
echo "<td>" . $value['TanggalKerja'] . "</td>
<td>" . $value['JamMasuk'] . "</td>
<td>" . $value['JamKeluar'] . "</td>
<td>" . $value['Lembur'] . "</td>
<td>" . $value['UangLembur'] . "</td>";
echo "</tr>";
}
}
echo "</table>";
echo "lembur kerja: " . $totallemburkerja;
echo "uang kehadiran: " . $totaluangkehadiran;

echo "<table border='1'>";
foreach ($dataAbsenKaryawan as $key => $value) {

echo "<tr>";
echo "<td>" . $value['TanggalKerja'] . "</td>
<td>" . $value['Hari'] . "</td>";
echo "</tr>";

}
echo "</table>";
echo "jumlah absen: " . $jumlahabsen;
echo "potongan absen: " . $totalpotonganabsen;

echo "<table border='1'>";
foreach ($dataMasukKaryawan as $key => $value) {
if ($value['Tipe'] == "Libur") {
echo "<tr>";
echo "<td>" . $value['TanggalKerja'] . "</td>
<td>" . $value['JamMasuk'] . "</td>
<td>" . $value['JamKeluar'] . "</td>
<td>" . $value['Lembur'] . "</td>
<td>" . $value['UangLembur'] . "</td>";
echo "</tr>";
}
}
echo "</table>";
echo "lembur libur: " . $totallemburlibur;

//print_r($dataMasukKaryawan);

echo "bruto: " . $bruto;
 */

		$data['data_totallemburkerja'] = $totallemburkerja;
		$data['data_totallemburlibur'] = $totallemburlibur;
		$data['data_totaluangkehadiran'] = $totaluangkehadiran;
		$data['data_gaji'] = $gaji;
		$data['data_uangjabatan'] = $uangjabatan;
		$data['data_bruto'] = $bruto;

		$hasilpotongankesehatan = $bruto * ($persentasekesehatan / 100);
		$hasilpotonganketenagakerjaan = $bruto * ($persentaseketenagakerjaan / 100);

		$tanggalLahir = $this->karyawan_model->karyawan(array('id'=>$id_karyawan))->result()[0]->tanggal_lahir;
		$bday = new DateTime(date('d-m-Y', strtotime($tanggalLahir))); // Your date of birth
		$today = new Datetime(date('d-m-Y'));
		$diff = $today->diff($bday);
		if($diff->y<57){
			$hasilpotonganpensiun = $bruto * ($persentasepensiun / 100);
		}

		$realGaji=$bruto;
		$realGaji = $realGaji - $hasilpotongankesehatan;
		$realGaji = $realGaji - $hasilpotonganketenagakerjaan;
		$realGaji = $realGaji - $hasilpotonganpensiun;
		$realGaji = $realGaji - $totalpotonganabsen;
		
		$data['data_totalpotonganabsen'] = $totalpotonganabsen;
		$data['data_hasilpotongankesehatan'] = $hasilpotongankesehatan;
		$data['data_hasilpotonganketenagakerjaan'] = $hasilpotonganketenagakerjaan;
		$data['data_hasilpotonganpensiun'] = $hasilpotonganpensiun;
		$data['data_realgaji']=$realGaji;
		$this->load->view('backend/print_slip_gaji', $data);
		}


		
	}

	private function getDatefromMonthYear($month, $year) {
		$list = array();

		for ($d = 1; $d <= 31; $d++) {
			$time = mktime(12, 0, 0, $month, $d, $year);
			if (date('m', $time) == $month) {
				//$list[] = date('Y-m-d-D', $time);
				$day = date('D', $time);
				if ($day != 'Sun' && $day != 'Sat') {
					//echo $day . "<br>";
					$list[] = date('d-m-Y', $time);
				}

			}

		}

		return $list;
	}

	private function getSaturdaySundayfromMonthYear($month, $year) {
		$list = array();

		for ($d = 1; $d <= 31; $d++) {
			$time = mktime(12, 0, 0, $month, $d, $year);
			if (date('m', $time) == $month) {
				//$list[] = date('Y-m-d-D', $time);
				$day = date('D', $time);
				if ($day == 'Sun' || $day == 'Sat') {
					//echo $day . "<br>";
					$list[] = date('d-m-Y', $time);
				}

			}

		}

		return $list;
	}

	public function exinputdatakaryawan1bulan() {
		foreach ($this->getDatefromMonthYear(3, 2019) as $key => $value) {
			# code...
			echo "Data karyawan pada tanggal " . $value . " dimasukan!<br>";
			//$this->absensi_model->addabsensilengkap(1, $value . ' 07:35:00', $value . ' 17:21:00');
		}

		 $datestring = 'Year: %Y Month: %m Day: %d - %H:%i';
		$time = time();
		echo mdate($datestring, now());
	}

	public function rincian_gaji() {
		$id_karyawan = $this->input->post('karyawan');
		$month = $this->input->post('bulan');
		$year = $this->input->post('tahun');

		$month = date('m',strtotime($month));
		$month = (int)$month;

		if(!empty($id_karyawan) && !empty($month) && !empty($year)){

		

		$id_jabatan = $this->karyawan_model->karyawan(array('id' => $id_karyawan))->result()[0]->jabatan;
		$gaji = $this->gaji_model->gaji(array('jabatan' => $id_jabatan))->result()[0]->gaji;
		$uangjabatan = $this->tunjangan_model->tunjanganjabatan(array('jabatan' => $id_jabatan))->result()[0]->jumlah_tunjangan;

		$bruto = 0;

		$harimasukkerjaKaryawan = $this->absensi_model->harimasukkerja($id_karyawan, $month, $year);
		$harimasukkerja = $this->getDatefromMonthYear($month, $year);
		$harimasuklibur = $this->getSaturdaySundayfromMonthYear($month, $year);

		$uanglemburkerja = $this->tunjangan_model->tunjanganlemburkerja()->result()[0]->jumlah_tunjangan;
		$uanglemburlibur = $this->tunjangan_model->tunjanganlemburlibur()->result()[0]->jumlah_tunjangan;
		$uangkehadiran = $this->tunjangan_model->tunjangankehadiran()->result()[0]->jumlah_tunjangan;

		$uangabsen = $this->potongan_model->potonganabsen()->result()[0]->jumlah_potongan;

		$persentasekesehatan = $this->potongan_model->potongankesehatan()->result()[0]->jumlah_potongan;
		$persentaseketenagakerjaan = $this->potongan_model->potonganketenagakerjaan()->result()[0]->jumlah_potongan;
		$persentasepensiun = $this->potongan_model->potonganpensiun()->result()[0]->jumlah_potongan;

		$totallemburkerja = 0;
		$totallemburlibur = 0;
		$totaluangkehadiran = 0;
		$totalpotonganabsen = 0;

		$dataMasukKaryawan = array();

		foreach ($harimasukkerjaKaryawan->result() as $key => $value) {
			if (in_array($value->TanggalKerja, $harimasukkerja)) {

				$hari = date('D', strtotime($value->TanggalKerja));
				$jam1 = new DateTime($this->default_jamkeluar);
				$jam2 = new DateTime($value->JamKeluar);

				$diffjamlemburkerja = $jam2->diff($jam1);

				$jumlahlembursehari = $diffjamlemburkerja->h * $uanglemburkerja;
				$totallemburkerja = $totallemburkerja + $jumlahlembursehari;
				$totaluangkehadiran = $totaluangkehadiran + $uangkehadiran;

				$dataMasukKaryawan[$key]['TanggalKerja'] = $value->TanggalKerja;
				$dataMasukKaryawan[$key]['Hari'] = $hari;
				$dataMasukKaryawan[$key]['Tipe'] = 'Kerja';
				$dataMasukKaryawan[$key]['JamMasuk'] = $value->JamMasuk;
				$dataMasukKaryawan[$key]['JamKeluar'] = $value->JamKeluar;
				$dataMasukKaryawan[$key]['Lembur'] = $diffjamlemburkerja->h;
				$dataMasukKaryawan[$key]['UangLembur'] = $jumlahlembursehari;

			} else if (in_array($value->TanggalKerja, $harimasuklibur)) {

				$hari = date('D', strtotime($value->TanggalKerja));
				$jam1 = new DateTime($value->JamMasuk);
				$jam2 = new DateTime($value->JamKeluar);
				$diffjamlemburlibur = $jam2->diff($jam1);

				if ($hari == "Sat") {
					$jumlahlembursehari = (1 * $uanglemburlibur) + (($diffjamlemburlibur->h - 1) * 2 * $uanglemburlibur);
				} else if ($hari == "Sun") {
					$jumlahlembursehari = (($diffjamlemburlibur->h) * 2 * $uanglemburlibur);
				}

				$totallemburlibur = $totallemburlibur + $jumlahlembursehari;

				$diffjamlemburkerja = $jam2->diff($jam1);
				$dataMasukKaryawan[$key]['TanggalKerja'] = $value->TanggalKerja;
				       $dataMasukKaryawan[$key]['Hari'] = $hari;
				$dataMasukKaryawan[$key]['Tipe'] = 'Libur';
				$dataMasukKaryawan[$key]['JamMasuk'] = $value->JamMasuk;
				$dataMasukKaryawan[$key]['JamKeluar'] = $value->JamKeluar;
				$dataMasukKaryawan[$key]['Lembur'] = $diffjamlemburlibur->h;
				$dataMasukKaryawan[$key]['UangLembur'] = $jumlahlembursehari;

				//echo "<td>" . $value->TanggalKerja . "</td><td>" . $value->JamMasuk . "</td><td>" . $value->JamKeluar . "</td><td>" . $diffjamlemburlibur->h . "</td>";

			}

		}

		$dataAbsenKaryawan = array();
		$jumlahabsen = 0;
		foreach ($harimasukkerja as $key => $value) {

			$absen = TRUE;
			foreach ($harimasukkerjaKaryawan->result() as $key2 => $value2) {
				if ($value2->TanggalKerja == $value) {
					$absen = FALSE;
				}
			}

			if ($absen == TRUE) {
				$jumlahabsen = $jumlahabsen + 1;
				$hari = date('D', strtotime($value));
				$dataAbsenKaryawan[$key]['TanggalKerja'] = $value;
				$dataAbsenKaryawan[$key]['Hari'] = $hari;
			}
		}

		$totalpotonganabsen = $jumlahabsen * $uangabsen;
		$bruto = $totallemburkerja + $totallemburlibur + $totaluangkehadiran + $gaji + $uangjabatan;

		$data['data_AbsenKaryawan'] = $dataAbsenKaryawan;
		$data['data_MasukKaryawan'] = $dataMasukKaryawan;
		$data['data_harimasukkerja'] = $harimasukkerja;
		$data['data_harimasuklibur'] = $harimasuklibur;
		$data['default_jamkeluar'] = $this->default_jamkeluar;

/*
echo "<table border='1'>";
foreach ($dataMasukKaryawan as $key => $value) {
if ($value['Tipe'] == "Kerja") {
echo "<tr>";
echo "<td>" . $value['TanggalKerja'] . "</td>
<td>" . $value['JamMasuk'] . "</td>
<td>" . $value['JamKeluar'] . "</td>
<td>" . $value['Lembur'] . "</td>
<td>" . $value['UangLembur'] . "</td>";
echo "</tr>";
}
}
echo "</table>";
echo "lembur kerja: " . $totallemburkerja;
echo "uang kehadiran: " . $totaluangkehadiran;

echo "<table border='1'>";
foreach ($dataAbsenKaryawan as $key => $value) {

echo "<tr>";
echo "<td>" . $value['TanggalKerja'] . "</td>
<td>" . $value['Hari'] . "</td>";
echo "</tr>";

}
echo "</table>";
echo "jumlah absen: " . $jumlahabsen;
echo "potongan absen: " . $totalpotonganabsen;

echo "<table border='1'>";
foreach ($dataMasukKaryawan as $key => $value) {
if ($value['Tipe'] == "Libur") {
echo "<tr>";
echo "<td>" . $value['TanggalKerja'] . "</td>
<td>" . $value['JamMasuk'] . "</td>
<td>" . $value['JamKeluar'] . "</td>
<td>" . $value['Lembur'] . "</td>
<td>" . $value['UangLembur'] . "</td>";
echo "</tr>";
}
}
echo "</table>";
echo "lembur libur: " . $totallemburlibur;

//print_r($dataMasukKaryawan);

echo "bruto: " . $bruto;
 */

		$data['data_totallemburkerja'] = $totallemburkerja;
		$data['data_totallemburlibur'] = $totallemburlibur;
		$data['data_totaluangkehadiran'] = $totaluangkehadiran;
		$data['data_gaji'] = $gaji;
		$data['data_uangjabatan'] = $uangjabatan;
		$data['data_bruto'] = $bruto;

		$hasilpotongankesehatan = $bruto * ($persentasekesehatan / 100);
		$hasilpotonganketenagakerjaan = $bruto * ($persentaseketenagakerjaan / 100);

		$tanggalLahir = $this->karyawan_model->karyawan(array('id'=>$id_karyawan))->result()[0]->tanggal_lahir;
		$bday = new DateTime(date('d-m-Y', strtotime($tanggalLahir))); // Your date of birth
		$today = new Datetime(date('d-m-Y'));
		$diff = $today->diff($bday);
		if($diff->y<57){
			$hasilpotonganpensiun = $bruto * ($persentasepensiun / 100);
		}

		$realGaji=$bruto;
		$realGaji = $realGaji - $hasilpotongankesehatan;
		$realGaji = $realGaji - $hasilpotonganketenagakerjaan;
		$realGaji = $realGaji - $hasilpotonganpensiun;
		$realGaji = $realGaji - $totalpotonganabsen;
		
		$data['data_totalpotonganabsen'] = $totalpotonganabsen;
		$data['data_hasilpotongankesehatan'] = $hasilpotongankesehatan;
		$data['data_hasilpotonganketenagakerjaan'] = $hasilpotonganketenagakerjaan;
		$data['data_hasilpotonganpensiun'] = $hasilpotonganpensiun;
		$data['data_realgaji']=$realGaji;

		$this->load->view('backend/rincian_gaji', $data);
		}else{
			redirect(base_url('penggajian'));
			
		}
	}
	

}