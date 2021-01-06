<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PTSP | TUTUP</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/material-design-iconic-font.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/animate.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/select2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/main.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/util.css') ?>">
</head>
<body>
	<div class="bg-g1 size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-t-55 p-b-35 respon1">
		<span></span>
		<div class="flex-col-c p-t-50 p-b-50">
			<h3 class="l1-txt1 txt-center p-b-10">
				Pengambilan Nomor Antrian PTSP Tutup
			</h3>
			<p class="txt-center l1-txt2 p-b-60">
				Silahkan kembali lagi pada hari
			</p>
			<div class="flex-w flex-c cd100 p-b-82">
				<div class="flex-col-c-m size3 how-countdown">
					<span class="s1-txt1">Hari</span>
					<span class="l1-txt3 p-b-9 days" id="hari"></span>
				</div>
				<div class="flex-col-c-m size2 how-countdown">
					<span class="s1-txt1">Tanggal</span>
					<span class="l1-txt3 p-b-9 hours" id="tanggal"></span>
				</div>
				<div class="flex-col-c-m size2 how-countdown">
					<span class="s1-txt1">Bulan</span>
					<span class="l1-txt3 p-b-9 minutes" id="bulan"></span>
				</div>
				<div class="flex-col-c-m size how-countdown">
					<span class="s1-txt1">Tahun</span>
					<span class="l1-txt3 p-b-9 seconds" id="tahun"></span>
				</div>
			</div>
		</div>
		<span class="s1-txt3 txt-center">
			Copyright &copy; <a href="http://taufikdwp.tk" target="_blank" style="color:#43d8c9;">Taufik Dwi Wahyu Putra</a> 2020
		</span>
	</div>
	<script src="<?php echo base_url('asset/js/jquery-3.3.1.min.js') ?>"></script>
	<script src="<?php echo base_url('asset/js/bootstrap.min.js') ?>"></script>
	<script src="https://code.responsivevoice.org/responsivevoice.js?key=6UoEN13s"></script>
	<script type="text/javascript">
		var voice = "Indonesian Male";
		var timer_panggil;
		function panggil() {
			$.ajax({
				type: "GET",
				url: '<?php echo base_url('c_antrian/panggil_antrian') ?>',
				dataType: 'json',
				success: function(respon){
					if (respon.success==1)
					{
						console.log("antrian ada");
						memanggil_antrian(respon.id, respon.no, respon.layanan, respon.pengumuman);
					}
					else
					{
						console.log("antrian tidak ada");
					}
				}
			});
		}

		function memanggil_antrian(id,no,layanan,pengumuman)
		{
			clearInterval(timer_panggil);
			if(pengumuman!=null)
			{
				text = pengumuman;
			}
			else
			{
				text = "Dipanggil nomor antrian " + no + ". silahkan ke layanan " + layanan;
			}
			responsiveVoice.speak(text, voice, {rate: 0.9, onend: function(){
				setTimeout(function(){
					responsiveVoice.speak(text, voice, {rate: 0.9, onend: hapus_panggil_antrian(id)});
				}, 3000);
			}});
		}

		function hapus_panggil_antrian(id)
		{
			$.ajax({
				type: "POST",
				url: '<?php echo base_url('c_antrian/hapus_panggil_antrian') ?>',
				data: {id: id},
				dataType: "JSON",
				success: function(respon)
				{
					if(respon.success==1)
					{
						console.log("data antrian panggil berhasil dihapus");
						
					}
					else
					{
						console.log("data antrian panggil gagal dihapus");
					}
					setTimeout(jalankan_timer,7000);
				}
			});
		}

		function jalankan_timer()
		{
			timer_panggil = setInterval(panggil,3000);
		}

		$(document).ready(function(){
			jalankan_timer();
			var nama_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'];
			var besok = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
			var tanggal = besok.getDate();
			var bulan = besok.getMonth() + 1;
			var tahun = besok.getFullYear();
			var hari = nama_hari[besok.getDay()];

			if (hari == "Sabtu") //berarti ngeceknya pas hari jumat
			{
				besok = new Date(new Date().getTime() + 72 * 60 * 60 * 1000);
				tanggal = besok.getDate();
				bulan = besok.getMonth() + 1;
				tahun = besok.getFullYear();
				hari = nama_hari[besok.getDay()];
			}
			else if(hari == "Minggu") //berarti ngeceknya pas hari sabtu
			{
				besok = new Date(new Date().getTime() + 48 * 60 * 60 * 1000);
				tanggal = besok.getDate();
				bulan = besok.getMonth() + 1;
				tahun = besok.getFullYear();
				hari = nama_hari[besok.getDay()];
			}
			
			$("#hari").text(hari);
			$("#tanggal").text(tanggal);
			$("#bulan").text(bulan);
			$("#tahun").text(tahun);			
		});
	</script>
</body>
</html>