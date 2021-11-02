$(document).ready(function () {
    $("#data-producto").on("submit", function (event) {
            var formData = new FormData(document.getElementById("data-producto"));
            formData.append("dato", "valor");
            

            $.ajax({
                url: "productos/save_producto.php",
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


   /*Cargar Modal para actualizar producto..*/
   $(".upd-user").click(function () {
    var id = $(this).attr("id-user");
    $('#UserUpd').modal('show');
    $("#dataUser").load("productos/updateDataProducto.php?id=" + id);
    });
    /*Actualizar producto */
    $("#UPDproducto").on("submit", function (event) {
        var formData = new FormData(document.getElementById("UPDproducto"));
        formData.append("dato", "valor");

        $.ajax({
            url: "productos/update_producto.php",
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

    /*Cargar Modal para Eliminar producto..*/
    $(".btnDrop-producto").click(function (event) {
        var id;
        id = $(this).attr("id_producto");
        $("#result-form").load("productos/drop_producto.php?id=" + id);
        event.preventDefault();
    });



    /*Paginado de los productos*/
    $("a.pagina").click(function (event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("productos/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });
    /*Aumenta N° regsitros para el paginado*/
    $("#select-reg").on('change', function (event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido").load("productos/principal.php?num_reg=" + valor);
        event.preventDefault();
    });
    /* Busca Usuario*/
    $("#like-user").on('change', function (event) {
        var valor;
        valor = $("#like-user").val();
        if (valor.trim() == "") {
            alertify.alert("Busca producto", "No ingreso el nombre o codigo de prducto a buscar...")
            event.preventDefault();
        }
        else {
            $("#contenido").load("productos/principal.php?like=1&valor=" + valor);
        event.preventDefault();
            

        }

    });
});