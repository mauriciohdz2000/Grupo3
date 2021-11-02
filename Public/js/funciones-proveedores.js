$(document).ready(function () {
    $("#data-prove").on("submit", function (event) {
            var formData = new FormData(document.getElementById("data-prove"));
            formData.append("dato", "valor");
            

            $.ajax({
                url: "proveedores/save_proveedor.php",
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


    /*Cargar Modal para actualizar proveedor..*/
    $(".upd-user").click(function () {
        var id = $(this).attr("id-user");
        $('#UserUpd').modal('show');
        $("#dataUser").load("proveedores/updateDataProveedor.php?id_proveedor=" + id);
    });
    /*Actualizar Nombre usuario y tipo */
    $("#UPDProveedor").on("submit", function (event) {
        var formData = new FormData(document.getElementById("UPDProveedor"));
        formData.append("dato", "valor");

        $.ajax({
            url: "proveedores/update_proveedor.php",
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
    $(".btnDrop-Proveedor").click(function (event) {
        var id;
        id = $(this).attr("id_proveedor");
        $("#result-form").load("proveedores/drop_proveedor.php?id_proveedor=" + id);
        event.preventDefault();
    });

    /*Cambiar Modal para actualizar clave*/
    $(".upd-key").click(function () {
        var id = $(this).attr("id-user");
        $('#modalKeyUpd').modal('show');
        $("#PasswUser").load("usuarios/PasswData.php?idusuario=" + id);
    });
    /*Paginado*/
    $("a.pagina").click(function (event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("proveedores/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });
    /*Aumenta N° regsitros para el paginado*/
    $("#select-reg").on('change', function (event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido").load("proveedores/principal.php?num_reg=" + valor);
        event.preventDefault();
    });
    /* Busca Usuario*/
    $("#like-user").on('change', function (event) {
        var valor;
        valor = $("#like-user").val();
        if (valor.trim() == "") {
            alertify.alert("Busca Proveedor", "No ingreso el nombre o codigo de proveedor a buscar...")
            event.preventDefault();
        }
        else {
            $("#contenido").load("proveedores/principal.php?like=1&valor=" + valor);
        event.preventDefault();
            

        }

    });
});