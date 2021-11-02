$(document).ready(function () {
    $("#data-user").on("submit", function (event) {
        var tipo = document.getElementById("tipo-user").value;

        if (tipo == 0) {
            alertify.error("No selecciono el tipo de usuario...");
        }
        else {
            var formData = new FormData(document.getElementById("data-user"));
            formData.append("dato", "valor");
            

            $.ajax({
                url: "usuarios/save_user.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
                .done(function (res) {
                    $("#result-form").html(res);
                });
        }
        event.preventDefault();
    });

    /* Cambiar Estado de Usuario*/
    $(".btnHDUser").click(function (event) {
        var id, estado;
        id = $(this).attr("id-user");
        estado = $(this).attr("estado");
        $("#result-form").load("usuarios/cambiar_estado.php?idusuario=" + id + "&estado=" + estado);
        event.preventDefault();
    });

    /*Cargar Modal para actualizar usuario..*/
    $(".upd-user").click(function () {
        var id = $(this).attr("id-user");
        $('#UserUpd').modal('show');
        $("#dataUser").load("usuarios/updateDataUser.php?idusuario=" + id);
    });
    /*Actualizar Nombre usuario y tipo */
    $("#UPDUser").on("submit", function (event) {
        var tipo = document.getElementById("tipo-user").value;
        var formData = new FormData(document.getElementById("UPDUser"));
        formData.append("dato", "valor");

        $.ajax({
            url: "usuarios/update_user.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (res) {
                $("#result-form").html(res);
            });
        event.preventDefault();
    });

    /*Cargar Modal para Eliminar usuario..*/
    $(".btnDrop-User").click(function (event) {
        var id;
        id = $(this).attr("id-user");
        $("#result-form").load("usuarios/drop_user.php?idusuario=" + id);
        event.preventDefault();
    });

    /*Cambiar Modal para actualizar clave*/
    $(".upd-key").click(function () {
        var id = $(this).attr("id-user");
        $('#modalKeyUpd').modal('show');
        $("#PasswUser").load("usuarios/PasswData.php?idusuario=" + id);
    });
    /*Actualizar Contraseña */
    $("#UPDPassw").on("submit", function (event) {
        var formData = new FormData(document.getElementById("UPDPassw"));
        formData.append("dato", "valor")

        $.ajax({
            url: "usuarios/updatePasswUser.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (res) {
                $("#result-form").html(res);
            });
        event.preventDefault();
    });
    /*Paginado*/
    $("a.pagina").click(function (event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("usuarios/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });
    /*Aumenta N° regsitros para el paginado*/
    $("#select-reg").on('change', function (event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido").load("usuarios/principal.php?num_reg=" + valor);
        event.preventDefault();
    });
    /* Busca Usuario*/
    $("#like-user").on('change', function (event) {
        var valor;
        valor = $("#like-user").val();
        if (valor.trim() == "") {
            alertify.alert("Busca Usuario", "No ingreso el nombre o codigo de usuario a buscar...")
            event.preventDefault();
        }
        else {
            $("#contenido").load("usuarios/principal.php?like=1&valor=" + valor);
        event.preventDefault();
            

        }

    });
});