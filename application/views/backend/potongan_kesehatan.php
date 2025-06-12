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
                        <h5>Data Potongan Kesehatan</h5>
                    </div>
                    <div class="card-body">
                		<form method="POST" action="<?=base_url('potongan/kesehatan')?>">
                                <div class="input-group mb-3">
                                        <label>Potongan Kesehatan:</label>
                                        <input type="number" min="0" max="100" class="form-control" name="addedit_potongankesehatan" required="" value="<?php
if ($data_potongankesehatan->num_rows() > 0) {
	echo $data_potongankesehatan->result()[0]->jumlah_potongan;
}?>">
<div class="input-group-append">
    <span class="input-group-text" id="persen-addon">%</span>
  </div>
                                </div>

                                <input type="submit" name="addeditPotonganKesehatan" value="Simpan" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
        	</div>


        </div>


<?php $this->load->view('footer');?>

