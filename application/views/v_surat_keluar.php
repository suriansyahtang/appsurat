<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-8">
			<h1>Data Surat Perintah</h1>
			<div class="table-responsive">
			<table id="suratkeluar" class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th>No Surat</th>
						<th>Tanggal</th>
						<th>NIP</th>
						<th>Acara</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach($surat_keluar as $row){
					?>
				<tr>
					<td><?php echo $row->no_surat; ?></td>
					<td><?php echo $row->tgl_surat; ?></td>
					<td><?php echo $row->nip; ?></td>
					<td><?php echo $row->acara; ?></td>
					<td>
						<?php echo anchor('/surat_keluar/edit/'.$row->id_sk,'edit'); ?> |
                        <?php echo anchor('/surat_keluar/hapus/'.$row->id_sk,'hapus'); ?> |
                        <?php echo anchor('/surat_keluar/cetak/'.$row->id_sk,'cetak'); ?>
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