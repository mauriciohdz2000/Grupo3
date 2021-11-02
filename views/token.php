<?php
include '../Models/conexion.php';
include '../Controllers/prosesos.php';
include '../Models/procesos.php';

$user = $_POST['user'];
$email= $_POST['email'];

$buscaUser = buscavalor("usuarios", "COUNT(usuario)","usuario = '$user'");
$buscaEmail = buscavalor("usuarios","COUNT(usuario)","usuario = '$user' AND email = '$email'");

if($buscaUser != 0 AND $buscaEmail !=0){
    $Token= Token(8);
    Email($email,$Token);

    $update = CRUD("UPDATE usuarios SET token ='$Token' WHERE usuario='$user'","u");

    if($update)
    {
        header("Location: cambio_clave.php");
    }else{

    }
}
else{

}
