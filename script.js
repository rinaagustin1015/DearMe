// ADD DIARY
$(document).ready(function() {
$('#submit').on('click', function() {
$("#butsave").attr("disabled", "disabled");
var judul = $('#judul').val();
var kategori_id = $('#kategori_id').val();
var tanggal = $('#tanggal').val();
var isi = $('#isi').val();
if(tanggal!="" && judul!="" && isi!="" && kategori_id!=""){
	$.ajax({
		url: "simpanDiary.php?action=simpanDiary",
		type: "POST",
		data: {
			tanggal: tanggal,
            judul: judul,
			isi: isi,
            kategori_id: kategori_id				
		},
		cache: false,
		success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				alert("Diary Kamu Berhasil Ditambahkan! >.<")
				window.location = "diary.php"
						
			}
			else if(dataResult.statusCode==201){
				alert("Terjadi Kesalahan!");
			}
			
		}
	});
	}
	else{
		alert('Ups! Ada Kolom yang Masih Kosong');
	}
});
});