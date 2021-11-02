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
$query = "SELECT * FROM usuarios";

if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    $queryLike = "SELECT * FROM usuarios WHERE idusuario LIKE '%$valor%' OR usuario LIKE 
    '%$valor%'";
    $dataUser = CRUD($queryLike, "s");
} else {
    $dataUser = CRUD("SELECT * FROM usuarios ORDER BY idusuario LIMIT 
    $inicio,$registros", "s");
}

$num_registro = CountReg($query);

$paginas = ceil($num_registro / $registros);

?>
<script src="../../Public/js/funciones-navbar.js"></script>
<script src="../../Public/js/funciones-usuarios.js"></script>
<script src="../../Public/js/js_funciones.js"></script>
<div class="card">
    <div class="card-header bg-dark text-white">
        <b>Panel Usuarios</b>
    </div>
    <div class="card-body">
        <div id="result-form">
            <div class="row">
                <div class="col-md-4">
                    <form id="data-user">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Usuario: </span>
                            </div>
                            <input type="text" name="user" class="form-control" placeholder="Usuario" required="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Contraseña: </span>
                            </div>
                            <input type="password" name="clave" class="form-control" required="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Tipo Usuario:</label>
                            </div>
                            <select class="custom-select" name="tipo_user" id="tipo-user">
                                <option value="0" disabled selected>Seleccione Tipo</option>
                                <option value="1">Administrador</option>
                                <option value="2">Operador</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="imagen" id="imagen" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <div>
                            <img src="" width="200px" alt="" id="muestraimagen">
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
                                <input type="search" class="form-control" placeholder="Buscar usuario" id="like-user" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <?php if ($dataUser) : ?>
                        <?php include 'table_usuarios.php'; ?>
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