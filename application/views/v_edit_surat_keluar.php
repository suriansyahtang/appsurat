<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-8">
			<h1>Data Surat Perintah</h1>
			
				<?php 
					foreach($surat_keluar as $row){
					?>
				<form class="form-horizontal" action="<?php echo base_url(). 'index.php/surat_keluar/update'; ?>" method="post">
				  <div class="form-group row">
	                <div class="col-sm-6">
	                  <input type="text" class="form-control" name="id_sk" value="<?php echo $row->id_sk ?>" hidden>
	                </div>
	              </div>
	              <div class="form-group row">
	                <label for="no_surat" class="col-sm-3 col-form-label">No Surat </label>
	                <div class="col-sm-6">
	                  <input type="text" class="form-control" name="no_surat" value="<?php echo $row->no_surat ?>">
	                </div>
	              </div>
	              <div class="form-group row">
	                <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal</label>
	                <div class="col-sm-6">
	                  <input type="date" class="form-control" name="tgl_surat" value="<?php echo $row->tgl_surat ?>">
	                </div>
	              </div>
	              <div class="form-group row">
		                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
		                <div class="col-sm-6">
		                  	<select class="form-control" name="nip">
		                  		<option value="">- PILIH PEGAWAI -</option>
								<?php 
								foreach($join_sk as $a)
								{ 
								echo '<option value="'.$a->nip.'">'.$a->nama.'</option>';
								}
								?>
				            </select>
		                </div>
		              </div>
	              <div class="form-group row">
	                <label for="acara" class="col-sm-3 col-form-label">Acara</label>
	                <div class="col-sm-6">
	                  <textarea class="form-control" name="acara" rows="6"><?php echo $row->acara ?></textarea>
	                </div>
	              </div>
	              <button type="submit" class="btn btn-danger">Perbarui</button> | <a href="<?php echo base_url();?>index.php/surat_keluar" class="btn btn-success">Kembali</a>
	          	</form>
				<?php } ?>
		</div>
		<div class="col-lg-2">
			
		</div>
	</div>
</div>