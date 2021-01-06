<html>
<?php $this->load->view("_partials/head.php") ?>
<body>
	<div class="navbar navbar-inverse logo-pa">
	    <div class="kanan">
	    	<div class="dropdown">
	    		<a href="<?php echo site_url('c_user/pengumuman') ?>" class="btn btn-warning"><i class="fas fa-bullhorn prefix grey-text"></i> Pengumuman</a>
	    		<a class="btn btn-primary" data-toggle="modal" data-target="#ubah-data"><?php echo $this->session->userdata('nama'); ?></a>
	    		<a href="<?php echo site_url('c_login/logout') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt prefix grey-text"></i> keluar</a>
	    	</div>
	    	
	    </div>
	</div>
	<div class="container">
		<div id="alert" class="alert alert-info tengah" style="display: none;">
			<!-- <h4>Silahkan arahkan no antrian sebelumnya untuk memanggil antrian lainnya.</h4> -->
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-9 full-card">
				<h1 class="tengah" style="color: #eee;">Mau diapakan</h1>
				<div class="card label-info antrian">
					<input type="hidden" name="layanan" value="<?php echo $this->session->userdata('kode'); ?>">
					<form id="form-antrian" method="post" class="form-horizontal" style="display: none;">
						<input type="hidden" name="id">
						<div class="form-group">
							<label class="control-label col-sm-3" for="no_antrian">NO. Antrian :</label>
							<div class="col-sm-9" style="padding-top: 7px;">
								<span id="no_antrian"></span>
								<input type="hidden" name="no">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="ke">Selanjutnya ke :</label>
							<div class="col-sm-9" style="padding-top: 7px;">
								<select id="ke">
									<option value="pengaduan">Pengaduan</option>
									<option value="pendaftaran">Pendaftaran</option>
									<option value="pengambilan">Pengambilan Produk</option>
									<option value="ecourt">Pendaftaran E-Court</option>
									<option value="kasir">Kasir</option>
									<option value="posbakum">POSBAKUM</option>
									<option value="pos">POS</option>
									<option value="bank">BANK</option>
									<!-- <option value="ZZ">SELESAI</option> -->
								</select>
							</div>
						</div>
						<div class="kanan">
							<button type="submit" class="btn btn-primary mb-2" id="arahkan">Arahkan ke</button>
							<input type="button" name="tunda" class="btn btn-warning mb-2" value="Tunda">
							<input type="button" name="selesai" class="btn btn-success mb-2" value="Selesai">
						</div>
					</form>
				</div>
			</div>
			<div class="col-xs-12 col-md-3 full-card">
				<h1 class="tengah">Daftar Antrian</h1>
				<div class="card alert-success antrian">
					<div class="col-xs-12 col-md-12">
						<table id="tabel_antrian">
							<thead>
								<tr>
									<th></th>
									<th></th>
									<th>Antrian</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- modal -->
	<div id="ubah-data" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">x</a>
					<h3>Ubah Data</h3>
				</div>
				<form id="ubahForm" name="ubahData" role="form">
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" name="id">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" placeholder="Masukkan password baru" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-success" id="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- end modal -->

	<!-- <div class="loading" style="display: none;"></div> -->
	<div class="loader2" style="display: none;">
		<div class="scene" style="--hue: 260; --saturation: 53; --lightness: 67">
		    <div class="word">
		        <div class="letter__wrap" style="--index: 0">
		            <div class="letter" data-letter="L"><span class="letter__panel" aria-hidden="true">L</span><span class="letter__panel" aria-hidden="true">W</span><span class="letter__panel" aria-hidden="true">L</span><span class="letter__panel" aria-hidden="true">W</span><span class="letter__panel"></span></div>
		        </div>
		        <div class="letter__wrap" style="--index: 1">
		            <div class="letter" data-letter="o"><span class="letter__panel" aria-hidden="true">o</span><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel" aria-hidden="true">o</span><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel"></span></div>
		        </div>
		        <div class="letter__wrap" style="--index: 2">
		            <div class="letter" data-letter="a"><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel"></span></div>
		        </div>
		        <div class="letter__wrap" style="--index: 3">
		            <div class="letter" data-letter="d"><span class="letter__panel" aria-hidden="true">d</span><span class="letter__panel" aria-hidden="true">t</span><span class="letter__panel" aria-hidden="true">d</span><span class="letter__panel" aria-hidden="true">t</span><span class="letter__panel"></span></div>
		        </div>
		        <div class="letter__wrap" style="--index: 4">
		            <div class="letter" data-letter="i"><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel"></span></div>
		        </div>
		        <div class="letter__wrap" style="--index: 5">
		            <div class="letter" data-letter="n"><span class="letter__panel" aria-hidden="true">n</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel" aria-hidden="true">n</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel"></span></div>
		        </div>
		        <div class="letter__wrap" style="--index: 6">
		            <div class="letter" data-letter="g"><span class="letter__panel" aria-hidden="true">g</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel" aria-hidden="true">g</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel"></span></div>
		        </div>
		    </div>
		</div>
	</div>
<?php $this->load->view("_partials/js.php") ?>
<script src="<?php echo base_url('asset/DataTables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('asset/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/user.js') ?>"></script>
<script type="text/javascript">
	$("#ubah-data").on("show.bs.modal", function(e){
		$("#ubah-data").find("input[name='nama']").val("<?php echo $this->session->userdata('nama'); ?>")
		$("#ubah-data").find("input[name='id']").val("<?php echo $this->session->userdata('id'); ?>")
	});
</script>
</body>
</html>