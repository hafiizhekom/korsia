<?php $this->load->view('header'); ?>
    

        <script type="text/javascript">
            function ubahJabatan(index){
                $('#editJabatanModal').modal('show');
                $('input[name=edit_id]').val($('table').bootstrapTable('getData')[index].id);
                $('input[name=edit_jabatan]').val($('table').bootstrapTable('getData')[index].jabatan);
            }

            function deleteJabatan(index){
                $('#deleteJabatanModal').modal('show');
                $('input[name=delete_id]').val($('table').bootstrapTable('getData')[index].id);
                $('span#delete_nama_jabatan').text($('table').bootstrapTable('getData')[index].jabatan);
            }

            function formatubahJabatan(value, row, index) {
              return [
              "<button class='btn btn-warning' onclick='ubahJabatan(",index,")'>Ubah</button>",
              "<button class='btn btn-danger' onclick='deleteJabatan(",index,")'>Delete</button>"
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
                        <h5>Data Jabatan</h5>
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
        					<th data-field='jabatan'>
        						Jabatan
        					</th>
                            <th data-formatter='formatubahJabatan'>
                                Tindakan
                            </th>
        				</tr>
        			</thead>
        			<?php
        				foreach ($jabatan->result() as $key => $value) {
        					echo "<tr><td></td><td>".$value->id."</td><td>".$value->nama_jabatan."</td><td></td></tr>";
        				}
        			?>
        		</table>
                </div>
            </div>
        	</div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Penambahan Jabatan</h5>
                    </div>
                    <div class="card-body">
                <form method="POST" action="<?=base_url('jabatan')?>">

                    <div class="form-group">
                        <label>Jabatan: </label>
                        <input type="text" name="jabatan" class="form-control" required="">
                    </div>  
                    <input type="submit" name="addJabatan" value="Simpan" class="btn btn-primary btn-block">
                    
                </form>
                    </div>
                </div>
            </div>  

        </div>


        <div class="modal" id="deleteJabatanModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Hapus Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin akan menghapus jabatan <span id="delete_nama_jabatan"></span> ?

                <form method="POST" action="<?=base_url('jabatan')?>">
                    <input type="hidden" name="delete_id" value="">
                    <input type="submit" name="deleteJabatan" value="Hapus" class="btn btn-danger btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal" id="editJabatanModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Edit Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <form method="POST" action="<?=base_url('jabatan')?>">
                        <div class="form-group">
                                <label>Jabatan: </label>
                                <input type="text" class="form-control" name="edit_jabatan" required="">
                        </div>
                        <input type="hidden" name="edit_id" value="">
                        <input type="submit" name="editJabatan" value="Simpan" class="btn btn-primary btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>
 
   
<?php $this->load->view('footer'); ?>

     