<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

$id_proveedor = $_GET['id_proveedor'];

$updDrop = CRUD("DELETE FROM `proveedores` WHERE `proveedores`.`id_proveedor` =$id_proveedor ", "d");
?>