<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-8">
			<h1>Data Sekolah</h1>
			<?php 
			foreach($skul as $row){
			?>
      <?php echo form_open_multipart('sekolah/update');?>
			  <div class="form-group row">
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_sekolah" value="<?php echo $row->id_sekolah ?>" hidden>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_sekolah" class="col-sm-3 col-form-label">Nama Sekolah</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_sekolah" value="<?php echo $row->nama_sekolah ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat_sekolah" class="col-sm-3 col-form-label">Alamat Sekolah</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="alamat_sekolah" value="<?php echo $row->alamat_sekolah ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="kabupaten_sekolah" class="col-sm-3 col-form-label">Kabupaten Sekolah</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kabupaten_sekolah" value="<?php echo $row->kabupaten_sekolah ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_kepsek" class="col-sm-3 col-form-label">Nama Kepala Sekolah</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_kepsek" value="<?php echo $row->nama_kepsek ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="nip_kepsek" class="col-sm-3 col-form-label">NIP Kepala Sekolah</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nip_kepsek" value="<?php echo $row->nip_kepsek ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="pangkat" class="col-sm-3 col-form-label">Pangkat / Gol</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="pangkat" value="<?php echo $row->pangkat ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="logo" class="col-sm-3 col-form-label">Logo</label>
                <div class="col-sm-6">
                  <input type="file" class="form-control" name="logo">
                </div>
              </div>
              <button type="submit" value="upload" class="btn btn-danger">Perbarui</button> | <a href="<?php echo base_url();?>index.php/sekolah" class="btn btn-success">Kembali</a>
          	</form>

          <?php } ?>
		</div>
		<div class="col-lg-2">
			
		</div>
	</div>
</div>