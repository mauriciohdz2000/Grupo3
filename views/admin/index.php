<?php
session_start();
include '../../Controllers/redireccionar.php';
$user = $_SESSION["user"];
$redic = new Rd();
$redic->Admin();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <!--CSS-->
    <link rel="stylesheet" href="../../Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Public/css/boststrap-theme.css">
    <link rel="stylesheet" href="../../Public/css/estilo.css">
    <link rel="stylesheet" href="../../Public/css/alertify.min.css">
    <link rel="stylesheet" href="../../Public/css/default.min.css">
    <!--JS-->
    <script src="../../Public/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../../Public/js/jquery-1.9.1.min.js"></script>
    <script src="../../Public/js/bootstrap.min.js"></script>
    <script src="../../Public/js/funciones-navbar.js"></script>
    <script src="../../Public/js/alertify.min.js"></script>
    <script src="https://kit.fontawesome.com/05f4903dc9.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php include 'navbar/navbar.php'; ?>
    <div class="container-fluid" id="contenido">
        <div class="alert alert-success" style="width: 400px;">
            <h6><b>Bienvenido/a <?php echo $user; ?></b></h6>
        </div>
    </div>
    <?php
    include './modals/update_user.php';
    include './modals/new_passw.php';
    include './modals/update_cate.php'
    ?>
</body>

</html>