<?php $this->load->view('header'); ?>


        <script type="text/javascript">
            function ubahUser(index){
                $('#editUserModal').modal('show');
                $('input[name=edit_id]').val($('table').bootstrapTable('getData')[index].id);
                $('input[name=edit_username]').val($('table').bootstrapTable('getData')[index].username);
            }

            function deleteUser(index){
                $('#deleteUserModal').modal('show');
                $('input[name=delete_id]').val($('table').bootstrapTable('getData')[index].id);
                $('span#delete_nama_user').text($('table').bootstrapTable('getData')[index].username);
            }

            function formatubahUser(value, row, index) {
              return [
              "<button class='btn btn-warning' onclick='ubahUser(",index,")'>Ubah Password</button>",
              "<button class='btn btn-danger' onclick='deleteUser(",index,")'>Delete</button>"
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
                        <h5>Data User</h5>
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
        					<th data-field='username'>
        						Username
        					</th>
                            <th data-formatter='formatubahUser'>
                                Tindakan
                            </th>
        				</tr>
        			</thead>
        			<?php
        				foreach ($user->result() as $key => $value) {
        					echo "<tr><td></td><td>".$value->id."</td><td>".$value->username."</td><td></td></tr>";
        				}
        			?>
        		</table>
                    </div>
                </div>
        	</div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Penambahan User</h5>
                    </div>
                    <div class="card-body">
                <form method="POST" action="<?=base_url('user')?>">

                    <div class="form-group">
                        <label>Username: </label>
                        <input type="text" name="username" class="form-control" required="">
                    </div>  
                    <div class="form-group">
                        <label>Password: </label>
                        <input type="password" name="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Ulangi Password: </label>
                        <input type="password" name="password2" class="form-control" required="">
                    </div>
                    <input type="submit" name="addUser" value="Simpan" class="btn btn-primary btn-block">
                    
                </form>
                    </div>
                </div>
            </div>  

        </div>

        <div class="modal" id="deleteUserModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin akan menghapus <span id="delete_nama_user"></span> ?

                <form method="POST" action="<?=base_url('user')?>">
                    <input type="hidden" name="delete_id" value="">
                    <input type="submit" name="deleteUser" value="Hapus" class="btn btn-danger btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal" id="editUserModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Edit Password User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <form method="POST" action="<?=base_url('user')?>">
                        <div class="form-group">
                                <label>Username: </label>
                                <input type="text" class="form-control" name="edit_username" required="" readonly="">
                        </div>
                         <div class="form-group">
                                <label>Password: </label>
                                <input type="password" class="form-control" name="edit_password" required="">
                        </div>
                    <input type="submit" name="editUser" value="Simpan" class="btn btn-primary btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>

        
 
   
<?php $this->load->view('footer'); ?>

     