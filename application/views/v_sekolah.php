<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-8">
			<h1>Data Sekolah</h1>
			<table>
				<?php 
				foreach($skul as $row){
				?>
				<tr>
					<td>Nama Sekolah</td>
					<td>:</td>
					<td><?php echo $row->nama_sekolah;?></td>
				</tr>
				<tr>
					<td>Alamat Sekolah</td>
					<td>:</td>
					<td><?php echo $row->alamat_sekolah;?></td>
				</tr>
				<tr>
					<td>Kabupaten</td>
					<td>:</td>
					<td><?php echo $row->kabupaten_sekolah;?></td>
				</tr>
				<tr>
					<td>Nama Kepala Sekolah</td>
					<td>:</td>
					<td><?php echo $row->nama_kepsek;?></td>
				</tr>
				<tr>
					<td>NIP</td>
					<td>:</td>
					<td><?php echo $row->nip_kepsek;?></td>
				</tr>
				<tr>
					<td>Pangkat</td>
					<td>:</td>
					<td><?php echo $row->pangkat;?></td>
				</tr>
				<tr>
					<td>Logo</td>
					<td>:</td>
					<td><img src="<?php echo base_url();?>img/<?php echo $row->logo;?>" width="20%" height="15%"></td>
				</tr>
			</table>
			<?php echo anchor('/sekolah/edit/'.$row->id_sekolah,'<button class="btn btn-primary">EDIT</button>'); ?>
		<?php } ?>
		</div>
		<div class="col-lg-2">
			
		</div>
	</div>
</div>