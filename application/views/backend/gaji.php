<?php $this->load->view('header');?>


        <script type="text/javascript">
            function ubahGaji(index){
                $('#editGajiModal').modal('show');
                $('input[name=edit_id]').val($('table').bootstrapTable('getData')[index].id);
                $('input[name=edit_gaji]').val($('table').bootstrapTable('getData')[index].gaji);
            }

            function deleteGaji(index){
                $('#deleteGajiModal').modal('show');
                $('input[name=delete_id]').val($('table').bootstrapTable('getData')[index].id);
                $('span#delete_nama_gaji').text($('table').bootstrapTable('getData')[index].gaji);
            }

            function formatubahGaji(value, row, index) {
              return [
              "<button class='btn btn-warning' onclick='ubahGaji(",index,")'>Ubah</button>",
              "<button class='btn btn-danger' onclick='deleteGaji(",index,")'>Delete</button>"
              ].join('');
            }
        </script>

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
                        <h5>Data Gaji</h5>
                    </div>
                    <div class="card-body">
        		<table class="table" data-search="true" data-show-toggle="true" data-show-columns="true"  data-pagination="true" data-show-fullscreen="true" data-id-field="id">
        			<thead>
        				<tr>
        					<th data-formatter='nomor'>
        						#
        		  			</th>
                            <th data-field='id' data-visible='false'>
                                ID
                            </th>
                            <th data-field='id_jabatan' data-visible='false'>
                                ID Jabatan
                            </th>
                            <th data-field='jabatan'>
                                Jabatan
                            </th>
        					<th data-field='gaji'>
        						Gaji
        					</th>
                            <th data-formatter='formatubahGaji'>
                                Tindakan
                            </th>
        				</tr>
        			</thead>
        			<?php
foreach ($data_gaji->result() as $key => $value) {
	$jabatan = $this->jabatan_model->jabatan(array('id' => $value->jabatan))->result()[0]->nama_jabatan;
	echo "<tr><td></td><td>" . $value->id . "</td><td>" . $value->jabatan . "</td><td>" . $jabatan . "</td><td>" . $value->gaji . "</td><td></td></tr>";
}
?>
        		</table>
                </div>
            </div>
        	</div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Penambahan Gaji</h5>
                    </div>
                    <div class="card-body">
                <form method="POST" action="<?=base_url('gaji')?>">

                    <div class="form-group">
                        <label>Jabatan: </label>

                        <select class="form-control" name="jabatan" required="">
                            <?php foreach ($data_jabatan->result() as $key => $value) {
	echo "<option value='" . $value->id . "'>" . $value->nama_jabatan . "</option>";
}
?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Gaji: </label>
                        <input type="text" name="gaji" class="form-control" required="">
                    </div>

                    <input type="submit" name="addGaji" value="Simpan" class="btn btn-primary btn-block">

                </form>
                    </div>
                </div>
            </div>

        </div>


        <div class="modal" id="deleteGajiModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Hapus Gaji</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin akan menghapus gaji <span id="delete_nama_gaji"></span> ?

                <form method="POST" action="<?=base_url('gaji')?>">
                    <input type="hidden" name="delete_id" value="">
                    <input type="submit" name="deleteGaji" value="Hapus" class="btn btn-danger btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal" id="editGajiModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Edit Gaji</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="POST" action="<?=base_url('gaji')?>">
                        <div class="form-group">
                                <label>Gaji: </label>
                                <input type="text" class="form-control" name="edit_gaji" required="">
                        </div>
                        <input type="hidden" name="edit_id" value="">
                        <input type="submit" name="editGaji" value="Simpan" class="btn btn-primary btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>


<?php $this->load->view('footer');?>

