var path = window.location.pathname; //jadinya /ptsp/c_user/F
var namanya = path.split("/"); // jadinya ["", "ptsp", "c_user", "F"]
var host = window.location.hostname; //localhost
var layanan = $("input[name='layanan']").val();
var tabel;
const getUrl = window.location;
var b = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
if(b.substring(b.length - 1)== "/")
{
	b.slice(0,-1);
}
const baseUrl = b ;
$("input[name='tunda']").click(function(){
	id = $("input[name='id']").val();
	ke = "tetap";
	$.ajax({
		type : 'POST',
		url : baseUrl + '/' + 'c_antrian/ubah',
		data : {id: id, ke: ke},
		dataType: 'json',
		beforeSend: function(){
			$(".loader2").show();
		},
		success: function(respon)
		{
			if(respon.success == 1)
			{
				$("form#form-antrian").hide();
				tabel.ajax.reload();
			}
			else
			{
				alert("maaf ada kesalahan, mohon coba kembali");
			}
		},
		complete: function(){
			$(".loader2").hide();
		}
	});
});

$("input[name='selesai']").click(function(){
	id = $("input[name='id']").val();
	$.ajax({
		type: 'POST',
		url: baseUrl + '/' +'c_antrian/ubah',
		data: { id: id, ke: "ZZ"},
		dataType: 'json',
		beforeSend: function(){
			$(".loader2").show();
		},
		success: function(respon)
		{
			if(respon.success==1)
			{
				$("form#form-antrian").hide();
				tabel.ajax.reload();
			}
			else
			{
				alert("maaf ada kesalahan ubah tujuan antrian, mohon coba kembali");
			}
		},
		complete: function(){
			$(".loader2").hide();
		}
	});
});


$("form#form-antrian").submit(function(e){
	e.preventDefault();
	
	id = $("input[name='id']").val();
	ke = $("select").val();
	
	$.ajax({
		type: 'POST',
		url: baseUrl + '/' +'c_antrian/ubah',
		data: { id: id, ke: ke},
		dataType: 'json',
		beforeSend: function(){
			$(".loader2").show();
		},
		success: function(respon)
		{
			// console.log(respon.success);
			if(respon.success==1)
			{
				// console.log("yay");
				$("form#form-antrian").hide();
				tabel.ajax.reload();
			}
			else
			{
				alert("maaf ada kesalahan, mohon coba kembali");
			}
		},
		complete: function(){
			$(".loader2").hide();
		}
	});
});



function cek_panggilan(id)
{
	terpanggil = false;
	$.ajax({
		type: "POST",
		url: baseUrl + '/' +'c_antrian/cek_panggilan',
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

function panggil(no,layanan)
{
	$.ajax({
		type: "POST",
		url: baseUrl + '/' +'c_antrian/panggil',
		data: {no : no, layanan : layanan},
		dataType: 'json',
		beforeSend: function(){
			$(".loader2").show();
		},
		success: function(respon){
			if (respon.success==1)
			{
				// console.log("panggil masuk db");
				cek_panggilan(respon.id);
			}
			else
			{
				// console.log("gagal masuk db");
				$(".loader2").hide();
				alert("gagal memanggil, silahkan coba lagi");
			}
		},
		error: function(err)
		{
			console.log(err);
		},
		complete: function(){
			// $('loading').hide();
			// $("#alert").html("<h4>No antrian "+no+" berhasil dipanggil</h4>");
			// $("#alert").fadeTo(5000,500).slideUp(500, function(){
			// 	$("#alert").slideUp(500);
			// });

		}
	});
}

$("#ubahForm").submit(function(event){
	event.preventDefault();
	console.log("mau ubah");
	$.ajax({
		type: "POST",
		url: baseUrl + '/' +'c_user/ubah',
		data: $("#ubahForm").serialize(),
		dataType: 'json',
		beforeSend: function(){
			$(".loader2").show();
		},
		success: function(respon){
			if(respon.success==1)
			{
				console.log("oke");
			}
			else
			{
				console.log("nay");
			}
		},
		complete: function(){
			$(".loader2").hide();
			location.reload();
		}
	});
});

$("select#ke").on('change', function(){
	
	$("#arahkan").text("Arahkan ke " + $(this).children(':selected').text());
});



$(document).ready(function(){
	tabel = $("#tabel_antrian").DataTable({
		"paging" : false,
		"searching" : false,
		"info" : false,
		"ordering" : false,
		"ajax" : {
			"url" : baseUrl + '/' +'c_antrian/getByLayanan/'+layanan,
			"dataSrc" : "",
		},
		"columns" : [
		{"data" : "id"},
		{"data" : "ke"},
		{"data" : "no"},
		{"data" : "status"}
		],
		"columnDefs" : [
		{
			"targets" : [0,1],
			"visible" : false,
		}],
	});
	
	setInterval(function(){
		tabel.ajax.reload();
	}, 5000);
	
	var antrian = 0;
	$("#tabel_antrian tbody").on("click", "tr", function(){
		var currentRow = $(this).closest("tr");
		var data = $("#tabel_antrian").DataTable().row(currentRow).data();
		
		console.log("id "+data['id']);
		console.log("ke "+data['ke']);
		if (!tabel.data().any()) //kalo data tabelnya kosong
		{
	
		}
		else
		{
			if ($("form#form-antrian").is(':visible')) //kalo data antrian sudah diklik tapi belum diarahkan
			{
				if (antrian != data['id'] && antrian != 0)
				{
					$("#alert").html("<h4>Silahkan arahkan no antrian sebelumnya untuk memanggil antrian lainnya.</h4>");
					$("#alert").fadeTo(5000,500).slideUp(500, function(){
						$("#alert").slideUp(500);
					});
				}
				else
				{
					//fungsi panggil
					console.log("mau panggil");
					panggil(data['no'], data['ke']);
				}
				
			}
			else
			{
				panggil(data['no'], data['ke']);
				antrian = data['id'];
				$("form#form-antrian").show();
				$("#no_antrian").text(data['no']);
				$("input[name='id']").val(data['id']);
				$("input[name='no']").val(data['no']);
				var ke = data['ke'];
				arahkan;
				switch(ke)
				{
					case "pengaduan" :
					$("select#ke").val("posbakum");
					arahkan = "POSBAKUM";
					break;
					case "pendaftaran" :
					$("select#ke").val("kasir");
					arahkan = "kasir";
					break;
					case "pengambilan" :
					$("select#ke").val("pengambilan");
					arahkan = "pengambilan produk"
					break;
					case "ecourt" :
					$("select#ke").val("ecourt");
					arahkan = "pendaftaran e-court";
					break;
					case "kasir" :
					$("select#ke").val("pendaftaran");
					arahkan = "pendaftaran";
					break;
					case "posbakum" :
					$("select#ke").val("pendaftaran");
					arahkan = "pendaftaran";
					break;
					case "pos" :
					$("select#ke").val("pendaftaran");
					arahkan = "pendaftaran";
					break;
					case "bank" :
					$("select#ke").val("pendaftaran");
					arahkan = "pendaftaran";
					break;
					default :
					$("select#ke").val(ke);
				}
				$("#arahkan").text("Arahkan ke " + arahkan);
			}
		}
		
	});
});