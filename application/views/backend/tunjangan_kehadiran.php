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
                        <h5>Data Tunjangan Kehadiran</h5>
                    </div>
                    <div class="card-body">
                		<form method="POST" action="<?=base_url('tunjangan/disiplin')?>">
                                <div class="form-group">
                                        <label>Tunjangan Kehadiran:
                                            </label>
                                        <input type="number" class="form-control" name="addedit_tunjangankehadiran" required="" value="<?php
if ($data_tunjangankehadiran->num_rows() > 0) {
	echo $data_tunjangankehadiran->result()[0]->jumlah_tunjangan;
}?>">
                                </div>
                                <input type="submit" name="addeditTunjanganKehadiran" value="Simpan" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
        	</div>


        </div>


<?php $this->load->view('footer');?>

