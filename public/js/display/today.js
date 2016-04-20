function removejob($jnumber)
{
	
	$.ajax({
		type: 'GET',
		url: '/ajax/removejob',
		data: 'obra=' + $jnumber,
		datatype: 'html',
		beforeSend: function() {
			var answer = confirm("Confirma a remoção do registo da Obra Nº" + $jnumber + "?");
			if (!answer)
				{
					return false;
				}
			},	
		success: function(response) {
			
			$('#job_id_row_' + $jnumber).hide();
			$('#flash-msg').html('<div class="alert alert-success" id="default_flash_message"><button type="button" class="close" data-dismiss="alert">×</button><p><i class="icon-ok-sign icon-green"></i><b> O registo da Obra Nº'+$jnumber+' foi removido.</b></p></div>');
			
		}
		
	});



}