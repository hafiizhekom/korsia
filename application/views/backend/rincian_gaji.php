<?php $this->load->view('header');?>




        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <!--<li class="breadcrumb-item active">User</li>-->
        </ol>

        <div class="row">

        	<div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <h5>Data Lembur Kerja</h5>
                    </div>
                    <div class="card-body">
                		<table class="table" data-search="true" data-show-toggle="true" data-show-columns="true"  data-pagination="true" data-show-fullscreen="true" data-id-field="id">
                			<thead>
                				<tr>
                                    <th data-formatter='nomor' data-field='nomor'>
                                        #
                                    </th>
                					<th data-field='tanggal_kerja'>
                						Tanggal Kerja
                					</th>
                					<th data-field='jam_masuk'>
                						Jam Masuk
                					</th>
                                    <th data-field='jam_keluar'>
                                        Jam Keluar
                                    </th>
                                    <th data-field='lembur_kerja'>
                                        Total Jam Lembur
                                    </th>
                                    <th data-field='uang_lembur_kerja'>
                                        Uang Lembur Kerja
                                    </th>
                				</tr>
                			</thead>
                            <?php
foreach ($data_MasukKaryawan as $key => $value) {
	echo "<tr>";
	if ($value['Tipe'] == "Kerja") {
		echo "<td></td><td>" . $value['TanggalKerja'] . "</td><td>" . $value['JamMasuk'] . "</td><td>" . $value['JamKeluar'] . "</td><td>" . $value['Lembur'] . " jam</td><td>".$value['UangLembur']."</td>";
	}
	echo "</tr>";
}
?>
                		</table>

                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5>Data Rincian Gaji</h5>
                    </div>
                    <div class="card-body">
                		<table class="table" data-search="true" data-show-toggle="true" data-show-columns="true"  data-pagination="true" data-show-fullscreen="true" data-id-field="id">
                			<thead>
                				<tr>
                                    <th data-formatter='nomor' data-field='nomor'>
                                        #
                                    </th>
                					<th data-field='tanggal_kerja'>
                						Tanggal Kerja
                					</th>
                					<th data-field='jam_masuk'>
                						Jam Masuk
                					</th>
                                    <th data-field='jam_keluar'>
                                        Jam Keluar
                                    </th>
                                    <th data-field='lembur_kerja'>
                                        Total Jam Lembur
                                    </th>
                                    <th data-field='uang_lembur_kerja'>
                                        Uang Lembur Kerja
                                    </th>
                				</tr>
                			</thead>
                            <?php
foreach ($data_MasukKaryawan as $key => $value) {
	echo "<tr>";
	if ($value['Tipe'] == "Libur") {
		echo "<td></td><td>" . $value['TanggalKerja'] . "</td><td>" . $value['JamMasuk'] . "</td><td>" . $value['JamKeluar'] . "</td><td>" . $value['Lembur'] . " jam</td><td>".$value['UangLembur']."</td>";
	}
	echo "</tr>";
}
?>
                		</table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Data Absen</h5>
                    </div>
                    <div class="card-body">
                		<table class="table" data-search="true" data-show-toggle="true" data-show-columns="true"  data-pagination="true" data-show-fullscreen="true" data-id-field="id">
                			<thead>
                				<tr>
                                    <th data-formatter='nomor' data-field='nomor'>
                                        #
                                    </th>
                					<th data-field='tanggal_kerja'>
                						Tanggal Kerja
                					</th>
                				</tr>
                			</thead>
                            <?php
foreach ($data_AbsenKaryawan as $key => $value) {
	echo "<tr>";
echo "<td></td><td>" . $value['TanggalKerja'] . "</td>";
echo "</tr>";
}
?>
                		</table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Rincian Gaji</h5>
                    </div>
                    <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info">Gaji Pokok: <?=$data_gaji?></li>
                        <li class="list-group-item list-group-item-info">Tunjangan Jabatan: <?=$data_uangjabatan?></li>
                        <li class="list-group-item list-group-item-info">Uang Kehadiran: <?=$data_totaluangkehadiran?></li>
                        <li class="list-group-item list-group-item-info">Lembur Hari Kerja: <?=$data_totallemburkerja?></li>
                        <li class="list-group-item list-group-item-info">Lembur Hari Libur: <?=$data_totallemburlibur?></li>
                        <li class="list-group-item list-group-item-dark">Total Bruto: <?=$data_bruto?></li>
                        <li class="list-group-item list-group-item-danger">Potongan Tunjangan Kesehatan: <?=$data_hasilpotongankesehatan?></li>
                        <li class="list-group-item list-group-item-danger">Potongan Tunjangan KetenagaKerjaan: <?=$data_hasilpotonganketenagakerjaan?></li>
                        <li class="list-group-item list-group-item-danger">Potongan Tunjangan Pensiun: <?=$data_hasilpotonganpensiun?></li>
                        <li class="list-group-item list-group-item-danger">Absen: <?=$data_totalpotonganabsen?></li>
                        <li class="list-group-item list-group-item-success">Gaji: <?=$data_realgaji?></li>
                    </ul>
                    </div>
                </div>

        	</div>

        </div>




<?php $this->load->view('footer');?>

