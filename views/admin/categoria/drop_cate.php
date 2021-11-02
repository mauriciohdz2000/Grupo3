<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

$id_categoria = $_GET['id_categoria'];

$updDrop = CRUD("DELETE FROM `categorias` WHERE `categorias`.`id_categoria` =$id_categoria ", "d");
?>