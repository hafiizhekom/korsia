<?php $this->load->view('header');?>




        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <!--<li class="breadcrumb-item active">User</li>-->
        </ol>

        <div class="row">

        	<div class="col-md-6">
            <div class="card">
                    <div class="card-header">
                        <h5>Print Data Gaji</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?=base_url('penggajian/slip_gaji');?>">
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

                              
                            <div class="form-group">
                            <label>Bulan: </label>
                                  <div class="date form_date_month" data-date-format="MM">
                                    <input class="form-control" type="text" value="" name="bulan" placeholder="Tanggal Awal" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                            <label>Tahun: </label>
                                <div class="date form_date_year" data-date-format="yyyy">
                                    <input class="form-control" type="text" value="" name="tahun" placeholder="Tanggal Akhir" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                                

                              <input type="submit" class="btn btn-primary btn-block" value="Print">

                        </form>

                    </div>
                </div>

            </div>
            
            <div class="col-md-6">
            <div class="card">
                    <div class="card-header">
                        <h5>Data Rincian Gaji</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?=base_url('penggajian/rincian_gaji');?>">
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

                              
                            <div class="form-group">
                            <label>Bulan: </label>
                                  <div class="date form_date_month" data-date-format="MM">
                                    <input class="form-control" type="text" value="" name="bulan" placeholder="Tanggal Awal" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                            <label>Tahun: </label>
                                <div class="date form_date_year" data-date-format="yyyy">
                                    <input class="form-control" type="text" value="" name="tahun" placeholder="Tanggal Akhir" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                                

                              <input type="submit" class="btn btn-primary btn-block" value="Cari">

                        </form>

                    </div>
                </div>

        	</div>

        </div>




<?php $this->load->view('footer');?>

