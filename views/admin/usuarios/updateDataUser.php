<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

$idusuario = $_GET['idusuario'];

$dataUser = CRUD("SELECT * FROM usuarios WHERE idusuario='$idusuario'", "s");

foreach ($dataUser as $result) {
    $usuario = $result['usuario'];
    $tipo = $result['tipo'];
}
if ($result['tipo'] == 1) {
    $tipoUser = "Administrador";
} else {
    $tipoUser = "Operador";
}
?>
<script src="../../Public/js/funciones-usuarios.js"></script>
<form id="UPDUser">
    <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Usuario: </span>
        </div>
        <input type="text" name="user" class="form-control" value="<?php echo $usuario; ?>" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Tipo Usuario:</label>
        </div>
        <select class="custom-select" name="tipo_user" id="tipo-user">
            <option value="<?php echo $tipo; ?>"><?php echo $tipoUser; ?></option>
            <?php if ($tipo == 1) : ?>
                <option value="2">Operador</option>
            <?php else : ?>
                <option value="1">Administrador</option>
            <?php endif ?>
        </select>
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>