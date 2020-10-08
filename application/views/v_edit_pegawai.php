<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-8">
			<h1>Data Pegawai</h1>
			<?php 
			foreach($pegawai as $row){
			?>
			<form class="form-horizontal" action="<?php echo base_url(). 'index.php/pegawai/update'; ?>" method="post">
			  <div class="form-group row">
          <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nip" value="<?php echo $row->nip ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama" value="<?php echo $row->nama ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jabatan" value="<?php echo $row->jabatan ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="alamat" value="<?php echo $row->alamat ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="no_hp" class="col-sm-3 col-form-label">no hp</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_hp" value="<?php echo $row->no_hp ?>">
                </div>
              </div>
              <button type="submit" class="btn btn-danger">Perbarui</button> | <a href="<?php echo base_url();?>index.php/pegawai" class="btn btn-success">Kembali</a>
          	</form>

          <?php } ?>
		</div>
		<div class="col-lg-2">
			
		</div>
	</div>
</div>