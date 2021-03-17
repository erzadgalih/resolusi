function search(){
	$("#loading").show(); // Tampilkan loadingnya

	$.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "model/form/Jahit/search.php", // Isi dengan url/path file php yang dituju
        data: {no_kik : $("#no_kik").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
		},
		success: function(response){ // Ketika proses pengiriman berhasil
            $("#loading").hide(); // Sembunyikan loadingnya

            if(response.status == "success"){ // Jika isi dari array status adalah success
				$("#model").val(response.model); // set textbox dengan id nama
				$("#warna").val(response.warna); // set textbox dengan id jenis kelamin
				$("#na_kom").val(response.na_kom); // set textbox dengan id telepon
				$("#na_bhn").val(response.na_bhn);
			}else{ // Jika isi dari array status adalah failed
				alert("Data Tidak Ditemukan");
			}
		},
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.responseText);
        }
    });
}

$(document).ready(function(){
	$("#loading").hide(); // Sembunyikan loadingnya

    $("#btn-search").click(function(){ // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });

    $("#no_kik").keyup(function(event){ // Ketika user menekan tombol di keyboard
		if(event.keyCode == 13){ // Jika user menekan tombol ENTER
			search(); // Panggil function search
		}
	});
});
