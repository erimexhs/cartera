var numeroFormulario = 0;

$( document ).ready(function() {

    $("#agregar").click(function(e) {

        $("#formularios-div").show();
        agregarFormulario();
    });

    $("#guardar").click(function(e) {

        guardarBanco();
        
    });
    
    buscarBancos();


    $(document).on('click', 'button[data-role=update]',function(){

        var id = $(this).data('id');
        var nombre = $('#'+id).children('td[data-target=nombre]').text();
        var cuenta = $('#'+id).children('td[data-target=cuenta]').text();
    
        $('#nombre').val(nombre);
        $('#cuenta').val(cuenta);
        $('#editar-id').val(id);
    });

    $('#save').click(function() {

        $.ajax({

        url     : "/bancos/update",
        method  : 'POST',
        data    : $("#formulario-editar").serialize(),
        success : function(response) {

                    $('#bancos').html('');
                    buscarBancos();
                    reiniciarFormulario();
                }
        });
        
    });




    $(document).on('click', 'button[data-role=delete]',function(){

        var id = $(this).data('id');
        var nombre = $('#'+id).children('td[data-target=nombre]').text();
        var cuenta = $('#'+id).children('td[data-target=cuenta]').text();

        $('#eliminar-nombre').text(nombre);
        $('#eliminar-cuenta').text(cuenta);
        $('#eliminar-id').val(id);
        /*
        
        var nombre = $('#'+id).children('td[data-target=nombre]').text();
        var cuenta = $('#'+id).children('td[data-target=cuenta]').text();
    
        $('#nombre').val(nombre);
        $('#cuenta').val(cuenta);
        
        */
    });


    $('#save').click(function() {

        /*
        $.ajax({

        url     : "/bancos/update",
        method  : 'POST',
        data    : $("#formulario-editar").serialize(),
        success : function(response) {

                    $('#bancos').html('');
                    buscarBancos();
                    reiniciarFormulario();
                }
        });
        */
        
    });


});


function buscarBancos() {

    $.ajax({
        url: "bancos/list",
        type: 'POST',
        success: function(response) {

            $.each(response, function(i, item) {

                $('<tr id="'+item.id+'">').append(
                                $('<td data-target="nombre">').text(item.nombre),
                                $('<td data-target="cuenta">').text(item.numeroCuenta),
                                $('<td>').text(item.activo),
                                $('<td>').html('<button class="btn btn-info glyphicon glyphicon-edit" data-role="update" data-id="'+item.id+'" data-toggle="modal" data-target="#modal-editar"></button>'),
                                $('<td>').html('<button class="btn btn-danger glyphicon glyphicon-trash" data-role="delete" data-id="'+item.id+'" data-toggle="modal" data-target="#modal-eliminar"></button>')

                ).appendTo('#bancos');
            });
        }
    });
}


function agregarFormulario() {

    var idFormulario = 'formulario_' + numeroFormulario;

    var nuevoFormulario = 
    `<div class="row" id="`+idFormulario+`">
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre_`+numeroFormulario+`">Nombre Banco</label>
                <input type="text" class="form-control nombre" id="nombre_`+numeroFormulario+`" name="nombre">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="cuenta_`+numeroFormulario+`">Numero Cuenta</label>
                <input type="text" class="form-control cuenta" id="cuenta_`+numeroFormulario+`" name="cuenta">
            </div>
        </div>
        <br>
        <div class="col-md-2">
            <div class="form-group">
                <button class="btn btn-danger glyphicon glyphicon-trash" onclick="eliminarFormulario('`+idFormulario+`');"></button>
            </div>
        </div>
    </div>`;

    $("#formularios").append(nuevoFormulario);

    numeroFormulario++;
}


window.eliminarFormulario = function(formulario) {

    $('#'+formulario).remove();

    var cantidadFormularios = $("#formularios").children().length;

    if (cantidadFormularios == 0) {
        reiniciarFormulario();
    }
    
}


function guardarBanco() {

    $.ajax({
        url: "bancos/store",
        type: 'POST',
        data: $("#formulario-agregar").serialize(),
        success: function(data) {

            $('#bancos').html('');
            buscarBancos();
            reiniciarFormulario();
        }
    });

}


function reiniciarFormulario() {

    $('#formularios-div').hide();
    $('#formularios').html('');

    $.each($(".nombre"), function() {
        this.value = '';
    });

    $.each($(".cuenta"), function() {
        this.value = '';
    });
}


