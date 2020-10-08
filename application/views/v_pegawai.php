<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-8">
			<h1>Data Pegawai</h1>
			
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahpegawai">
			  Tambah Pegawai
			</button>
			<br>
			<?php echo validation_errors(); ?>
			<br>
			
			<!-- Modal -->
			<div class="modal fade" id="tambahpegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      
			      <div class="modal-body">
					<?php echo form_open('pegawai/tambah_aksi'); ?>

					  <div class="form-group row">
		          		<label for="nip" class="col-sm-3 col-form-label">NIP</label>
		                <div class="col-sm-9">
		                  <input type="text" class="form-control" name="nip" placeholder="Isi NIP">
		                </div>
		              </div>
		              <div class="form-group row">
		                <label for="nama" class="col-sm-3 col-form-label">Nama </label>
		                <div class="col-sm-9">
		                  <input type="text" class="form-control" name="nama" placeholder="Nama">
		                </div>
		              </div>
		              <div class="form-group row">
		                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
		                <div class="col-sm-9">
		                  <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
		                </div>
		              </div>
		              <div class="form-group row">
		                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
		                <div class="col-sm-9">
		                  <input type="text" class="form-control" name="alamat" placeholder="Alamat">
		                </div>
		              </div>
		              <div class="form-group row">
		                <label for="no_hp" class="col-sm-3 col-form-label">no hp</label>
		                <div class="col-sm-9">
		                  <input type="text" class="form-control" name="no_hp" placeholder="No Handphone">
		                </div>
		              </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <button type="submit" class="btn btn-danger">Tambah</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
			
			<div class="table-responsive">
			<table id="pegawai" class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th>NIP</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Alamat</th>
						<th>No HP</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach($pegawai as $row){
					?>
				<tr>
					<td><?php echo $row->nip; ?></td>
					<td><?php echo $row->nama; ?></td>
					<td><?php echo $row->jabatan; ?></td>
					<td><?php echo $row->alamat; ?></td>
					<td><?php echo $row->no_hp; ?></td>
					<td>
						<?php echo anchor('/pegawai/edit/'.$row->nip,'edit'); ?> |
                        <?php echo anchor('/pegawai/hapus/'.$row->nip,'hapus'); ?>
                    </td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		</div>
		<div class="col-lg-2">
			
		</div>
	</div>
</div>