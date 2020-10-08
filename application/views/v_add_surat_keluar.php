<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-8">
			<h1>Data Surat Perintah</h1>
			<?php echo validation_errors(); ?>
			<br>
					<?php echo form_open('surat_keluar/tambah_aksi'); ?>

					  <div class="form-group row">
		                <div class="col-sm-9">
		                  <input type="text" class="form-control" name="id_sk" hidden>
		                </div>
		              </div>
		              <div class="form-group row">
		                <label for="no_surat" class="col-sm-3 col-form-label">No Surat</label>
		                <div class="col-sm-9">
		                  <input type="text" class="form-control" name="no_surat" value="0<?php echo $sk+1;?>/SP/<?php echo bulan(date('m'));?>/<?php echo date('Y');?>">
		                </div>
		              </div>
		              <div class="form-group row">
		                <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal</label>
		                <div class="col-sm-9">
		                  <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal">
		                </div>
		              </div>
		              <div class="form-group row">
		                <label for="nip" class="col-sm-3 col-form-label">Nama</label>
		                <div class="col-sm-9">
		                  	<select class="form-control" name="nip">
							  <option value="">- SILAKAN PILIH PEGAWAI -</option>
								<?php 
								foreach($surat_keluar as $row)
								{ 
								echo '<option value="'.$row->nip.'">'.$row->nama.'</option>';
								}
								?>
				            </select>
		                </div>
		              </div>
		              <div class="form-group row">
		                <label for="acara" class="col-sm-3 col-form-label">Acara</label>
		                <div class="col-sm-9">
		                  <textarea class="form-control" name="acara" rows="6"></textarea>
		                </div>
		              </div>
		              <button type="submit" class="btn btn-danger">Tambah</button>
			      </form>
			     </div>
		<div class="col-lg-2">
			
		</div>
	</div>
</div>