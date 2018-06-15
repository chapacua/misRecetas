$(document).ready(function(){

//::::::::: LOGN::::::::::
    //Ajax para login
    $("#form-login").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            success: function (data) {
                if (data == true) {
                    window.location.replace("inicio");
                } else {
                    M.toast({ html: 'Usuario o contraseña incorrectos!' });
                }
            }
        });
    });

    //::::::::: USUARIOS ::::::::::
    //Ajax para eliminar usuario
    $(".delete").click(function (event) {
        var id = $(this).attr('data-id');
        event.preventDefault();
        $.ajax({
            url: base_url +'/Usuarios/borrar/'+id,
            type: 'GET',
            before: function () {
                $('.progress').removeClass("hide");
            },
            success: function (data) {
            },
            complete: function(){
                $('.progress').addClass("hide");
                $('#tr'+id).remove();
                M.toast({ html: 'Usuario eliminado correctamente!' });
            }
        });
    });    
    
    //Ajax para restablecer contraseña usuario
    $(".setAdmin").click(function (event) {
        var id = $(this).attr('data-id');
        event.preventDefault();
        $.ajax({
            url: base_url + '/Usuarios/volverAdmin/' + id,
            type: 'GET',
            before: function () {
                $('.progress').removeClass("hide");
            },
            success: function (data) {
            },
            complete: function () {
                $('.progress').addClass("hide");
                $('#rol'+id).empty();
                $('#rol'+id).append('Administrador');
                M.toast({ html: 'Se estableció el usuario como administrador' });
            }
        });
    }); 

    //Ajax para restablecer contraseña usuario
    $(".recover").click(function (event) {
        var id = $(this).attr('data-id');
        event.preventDefault();
        $.ajax({
            url: base_url + '/Usuarios/restablecerPassword/' + id,
            type: 'GET',
            before: function () {
                $('.progress').removeClass("hide");
            },
            success: function (data) {
            },
            complete: function () {
                $('.progress').addClass("hide");
                M.toast({ html: 'Contraseña restablecida correctamente: asdf123..' });
            }
        });
    });     

//::::::::: CATEGORIAS ::::::::::

    //Ajax para eliminar categoria
    $(".deleteCat").click(function (event) {
        var id = $(this).attr('data-id');
        event.preventDefault();
        $.ajax({
            url: base_url + '/Categorias/borrar/' + id,
            type: 'GET',
            before: function () {
                $('.progress').removeClass("hide");
            },
            success: function (data) {
            },
            complete: function () {
                $('.progress').addClass("hide");
                $('#tr' + id).remove();
                M.toast({ html: 'Categoría eliminada correctamente!' });
            }
        });
    });     
    
    //Ajax para crear categoria
    $("#createCat").submit(function (event) {
        event.preventDefault();
        $('#createPrel').removeClass("hide");
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),

            success: function (data) {
            },
            complete: function () {
                setTimeout(function () {
                    $('#createPrel').addClass("hide");
                }, 1000);
                M.toast({ html: 'Categoría creada correctamente!' });
                setTimeout(function () {
                    location.reload();
                }, 2000); 
                
            }
        });
    });   

//::::::::: INGREDIENTES ::::::::::

    //Ajax para eliminar categoria
    $(".deleteIng").click(function (event) {
        var id = $(this).attr('data-id');
        event.preventDefault();
        $.ajax({
            url: base_url + '/Ingredientes/borrar/' + id,
            type: 'GET',
            before: function () {
                $('.progress').removeClass("hide");
            },
            success: function (data) {
            },
            complete: function () {
                $('.progress').addClass("hide");
                $('#tr' + id).remove();
                M.toast({ html: 'Categoría eliminada correctamente!' });
            }
        });
    });

    //Ajax para crear categoria
    $("#createIng").submit(function (event) {
        event.preventDefault();
        $('#createPrel').removeClass("hide");
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            contentType: false,

            success: function (data) {
                $('#contenido').children().last().append(data);
            },
            complete: function () {
                $('#createPrel').addClass("hide");
                M.toast({ html: 'Categoría creada correctamente!' });
                /*setTimeout(function () {
                    location.reload();
                }, 2000);*/
            }
        });
    }); 

    //::::::::: RECETAS ::::::::::

    //Ajax para eliminar receta
    $(".deleteRec").click(function (event) {
        var id = $(this).attr('data-id');
        event.preventDefault();
        $.ajax({
            url: base_url + '/Recetas/borrar/' + id,
            type: 'GET',
            before: function () {
                $('.progress').removeClass("hide");
            },
            success: function (data) {
            },
            complete: function () {
                $('.progress').addClass("hide");
                $('#tr' + id).remove();
                M.toast({ html: 'Categoría eliminada correctamente!' });
            }
        });
    });

    //Ajax para eliminar ingrediente antiguo
    $(".deleteIngRec").click(function (event) {
        var id = $(this).attr('data-ingrediente');
        event.preventDefault();
        $.ajax({
            url: base_url + '/Recetas/borrarIngrediente/' + id,
            type: 'GET',
            before: function () {
                $('.progress').removeClass("hide");
            },
            success: function (data) {
                alert(base_url);
            },
            complete: function () {
                $('.progress').addClass("hide");
                $('#Ing-' + id).remove();
                M.toast({ html: 'Categoría eliminada correctamente putito!' });
            }
        });
    });

    //Ajax para eliminar ingrediente nuevo
    $(document).on("click", ".deleteNewIngRec", function () {
        var id = $(this).attr('data-ingrediente');
        console.log(id);
        $('#Ing-' + id).remove();
    });
    
    //Ajax para agregar ingredientes
    $(".addIng").click(function (event) {
        event.preventDefault();
        var idContainer = $(this).attr('id');
        var id = $('#Ing_Container-' + idContainer).children().last().attr('id');
        $.ajax({
            url: base_url + '/Recetas/getIngredientesParaMostrar/' + id, 
            success: function (result) {
                $('#Ing_Container-' + idContainer).last().append(result);
            }
        });
    });         

    //Ajax para eliminar ingrediente nuevo en creación de recetas
    $(document).on("click", ".deleteNewIngRecCrear", function () {
        var id = $(this).attr('data-ingrediente-creador');
        console.log(id);
        $('#newIng-' + id).remove();
    });
    
    //Ajax para agregar ingredientes en creación de recetas
    $(".addNewIng").click(function (event) {
        event.preventDefault();
        var id = $('#newIng_Container').children().last().attr('id');
        $.ajax({
            url: base_url + '/Recetas/getIngredientesParaMostrarCrear/' + id, 
            success: function (result) {
                $('#newIng_Container').last().append(result);
            }
        });
    });         
});
