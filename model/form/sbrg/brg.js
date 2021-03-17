$(document).ready(function(){
	$("#btn-search").click(function(){ 
		searchWithPagination(1, true);
	});
});

function searchWithPagination(page_number, search){
	$(this).html("SEARCHING...").attr("disabled", "disabled");
	$.ajax({
		url: 'model/form/sbrg/brg-search.php',
		type: 'POST',
		data: {keyword: $("#keyword").val(), page: page_number, search: search},
		dataType: "json",
		beforeSend: function(e) {
			if(e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		success: function(response){ 
			$("#btn-search").html("Cari.").removeAttr("disabled");
			
			$("#view").html(response.hasil);
		},
		error: function (xhr, ajaxOptions, thrownError) { 
			alert(xhr.responseText);
		}
	});
}
