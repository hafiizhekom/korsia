<?php $this->load->view('header'); ?>
    

        <script type="text/javascript">
            function ubahStatus(index){
                $('#editStatusModal').modal('show');
                $('input[name=edit_id]').val($('table').bootstrapTable('getData')[index].id);
                $('input[name=edit_status]').val($('table').bootstrapTable('getData')[index].status);
            }

            function deleteStatus(index){
                $('#deleteStatusModal').modal('show');
                $('input[name=delete_id]').val($('table').bootstrapTable('getData')[index].id);
                $('span#delete_nama_status').text($('table').bootstrapTable('getData')[index].status);
            }

            function formatubahStatus(value, row, index) {
              return [
              "<button class='btn btn-warning' onclick='ubahStatus(",index,")'>Ubah</button>",
              "<button class='btn btn-danger' onclick='deleteStatus(",index,")'>Delete</button>"
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
                        <h5>Data Status</h5>
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
        					<th data-field='status'>
        						Status
        					</th>
                            <th data-formatter='formatubahStatus'>
                                Tindakan
                            </th>
        				</tr>
        			</thead>
        			<?php
        				foreach ($status->result() as $key => $value) {
        					echo "<tr><td></td><td>".$value->id."</td><td>".$value->nama_status."</td><td></td></tr>";
        				}
        			?>
        		</table>
                </div>
            </div>
        	</div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Penambahan Status</h5>
                    </div>
                    <div class="card-body">
                <form method="POST" action="<?=base_url('status')?>">

                    <div class="form-group">
                        <label>Status: </label>
                        <input type="text" name="status" class="form-control" required="">
                    </div>  
                    <input type="submit" name="addStatus" value="Simpan" class="btn btn-primary btn-block">
                    
                </form>
                    </div>
                </div>
            </div>  

        </div>


        <div class="modal" id="deleteStatusModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Hapus Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin akan menghapus status <span id="delete_nama_status"></span> ?

                <form method="POST" action="<?=base_url('status')?>">
                    <input type="hidden" name="delete_id" value="">
                    <input type="submit" name="deleteStatus" value="Hapus" class="btn btn-danger btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal" id="editStatusModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Edit Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <form method="POST" action="<?=base_url('status')?>">
                        <div class="form-group">
                                <label>Status: </label>
                                <input type="text" class="form-control" name="edit_status" required="">
                        </div>
                        <input type="hidden" name="edit_id" value="">
                        <input type="submit" name="editStatus" value="Simpan" class="btn btn-primary btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>
 
   
<?php $this->load->view('footer'); ?>

     