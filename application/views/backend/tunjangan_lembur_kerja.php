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
                        <h5>Data Tunjangan Lembur Kerja</h5>
                    </div>
                    <div class="card-body">
                		<form method="POST" action="<?=base_url('tunjangan/lembur_kerja')?>">
                                <div class="form-group">
                                        <label>Tunjangan Lembar Kerja:
                                            </label>
                                        <input type="number" class="form-control" name="addedit_tunjanganlemburkerja" required="" value="<?php
if ($data_tunjanganlemburkerja->num_rows() > 0) {
	echo $data_tunjanganlemburkerja->result()[0]->jumlah_tunjangan;
}?>">
                                </div>
                                <input type="submit" name="addeditTunjanganLemburKerja" value="Simpan" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
        	</div>


        </div>


<?php $this->load->view('footer');?>

