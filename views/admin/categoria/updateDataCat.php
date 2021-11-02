<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

$id_categoria = $_GET['id_categoria'];

$dataUser = CRUD("SELECT * FROM categorias WHERE id_categoria='$id_categoria'", "s");

foreach ($dataUser as $result) {
    $categoria = $result['categoria'];
}
?>
<script src="../../Public/js/funciones-categoria.js"></script>
<form id="UPDCat">
    <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Categoria: </span>
        </div>
        <input type="text" name="categoria" class="form-control" value="<?php echo $categoria; ?>" required="ON">
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>