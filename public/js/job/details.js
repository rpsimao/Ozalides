function setDate($id)
{
	
	$.ajax({
		type: 'GET',
		url: '/ajax/datetime',
		datatype: 'html',
			
		success: function(response) {
			
			$('#' + $id).val(response);
			
		}
		
	});
}



function cleanVal($id)
{

var checkid = $id.split("_");	
	
	
$("#" + $id).val("");
$('#' + checkid[0]).attr('checked', false);

}

$(function(){
	
	cleanNullDate('1prova_date');
	cleanNullDate('2prova_date');
	cleanNullDate('3prova_date');
	cleanNullDate('4prova_date');
	cleanNullDate('5prova_date');
	cleanNullDate('6prova_date');
	
	cleanNullDate('1Emendas_date');
	cleanNullDate('2Emendas_date');
	cleanNullDate('3Emendas_date');
	cleanNullDate('4Emendas_date');
	cleanNullDate('5Emendas_date');
	cleanNullDate('6Emendas_date');
	
	cleanNullDate('ficheirocliente_date');
	cleanNullDate('aprovadocliente_date');

	cleanNullDate('ficheiroclientetotal_date');
});


function cleanNullDate($id)
{

	var $field = $('#' + $id).val();	
	if ( $field =="0000-00-00 00:00:00")
		{
		$('#' + $id).val("");
		}

}
