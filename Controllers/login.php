<?php 
    session_start();
    include '../Models/conexion.php';
    include '../Models/login.php';
    include '../Models/procesos.php';
    include 'prosesos.php';

    if(isset($_POST['acclogin']))
    {
        $user = $_POST['user'];
        echo "<br>";
        $passw = $_POST['passw'];

        AccesoLogin($user, $passw);
        
    }
    elseif(isset($_POST['olvide']))
    {
        header("Location: ../views/olvide_clave.php");
    }
    elseif(isset($_POST['cambioClave']))
    {
        $token = $_POST['token'];
        $passw1 = $_POST['passw1'];
        $passw2 = $_POST['passw2'];

        CambioClave($token,$passw1,$passw2);
    }
    else{
        header("Location: ../index.php");
    }
?>