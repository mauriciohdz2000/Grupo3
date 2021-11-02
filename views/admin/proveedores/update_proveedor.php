<?php

include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

echo $id_proveedor = $_POST['id_proveedor'];
echo $nombre= $_POST['proveedor'];
echo $direccion = $_POST['direccion'];
echo $telefono = $_POST['telefono'];
echo $correo = $_POST['correo'];
?>
<?php if (CRUD(" UPDATE proveedores SET nombre ='$nombre',direccion='$direccion',telefono='$telefono',correo='$correo'  WHERE id_proveedor='$id_proveedor'", "u")) : ?>
    <script>
        alertify.success("Proveedor Actualizado...");
        $('#UserUpd').modal('hide');
        $("#contenido").load("proveedores/principal.php");
    </script>
<?php else : ?>
    <script>
        alert("Error al actualizar Proveedor...");
        $('#UserUpd').modal('hide');
        $("#contenido").load("proveedores/principal.php");
    </script>
<?php endif ?>