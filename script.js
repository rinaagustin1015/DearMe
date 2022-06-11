$(document).ready(function() {
$('#submit').on('click', function() {
var judul = $('#judul').val();
var kategori_id = $('#kategori_id').val();
var tanggal = $('#tanggal').val();
var isi = $('#isi').val();
if(tanggal!="" && judul!="" && isi!="" && kategori_id!=""){
	$.ajax({
		url: "simpanDiary.php",
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
				$("#submit").removeAttr("disabled");
				$('#fupForm').find('input:text').val('');
				$("#success").show();
				$("#success").html('Diary Kamu Berhasil Ditambahkan! >.<'); 						
			}
			else if(dataResult.statusCode==201){
				alert("Error occured !");
			}
			
		}
	});
	}
	else{
		alert('Please fill all the field !');
	}
});
});