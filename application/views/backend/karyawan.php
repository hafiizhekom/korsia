<?php $this->load->view('header'); ?>

<script type="text/javascript">
    function ubahKaryawan(index){
        $('#ubahKaryawanModal').modal('show');
        $('input[name=edit_id]').val($('table').bootstrapTable('getData')[index].id);
        $('input[name=edit_nama]').val($('table').bootstrapTable('getData')[index].nama);
        $('input[name=edit_tanggal_lahir]').val($('table').bootstrapTable('getData')[index].tanggal_lahir);
        $('select[name=edit_jenis_kelamin]').val($('table').bootstrapTable('getData')[index].jenis_kelamin[0]);
        $('select[name=edit_status]').val($('table').bootstrapTable('getData')[index].id_status);
        $('input[name=edit_npwp]').val($('table').bootstrapTable('getData')[index].npwp);
        $('select[name=edit_jabatan]').val($('table').bootstrapTable('getData')[index].id_jabatan);
        $('select[name=edit_departemen]').val($('table').bootstrapTable('getData')[index].id_departemen);
        $('input[name=edit_no_rekening]').val($('table').bootstrapTable('getData')[index].no_rekening);
        $('input[name=edit_tanggal_masuk]').val($('table').bootstrapTable('getData')[index].tanggal_masuk);
    }

    function deleteKaryawan(index){
        $('#deleteKaryawanModal').modal('show');
        $('input[name=delete_id]').val($('table').bootstrapTable('getData')[index].id);
        $('span#delete_nama_karyawann').text($('table').bootstrapTable('getData')[index].nama);
    }

    function formatubahKaryawan(value, row, index) {
      return [
      "<button class='btn btn-warning' onclick='ubahKaryawan(",index,")'>Ubah</button>",
      "<button class='btn btn-danger' onclick='deleteKaryawan(",index,")'>Delete</button>"
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
                    <div class="card-header"><h5>Form Penambahan Karyawan</h5></div>
                    <div class="card-body">
                        <form method="POST" action="<?=base_url('karyawan')?>">
                            <div class="form-group">
                                <label>Nama Lengkap: </label>
                                <input type="text" class="form-control" name="nama" required="">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir: </label>
                                 <div class="date form_date" data-date-format="dd MM yyyy">
                                    <input class="form-control" type="text" value="" name="tanggal_lahir" placeholder="Klik untuk merubah tanggal" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin: </label>
                                <select class="form-control" name="jenis_kelamin" required="">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status: </label>
                                <select class="form-control" name="status" required="">
                                    <?php


                                    foreach ($status->result() as $key => $value) {
                                        echo "<option value='".$value->id."'>".$value->nama_status."</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>NPWP: </label>
                                <input type="text" class="form-control" name="npwp">
                            </div>

                            <div class="form-group">
                                <label>Jabatan: </label>
                                <select class="form-control" name="jabatan" required="">
                                    <?php


                                    foreach ($jabatan->result() as $key => $value) {
                                        echo "<option value='".$value->id."'>".$value->nama_jabatan."</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Departemen: </label>
                                <select class="form-control" name="departemen" required="">
                                    <?php


                                    foreach ($departemen->result() as $key => $value) {
                                        echo "<option value='".$value->id."'>".$value->nama_departemen."</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nomor Rekening: </label>
                                <input type="text" class="form-control" name="no_rekening">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Masuk: </label>
                                 <div class="date form_date" data-date-format="dd MM yyyy">
                                    <input class="form-control" type="text" value="" name="tanggal_masuk" placeholder="Klik untuk merubah tanggal" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>

                            <input type="submit" name="addKaryawan" value="Simpan" class="btn btn-primary btn-block">
                        </form>


                    </div>
                </div>
            </div>

        	<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Karyawan</h5>
                    </div>
                    <div class="card-body">
                		<table class="table" data-search="true" data-show-toggle="true" data-show-columns="true"  data-pagination="true" data-show-fullscreen="true" data-id-field="id">
                			<thead>
                				<tr>
                                    <th data-formatter='nomor' data-field='nomor'>
                                        #
                                    </th>
                                    <th data-field='id' data-visible='false'>
                                        ID
                                    </th>
                					<th data-field='nama'  data-width="170">
                						Nama
                					</th>
                					<th data-field='tanggal_lahir'>
                						Tanggal Lahir
                					</th>
                                    <th data-field='jenis_kelamin'>
                                        Jenis Kelamin
                                    </th>
                                    <th data-field='status'>
                                        Status
                                    </th>
                                    <th data-field='npwp'>
                                        NPWP
                                    </th>
                                    <th data-field='jabatan'>
                                        Jabatan
                                    </th>
                                    <th data-field='departemen'>
                                        Departemen
                                    </th>
                                    <th data-field='no_rekening'>
                                        Nomor Rekening
                                    </th>
                                    <th data-field='tanggal_masuk'>
                                        Tanggal Masuk
                                    </th>
                                    <th data-formatter='formatubahKaryawan'>
                                        Tindakan
                                    </th>
                                    <th data-field='id_status' data-visible='false'>
                                        ID_Status
                                    </th>
                                    <th data-field='id_jabatan' data-visible='false'>
                                        ID_Jabatan
                                    </th>
                                    <th data-field='id_departemen' data-visible='false'>
                                        ID_Departemen
                                    </th>
                                    
                				</tr>
                			</thead>
                			<?php
                				foreach ($karyawan->result() as $key => $value) {
                                    if($value->jenis_kelamin=="L"){
                                        $value->jenis_kelamin = "Laki - laki";
                                    }else if($value->jenis_kelamin=="P"){
                                        $value->jenis_kelamin = "Perempuan";
                                    }else{
                                        $value->jenis_kelamin = "Tidak diketahui";
                                    }

                                    $date = new DateTime($value->tanggal_lahir);
                                    $value->tanggal_lahir = $date->format('d F Y');

                                    $date = new DateTime($value->tanggal_masuk);
                                    $value->tanggal_masuk = $date->format('d F Y');

                                    $id_departemen =$value->departemen;
                                    $namadepartemen = $this->departemen_model->departemen(array('id' => $value->departemen))->result()[0]->nama_departemen;

                                    $id_jabatan = $value->jabatan;
                                    $namajabatan = $this->jabatan_model->jabatan(array('id' => $value->jabatan))->result()[0]->nama_jabatan;

                                    $id_status = $value->status;
                                    $namastatus = $this->status_model->status(array('id' => $value->status))->result()[0]->nama_status;

                					echo   "<tr>
                                                <td></td>
                                                <td>".$value->id."</td>
                                                <td>".$value->nama."</td>
                                                <td>".$value->tanggal_lahir."</td>
                                                <td>".$value->jenis_kelamin."</td>
                                                <td>".$namastatus."</td>
                                                <td>".$value->npwp."</td>
                                                <td>".$namajabatan."</td>
                                                <td>".$namadepartemen."</td>
                                                <td>".$value->no_rekening."</td>
                                                <td>".$value->tanggal_masuk."</td>
                                                <td></td>
                                                <td>".$id_status."</td>
                                                <td>".$id_jabatan."</td>
                                                <td>".$value->departemen."</td>
                                            </tr>";
                				}
                			?>
                		</table>
                    </div>
                </div>
        	</div>

        </div>


        <div class="modal" id="ubahKaryawanModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Ubah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="<?=base_url('karyawan')?>">

                            <div class="form-group">
                                <label>Nama Lengkap: </label>
                                <input type="text" class="form-control" name="edit_nama" required="">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir: </label>
                                 <div class="date form_date" data-date-format="dd MM yyyy">
                                    <input class="form-control" type="text" value="" name="edit_tanggal_lahir" placeholder="Klik untuk merubah tanggal" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin: </label>
                                <select class="form-control" name="edit_jenis_kelamin" required="">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status: </label>
                                <select class="form-control" name="edit_status" required="">
                                    <?php


                                    foreach ($status->result() as $key => $value) {
                                        echo "<option value='".$value->id."'>".$value->nama_status."</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>NPWP: </label>
                                <input type="text" class="form-control" name="edit_npwp">
                            </div>

                            <div class="form-group">
                                <label>Jabatan: </label>
                                <select class="form-control" name="edit_jabatan" required="">
                                    <?php


                                    foreach ($jabatan->result() as $key => $value) {
                                        echo "<option value='".$value->id."'>".$value->nama_jabatan."</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Departemen: </label>
                                <select class="form-control" name="edit_departemen" required="">
                                    <?php


                                    foreach ($departemen->result() as $key => $value) {
                                        echo "<option value='".$value->id."'>".$value->nama_departemen."</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nomor Rekening: </label>
                                <input type="text" class="form-control" name="edit_no_rekening">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Masuk: </label>
                                 <div class="date form_date" data-date-format="dd MM yyyy">
                                    <input class="form-control" type="text" value="" name="edit_tanggal_masuk" placeholder="Klik untuk merubah tanggal" readonly required="">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                            <input type="hidden" name="edit_id" value="">
                            <input type="submit" name="editKaryawan" value="Simpan" class="btn btn-primary btn-block">
                        </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal" id="deleteKaryawanModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title-editItem">Hapus Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin akan menghapus <span id="delete_nama_karyawann"></span> ?
                <form method="POST" action="<?=base_url('karyawan')?>">
                    <input type="hidden" name="delete_id" value="">
                    <input type="submit" name="deleteKaryawan" value="Hapus" class="btn btn-danger btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>




 


    
 
   
<?php $this->load->view('footer'); ?>

     