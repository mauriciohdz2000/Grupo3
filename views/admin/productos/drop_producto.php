<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

$id_producto = $_GET['id'];

$updDrop = CRUD("DELETE FROM `productos` WHERE `productos`.`id` =$id_producto", "d");
?>
<?php if($updDrop):?>
    <script>
        alertify.success("producto eliminado exitosamente");
        //$("#ProdUpd").modal('hide');
        $("#contenido").load("productos/principal.php");
    </script>
<?php else:?>
    <script>
        alertity.error("Error al borrar producto");
        //$("#ProdUpd").modal('hide');
        $("#contenido").load("productos/principal.php");
    </script>
<?php endif?>