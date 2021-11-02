<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

$idusuario = $_GET['idusuario'];

$dataUser = CRUD("SELECT * FROM usuarios WHERE idusuario='$idusuario'", "s");
?>

<script src="../../Public/js/funciones-usuarios.js"></script>
<form id="UPDPassw">
<input type="hidden" name="idusuario" value="<?php echo $idusuario;?>">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nueva contraseña: </span>
        </div>
        <input type="password" name="clave" class="form-control" required="ON">
    </div>

        <button class="btn btn-primary">Actualizar</button>
</form>