<?php
session_start();
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';
$cont = 0;
$pagina = 0;

if (isset($_GET['num'])) {
    $pagina = $_GET['num'];
}
if (isset($_GET['num_reg'])) {
    $registros = $_GET['num_reg'];
} else {
    $registros = 1;
}

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $registros;
}
$query = "SELECT * FROM proveedores";

if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    $queryLike = "SELECT * FROM proveedores WHERE id_proveedor LIKE '%$valor%' OR nombre LIKE 
    '%$valor%'";
    $dataProve = CRUD($queryLike, "s");
} else {
    $dataProve = CRUD("SELECT * FROM proveedores ORDER BY id_proveedor LIMIT 
    $inicio,$registros", "s");
}

$num_registro = CountReg($query);

$paginas = ceil($num_registro / $registros);

?>
<script src="../../Public/js/funciones-navbar.js"></script>
<script src="../../Public/js/funciones-proveedores.js"></script>
<div class="card">
    <div class="card-header bg-dark text-white">
        <b>Panel De Proveedores</b>
    </div>
    <div class="card-body">
        <div id="result-form">
            <div class="row">
                <div class="col-md-4">
                    <form id="data-prove">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Proveedor: </span>
                            </div>
                            <input type="text" name="proveedor" class="form-control" placeholder="Usuario" required="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Direccion: </span>
                            </div>
                            <input type="text" name="direccion" class="form-control" placeholder="Direccion" required="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Telefono: </span>
                            </div>
                            <input type="text" name="telefono" class="form-control" placeholder="Telefono" required="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Correo: </span>
                            </div>
                            <input type="text" name="correo" class="form-control" placeholder="proveedor@gmail.com" required="ON">
                        </div>
                        <div style="margin-top:10px">
                            <button class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <select id="select-reg" class="custom-select" style="width: 250px;">
                                    <option value="0" disabled selected>Selccione N° Registros</ option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="9">9</option>
                                    <option value="12">12</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="search" class="form-control" placeholder="Buscar proveedor" id="like-user" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <?php if ($dataProve) : ?>
                        <?php include 'table_proveedor.php'; ?>
                        <?php
                        if ($num_registro > $registros) : ?>
                            <?php if ($pagina == 1) : ?>
                                <div style="text-align: center;">
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 0); ?>" num-reg="<?php echo $registros; ?>">
                                        <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
                                    </a>
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros; ?>">
                                        <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
                                    </a>
                                </div>
                            <?php elseif ($pagina == $paginas) : ?>
                                <div style="text-align: center;">
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros; ?>">
                                        <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
                                    </a>
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 0); ?>" num-reg="<?php echo $registros; ?>">
                                        <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div style="text-align: center;">
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros; ?>">
                                        <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
                                    </a>

                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros; ?>">
                                        <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
                                    </a>
                                </div>
                            <?php endif ?>
                        <?php else : ?>
                            <div class="alert alert-danger">No se encontraron datos...</div>
                        <?php endif ?>
                    <?php else : ?>
                        <div class="alert alert-info">Datos no encontrados ...</div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>