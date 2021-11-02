<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

$id_proveedor = $_GET['id_proveedor'];

$dataProveedor = CRUD("SELECT * FROM proveedores WHERE id_proveedor='$id_proveedor'", "s");

foreach ($dataProveedor as $result) {
    $nombre = $result['nombre'];
    $direccion = $result['direccion'];
    $telefono = $result['telefono'];
    $correo = $result['correo'];
}

?>
<script src="../../Public/js/funciones-proveedores.js"></script>
<form id="UPDProveedor">
    <!-- este id se utiliza para idetificar el proveedor que se editara. -->
    <input type="hidden" name="id_proveedor" value="<?php echo $id_proveedor; ?>">
    <!-- formulario el cual se llenara con los valores -->


   <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Proveedor: </span>
        </div>
        <input type="text" name="proveedor" class="form-control" placeholder="Usuario" required="ON" value="<?php echo $nombre; ?>">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Direccion: </span>
        </div>
        <input type="text" name="direccion" class="form-control" placeholder="Direccion" required="ON" value="<?php echo $direccion; ?>">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Telefono: </span>
        </div>
        <input type="text" name="telefono" class="form-control" placeholder="Telefono" required="ON" value="<?php echo $telefono; ?>">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Correo: </span>
        </div>
        <input type="text" name="correo" class="form-control" placeholder="proveedor@gmail.com" required="ON" value="<?php echo $correo; ?>">
    </div>


    <button class="btn btn-primary">Actualizar</button>
</form>