<!DOCTYPE html>
<html>
<?php $this->load->view("_partials/head.php") ?>
<body>
	<div class="navbar navbar-inverse logo-pa"></div>
	<div class="container">
		<div class="row">
			<p class="h1 text-center">Pengumuman</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<textarea id="text" rows='7' class="form-control" placeholder="Masukkan pengumumannya, kemudian klik tombol umumkan"></textarea>
			</div>
			<div class="col-auto">
				<div class="kanan">
					<input type="button" name="umumkan" value="Umumkan" id="btn_panggil" class="btn btn-success mr-1">
					<a href="<?php echo site_url('c_login'); ?>" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</div>
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
	<script type="text/javascript">
		$(document).ready(function(){
			var path = window.location.pathname; //jadinya /ptsp/c_user/F
			var namanya = path.split("/"); // jadinya ["", "ptsp", "c_user", "F"]
			var host = window.location.hostname; //localhost
			function panggil(no,layanan,pengumuman)
			{
				$.ajax({
					type: 'POST',
					url: 'http://'+host+'/'+namanya[1]+'/c_antrian/panggil',
					data: {no: no, layanan: layanan, pengumuman: pengumuman},
					dataType: 'json',
					beforeSend: function()
					{
						$(".loader2").show();
					},
					success: function(respon)
					{
						if(respon.success==1)
						{
							console.log("panggil masuk db");
							cek_panggilan(respon.id);
						}
						else
						{
							console.log("gagal masuk db");
							$(".loader2").hide();
							alert("gagal memanggil, silahkan coba lagi");
						}
					},
					error: function(err)
					{
						console.log(err);
					},
				});
			}

			function cek_panggilan(id)
			{
				terpanggil = false;
				$.ajax({
					type: "POST",
					url: 'http://'+host+'/'+namanya[1]+'/c_antrian/cek_panggilan',
					data: {id : id},
					dataType: 'json',
					success: function(respon){
						if (respon.efek==1)
						{
							console.log("ini efek cek panggilan berarti belum terpanggil " + respon.efek);
												
						}
						else
						{
							console.log("ini efek cek panggilan berarti sudah terpanggil" + respon.efek);
							terpanggil = true;
						}
					},
					complete: function(){
						if(terpanggil)
						{
							$(".loader2").hide();
							
						}
						else{
							cek_panggil_terus(id);
						}
					}
				});
			}

			function cek_panggil_terus(id)
			{
				setTimeout(function(){
					cek_panggilan(id);
				},3000);
			}

			$("#btn_panggil").click(function(e){
				no = Math.floor(Math.random() * (1000-100+1)) + 100; //min 100 max 1000
				layanan = "pengumuman";
				pengumuman = $("#text").val().trim();
				panggil(no,layanan,pengumuman);
			});
		});
	</script>
</body>
</html>