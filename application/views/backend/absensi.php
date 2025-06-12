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
                        <h5>Data Absensi</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?=base_url('absensi');?>">
                            <div class="form-group">
                                <label>Karyawan: </label>
                                <select class="form-control" name="karyawan">
                                    <option selected="" disabled="">Pilih Karyawan</option>
                                    <?php
foreach ($data_karyawan->result() as $key => $value) {
	echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
}
?>
                                </select>
                            </div>

                                <label>Tanggal: </label>
                             <div class="form-row">
                                <div class="col-5">
                                  <div class="date form_date" data-date-format="dd MM yyyy">
                                    <input class="form-control" type="text" value="" name="tanggal_awal" placeholder="Tanggal Awal" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                                </div>
                                <div class="col-2 text-center">
                                    <p style="line-height: 2;"> sampai </p>
                                </div>
                                <div class="col-5">
                                  <div class="date form_date" data-date-format="dd MM yyyy">
                                    <input class="form-control" type="text" value="" name="tanggal_akhir" placeholder="Tanggal Akhir" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                                </div>
                              </div>

                              <input type="submit" class="btn btn-primary btn-block" value="Cari">

                        </form>

                    </div>
                </div>

                <div class="card">
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
                                    <th data-field='hari'>
                                        Hari
                                    </th>
                					<th data-field='waktu_masuk'>
                						Waktu Masuk
                					</th>
                                    <th data-field='waktu_keluar'>
                                        Waktu Keluar
                                    </th>
                                    <th data-field='jumlah_waktu'>
                                        Jumlah Waktu
                                    </th>
                				</tr>
                			</thead>
                            <?php
foreach ($data_absensi->result() as $key => $value) {
	$hari = $value->Hari;
	$jam1 = new DateTime($value->JamMasuk);
	$jam2 = new DateTime($value->JamKeluar);
	$totalJamKerja = $jam2->diff($jam1);
	echo "<tr><td></td><td>" . $value->TanggalKerja . "</td><td>" . $hari . "</td><td>" . $value->JamMasuk . "</td><td>" . $value->JamKeluar . "</td><td>" . $totalJamKerja->h . " Jam " . $totalJamKerja->i . " Menit</td></tr>";
}
?>
                		</table>
                    </div>
                </div>
        	</div>

        </div>




<?php $this->load->view('footer');?>

