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
                        <h5>Data Potongan Pensiun</h5>
                    </div>
                    <div class="card-body">
                		<form method="POST" action="<?=base_url('potongan/pensiun')?>">
                                <div class="input-group mb-3">
                                        <label>Potongan Pensiun:</label>
                                        <input type="number" min="0" max="100" class="form-control" name="addedit_potonganpensiun" required="" value="<?php
if ($data_potonganpensiun->num_rows() > 0) {
	echo $data_potonganpensiun->result()[0]->jumlah_potongan;
}?>">
<div class="input-group-append">
    <span class="input-group-text" id="persen-addon">%</span>
  </div>
                                </div>

                                <input type="submit" name="addeditPotonganPensiun" value="Simpan" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
        	</div>


        </div>


<?php $this->load->view('footer');?>

