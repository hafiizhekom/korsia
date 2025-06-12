<?php $this->load->view('header'); ?>

        <script type="text/javascript">
            function ubahDepartemen(index){
                $('#editDepartemenModal').modal('show');
                $('input[name=edit_id]').val($('table').bootstrapTable('getData')[index].id);
                $('input[name=edit_departemen]').val($('table').bootstrapTable('getData')[index].departemen);
            }

            function deleteDepartemen(index){
                $('#deleteDepartemenModal').modal('show');
                $('input[name=delete_id]').val($('table').bootstrapTable('getData')[index].id);
                $('span#delete_nama_departemen').text($('table').bootstrapTable('getData')[index].departemen);
            }

            function formatubahDepartemen(value, row, index) {
              return [
              "<button class='btn btn-warning' onclick='ubahDepartemen(",index,")'>Ubah</button>",
              "<button class='btn btn-danger' onclick='deleteDepartemen(",index,")'>Delete</button>"
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
                        <h5>Data Departemen</h5>
                    </div>
                    <div class="card-body">
        		<table class="table" data-search="true" data-show-toggle="true" data-show-columns="true"  data-pagination="true" data-show-fullscreen="true" data-id-field="id">
        			<thead>
        				<tr>
        					<th data-formatter='nomor'>
        						#
        					</th>
                            <th data-field='id' data-visible='false'>
                                
                            </th>
        					<th data-field='departemen'>
        						Departemen
        					</th>
                            <th data-formatter='formatubahDepartemen'>
                                Tindakan
                            </th>
        				</tr>
        			</thead>
        			<?php
        				foreach ($departemen->result() as $key => $value) {
        					echo "<tr><td></td><td>".$value->id."</td><td>".$value->nama_departemen."</td><td></td></tr>";
        				}
        			?>
        		</table>
                </div>
            </div>
        	</div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Penambahan Departemen</h5>
                    </div>
                    <div class="card-body">
                <form method="POST" action="<?=base_url('departemen')?>">

                    <div class="form-group">
                        <label>Departemen</label>
                        <input type="text" name="departemen" required="" class="form-control">
                    </div>
                    <input type="submit" name="addDepartemen" value="Simpan" class="btn btn-primary btn-block">

                    
                </form>
                </div>
            </div>
            </div>

        </div>


        <div class="modal" id="deleteDepartemenModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Hapus Departemen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin akan menghapus departemen <span id="delete_nama_departemen"></span> ?

                <form method="POST" action="<?=base_url('departemen')?>">
                    <input type="hidden" name="delete_id" value="">
                    <input type="submit" name="deleteDepartemen" value="Hapus" class="btn btn-danger btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal" id="editDepartemenModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Edit Departemen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <form method="POST" action="<?=base_url('departemen')?>">
                        <div class="form-group">
                                <label>Departemen: </label>
                                <input type="text" class="form-control" name="edit_departemen" required="">
                        </div>
                        <input type="hidden" name="edit_id" value="">
                        <input type="submit" name="editDepartemen" value="Simpan" class="btn btn-primary btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>
 
   
<?php $this->load->view('footer'); ?>

     