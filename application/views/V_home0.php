<html>
<?php $this->load->view("_partials/head.php") ?>
<body>
	<div class="navbar navbar-inverse logo-pa">
	    <div class="navbar-header">
	        <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button> -->
	        <!-- <a class="navbar-brand" href="javascript:void(0)"> <img src="<?php echo base_url('asset/img/logo-patgr.png') ?>"></a>
	        <h1>Pengadilan Agama Tenggarong</h1> -->
	    </div>
	</div>
	
	<div class="container">
	    <div id="example-row" class="row">
	        
	        <h2 class="title">ANTRIAN PTSP</h2>
	        <div class="col-xs-12 col-md-9 col-lg-9 col-xl-9 full-card">
	        	<div class="flip-card active-card">
	        		<div class="card asu" style="background-color: #0000A0;">
	        			<div class="row">
	        				<div class="col-xs-12 col-md-4 col-lg-4 col-xl-4" onclick="ambil_antrian('pengaduan');">
	        					<div class="flip-card active-card">
	        						<div class="card merah pencet">
	        							<h1>PENGADUAN INFORMASI</h1>
	        						</div>
	        						
	        					</div>
	        				</div>
	        				<!-- <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4" onclick="ambil_antrian('pendaftaran');">
	        					<div class="flip-card active-card">
	        						<div class="card bronze pencet">
	        							<h1>PENDAFTARAN</h1>
	        						</div>
	        						
	        					</div>
	        				</div> -->
	        				<div class="col-xs-12 col-md-4 col-lg-4 col-xl-4" onclick="ambil_antrian('pengambilan');">
	        					<div class="flip-card active-card">
	        						<div class="card kuning pencet">
	        							<h1>PENGAMBILAN PRODUK</h1>
	        						</div>
	        						
	        					</div>
	        				</div>
							<div class="row">
	        				<div class="col-xs-12 col-md-4" onclick="ambil_antrian('ecourt');">
	        					<div class="flip-card active-card">
	        						<div class="card hijau pencet">
	        							<h1>PENDAFTARAN <br>E-COURT</h1>
	        						</div>
	        						
	        					</div>
	        				</div>
	        			</div>
	        			<!-- <div class="row">
	        				<div class="col-xs-12 col-md-4" onclick="ambil_antrian('ecourt');">
	        					<div class="flip-card active-card">
	        						<div class="card hijau pencet">
	        							<h1>PENDAFTARAN <br>E-COURT</h1>
	        						</div>
	        						
	        					</div>
	        				</div> -->
	        				<!-- <div class="col-xs-12 col-md-4" onclick="ambil_antrian('kasir');">
	        					<div class="flip-card active-card">
	        						<div class="card biru pencet">
	        							<h1>KASIR</h1>
	        						</div>
	        						
	        					</div>
	        				</div> -->
	        				<!-- <div class="col-xs-12 col-md-4" onclick="ambil_antrian('posbakum');">
	        					<div class="flip-card active-card">
	        						<div class="card ungu pencet">
	        							<h1>POSBAKUM</h1>
	        						</div>
	        						
	        					</div>
	        				</div> -->
	        			</div>
	        			<!-- <div class="row">
	        				<div class="col-xs-12 col-md-4" onclick="ambil_antrian('pos');">
	        					<div class="flip-card active-card">
	        						<div class="card oren pencet">
	        							<h1>POS</h1>
	        						</div>
	        					</div>
	        				</div>
	        				<div class="col-xs-12 col-md-4" onclick="ambil_antrian('bank');">
	        					<div class="flip-card active-card">
	        						<div class="card ijo_mist pencet">
	        							<h1>BANK</h1>
	        						</div>
	        					</div>
	        				</div>
	        			</div> -->
	        		</div>
	        	</div>
	        </div>
	        <div class="col-xs-12 col-md-3 col-lg-3 col-xl-9 full-card">
	        	<div class="flip-card active-card">
	        		<div class="card tabel alert-success">
	        			<table id="daftar_antrian">
	        				<thead>
	        					<tr>
	        						<th colspan="2" class="col-xs-12 col-md-12" id="layanan">PENGADUAN</th>
	        					</tr>
	        					<tr>
	        						<th class="col-md-3" scope="col">NO.</th>
	        						<th class="col-md-9" scope="col">ANTRIAN</th>
	        					</tr>
	        				</thead>
	        				<tbody>
	        					
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>
	        <div class="col-xs-12 col-md-12">
	        	<!-- <h1><a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">SILAHKAN AMBIL NOMOR ANTRIAN</a></h1> -->
	        	<!-- <h1><a onclick="eak()">SILAHKAN AMBIL NOMOR ANTRIAN</a></h1> -->
				<h1 class="setelan">SILAHKAN AMBIL NOMOR ANTRIAN</h1>
				<!-- setelan -->
				<!-- <div class="setelan">
					<h2><span>C</span>opyright &copy; <span>S</span>upir yang </h2>
				</div> -->
				<!-- <div class="setelan">
					<ul class="c-rainbow">
						<li class="c-rainbow__layer c-rainbow__layer--white">Copyright &copy; Supir 2020</li>
						<li class="c-rainbow__layer c-rainbow__layer--orange">Copyright &copy; Supir 2020</li>
						<li class="c-rainbow__layer c-rainbow__layer--red">Copyright &copy; Supir 2020</li>
						<li class="c-rainbow__layer c-rainbow__layer--violet">Copyright &copy; Supir 2020</li>
						<li class="c-rainbow__layer c-rainbow__layer--blue">Copyright &copy; Supir 2020</li>
						<li class="c-rainbow__layer c-rainbow__layer--green">Copyright &copy; Supir 2020</li>
						<li class="c-rainbow__layer c-rainbow__layer--yellow">Copyright &copy; Supir 2020</li>
					</ul>
				</div> -->
				
				
				<!-- end setelan -->
			</div>
			
			
	        
	    </div>
	</div>
	<div class="loading" style="display: none;">
		
	</div>
	<!-- loader2 -->
	<div class="loader2" style="display:none;">
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
	<!-- end loader2 -->

<?php $this->load->view("_partials/js.php") ?>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=6UoEN13s"></script>
<script src="<?php echo base_url('asset/DataTables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('asset/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/antrian.js') ?>"></script>
</body>
</html>