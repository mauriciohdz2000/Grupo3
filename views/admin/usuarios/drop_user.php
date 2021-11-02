<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

$idusuario = $_GET['idusuario'];

$updDrop = CRUD("DELETE FROM `usuarios` WHERE `usuarios`.`idusuario` =$idusuario ", "d");
?>