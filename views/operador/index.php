<?php
session_start();
include'../../Controllers/redireccionar.php';
$user = $_SESSION["user"];
$redic = new Rd();
$redic->Operador();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>
    <h3><b>Operador/a <?php echo $user; ?></b></h3>
</body>
</html>