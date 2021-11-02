<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';


//$objeto = new ConexBD();
//$conexion = $objeto->get_conexion();

$proveedor = $_POST['proveedor'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$tabla = "proveedores";
$campos = "nombre, direccion, telefono, correo";
$valores = "'$proveedor','$direccion','$telefono','$correo'";

$query1 = "SELECT * FROM proveedores WHERE nombre = '$proveedor'";
$query2 = "INSERT INTO $tabla($campos) VALUES($valores)";

//$insertData = $conexion->query("INSERT INTO $tabla ($campos) VALUES ($valores)");
?>
<?php if (CountReg($query1) > 0) : ?>
    <script>
        alertify.error("Proveedor ya registrado intente con uno nuevo ....");
        $("#contenido").load("proveedores/principal.php");
    </script>
<?php else : ?>

    <?php if (CRUD($query2, "i")) : ?>
        <script>
            alertify.success("Datos registrados...");
            $("#contenido").load("proveedores/principal.php");
        </script>
    <?php else : ?>
        <script>
            alert("Error datos no registrados...");
            $("#contenido").load("proveedores/principal.php");
        </script>
    <?php endif ?>
<?php endif ?>