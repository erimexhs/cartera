var numeroFormulario = 0;

$( document ).ready(function() {

    $("#agregar").click(function(e) {

        $("#formularios-div").show();
    });

    $("#guardar").click(function(e) {

        guardarBanco();
    });
    
    buscarBancos();

    $("#agregar-nombre").click(function() {
        $("#agregar-nombre").parent().removeClass("has-error");
    });

    $("#agregar-cuenta").click(function() {
        $("#agregar-cuenta").parent().removeClass("has-error");
    });

    

    $(document).on('click', 'button[data-role=esconder-formulario]',function(){

        $("#formularios-div").hide();
        $("#agregar-nombre").parent().removeClass("has-error");
        $("#agregar-cuenta").parent().removeClass("has-error");
    });

    $(document).on('click', 'button[data-role=update]',function(){

        var id = $(this).data('id');
        var nombre = $('#'+id).children('td[data-target=nombre]').text();
        var cuenta = $('#'+id).children('td[data-target=cuenta]').text();
        var activo = $('#'+id).children('td[data-target=activo]').text();
    
        $('#editar-id').val(id);
        $('#nombre').val(nombre);
        $('#cuenta').val(cuenta);
        $('#activo').prop('checked', activo == "Si" ? true : false);
    });

    $('#save').click(function() {

        var id = $('#editar-id').val();
        var nombre = $('#nombre').val();
        var cuenta = $('#cuenta').val();
        var estaActivo = $('#activo').is( ":checked" );

        $.ajax({

        url     : "/bancos/update",
        method  : 'POST',
        data    : $("#formulario-editar").serialize(),
        success : function(response) {

                    $('#'+id).children('td[data-target=nombre]').text(nombre);
                    $('#'+id).children('td[data-target=cuenta]').text(cuenta);
                    $('#'+id).children('td[data-target=activo]').text(estaActivo ? "Si" : "No");
                }
        });
        
    });




    $(document).on('click', 'button[data-role=delete]',function(){

        var id = $(this).data('id');
        var nombre = $('#'+id).children('td[data-target=nombre]').text();
        var cuenta = $('#'+id).children('td[data-target=cuenta]').text();
        var activo = $('#'+id).children('td[data-target=activo]').text();

        $('#eliminar-id').val(id);
        $('#eliminar-nombre').text(nombre);
        $('#eliminar-cuenta').text(cuenta); 
        $('#eliminar-activo').text(activo);
    });


    $('#delete').click(function() {

        $.ajax({

        url     : "/bancos/delete",
        method  : 'POST',
        data    : $("#formulario-eliminar").serialize(),
        success : function(response) {
                    $('#'+response.data).remove();
                }
        });
        
    });

});


function buscarBancos() {

    $.ajax({
        url: "bancos/list",
        type: 'POST',
        success: function(response) {

            $.each(response, function(i, item) {

                $("#bancos").append(agregarRegistro(item));
            });
        }
    });
}


function guardarBanco() {
    
    if(validarCampos()) {

        $.ajax({
            url: "bancos/store",
            type: 'POST',
            data: $("#formulario-agregar").serialize(),
            success: function(response) {
    
                $("#bancos").prepend(agregarRegistro(response.data));
                reiniciarFormulario();
            }
        });
    }
    
}


function validarCampos() {

    var validado = true;

    if($("#agregar-nombre").val().trim() == '' || $("#agregar-nombre").val() == null) {
        $("#agregar-nombre").parent().addClass("has-error");
        validado = false;
    }

    if($("#agregar-cuenta").val().trim() == '' || $("#agregar-cuenta").val() == null) {
        $("#agregar-cuenta").parent().addClass("has-error");
        validado = false;
    }

    return validado;
}

function reiniciarFormulario() {

    $("#agregar-nombre").val('');
    $("#agregar-cuenta").val('');
}


function agregarRegistro(banco) {

    var registro = $('<tr id="'+banco["id"]+'">').append(
        $('<td data-target="nombre">').text(banco["nombre"]),
        $('<td data-target="cuenta">').text(banco["numeroCuenta"]),
        $('<td data-target="activo">').text(banco["activo"] ? "Si" : "No"), 
        $('<td>').html('<button class="btn btn-info glyphicon glyphicon-edit" data-role="update" data-id="'+banco["id"]+'" data-toggle="modal" data-target="#modal-editar"></button>'),
        $('<td>').html('<button class="btn btn-danger glyphicon glyphicon-trash" data-role="delete" data-id="'+banco["id"]+'" data-toggle="modal" data-target="#modal-eliminar"></button>'));

    return registro;
}


