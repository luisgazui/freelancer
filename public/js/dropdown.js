$("#pais_id").change(event => {
	$("#tipousuario_id").prop( "disabled", false );
});

$("#tipousuario_id").change(event => {
	$.get(`getdocumentos/${event.target.value}/` + $("#pais_id").val(), function(res, sta){
		$("#documento_id").empty();

		$("#documento_id").prop( "disabled", false );
		res.forEach(element => {
			$("#documento_id").append(`<option value=${element.id}> ${element.Documento} </option>`);
		});
		$("#documento_id").attr("placeholder", "Tipo de documento");
	});
});