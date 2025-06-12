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
                        <h5>Data Potongan Absen</h5>
                    </div>
                    <div class="card-body">
                		<form method="POST" action="<?=base_url('potongan/absen')?>">
                                <div class="input-group mb-3">
                                        <label>Potongan Absen:</label>
                                        <input type="number" class="form-control" name="addedit_potonganabsen" required="" value="<?php
if ($data_potonganabsen->num_rows() > 0) {
	echo $data_potonganabsen->result()[0]->jumlah_potongan;
}?>">
                                </div>

                                <input type="submit" name="addeditPotonganAbsen" value="Simpan" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
        	</div>


        </div>


<?php $this->load->view('footer');?>

