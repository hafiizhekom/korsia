<?php $this->load->view('header');?>


        <script type="text/javascript">
            function ubahTunjanganJabatan(index){
                $('#editTunjanganJabatanModal').modal('show');
                $('input[name=edit_id]').val($('table').bootstrapTable('getData')[index].id);
                $('input[name=edit_tunjanganjabatan]').val($('table').bootstrapTable('getData')[index].tunjanganjabatan);
            }


            function formatubahTunjanganJabatan(value, row, index) {
              return [
              "<button class='btn btn-warning' onclick='ubahTunjanganJabatan(",index,")'>Ubah</button>"
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

        	<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Tunjangan Jabatan</h5>
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
        					<th data-field='tunjanganjabatan'>
        						TunjanganJabatan
        					</th>
                            <th data-formatter='formatubahTunjanganJabatan'>
                                Tindakan
                            </th>
        				</tr>
        			</thead>
        			<?php
foreach ($data_tunjanganjabatan->result() as $key => $value) {
	$jabatan = $this->jabatan_model->jabatan(array('id' => $value->jabatan))->result()[0]->nama_jabatan;
	echo "<tr><td></td><td>" . $value->id . "</td><td>" . $value->jabatan . "</td><td>" . $jabatan . "</td><td>" . $value->jumlah_tunjangan . "</td><td></td></tr>";
}
?>
        		</table>
                </div>
            </div>
        	</div>


        </div>

        <div class="modal" id="editTunjanganJabatanModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Edit Tunjangan Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="POST" action="<?=base_url('tunjangan/jabatan')?>">
                        <div class="form-group">
                                <label>Tunjangan Jabatan: </label>
                                <input type="number" class="form-control" name="edit_tunjanganjabatan" required="">
                        </div>
                        <input type="hidden" name="edit_id" value="">
                        <input type="submit" name="editTunjanganJabatan" value="Simpan" class="btn btn-primary btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>


<?php $this->load->view('footer');?>

