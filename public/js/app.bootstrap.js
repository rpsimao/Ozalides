$(function(){

    ptCal();


$("#navbarjobinput").typeahead({
        source: function(query, process) {
            $.ajax({
                url: '/ajax/jobs',
                type: 'POST',
                data: {'q' : query},
                dataType: 'JSON',
                async: true,
                success: function(data) {
                    process(data);

                }
            });
        },
        minLenght: 3,
        items: 20
    });
		
	
});


function checkSearchFormDate(){

    var inputBox = $("#navbardateinput");

    if( !inputBox.val() ) {

        var html = '<div class="form-group has-error has-feedback" id="navbardateform"><input type="text" class="form-control" placeholder="Procurar por data" autocomplete="off" id="navbardateinput" name="dia"> </span> <span class="input-group-btn"> <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button> </span> </div>';
        $("#navbardateform").html(html);
        inputBox.focus();
        $("#navbardateinput").datepicker({ dateFormat: "yy-mm-dd" ,
            dayNamesMin: ["Dom","Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
            monthNames:["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']

        });
        $('#navbardateinput').datepicker($.datepicker.regional['pt']);

        return false;

    }


}


function checkSearchFormJob(){

    var inputBox = $("#navbarjobinput");

    if( !inputBox.val() ) {

        var html = '<div class="form-group has-error has-feedback" id="navbarjobform"><input type="text" class="form-control" placeholder="Procurar por obra" autocomplete="off" id="navbarjobinput" name="searchobra"> </span> <span class="input-group-btn"> <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button> </span> </div>';
        $("#navbarjobform").html(html);
        inputBox.focus();


        return false;

    }
}


function ptCal(){

    $("#navbardateinput").datepicker({ dateFormat: "yy-mm-dd" ,
        dayNamesMin: ["Dom","Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
        monthNames:["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']

    });
    $('#navbardateinput').datepicker($.datepicker.regional['pt']);

}