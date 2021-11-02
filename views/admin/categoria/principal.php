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
$query = "SELECT * FROM categorias";

if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    $queryLike = "SELECT * FROM categorias WHERE id_categoria LIKE '%$valor%' OR categoria LIKE 
    '%$valor%'";
    $dataCate = CRUD($queryLike, "s");
} else {
    $dataCate = CRUD("SELECT * FROM categorias ORDER BY id_categoria LIMIT 
    $inicio,$registros", "s");
}

$num_registro = CountReg($query);

$paginas = ceil($num_registro / $registros);

?>
<script src="../../Public/js/funciones-navbar.js"></script>
<script src="../../Public/js/funciones-categoria.js"></script>
<script src="../../Public/js/js_funciones.js"></script>
<div class="card">
    <div class="card-header bg-dark text-white">
        <b>Panel De Categoria</b>
    </div>
    <div class="card-body">
        <div id="result-form">
            <div class="row">
                <div class="col-md-4">
                    <form id="data-cate">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Categoria: </span>
                            </div>
                            <input type="text" name="categoria" class="form-control" placeholder="Nombre de producto" required="ON">
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
                                <input type="search" class="form-control" placeholder="Buscar categoria" id="like-user" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <?php if ($dataCate) : ?>
                        <?php include 'tabla_categoria.php'; ?>
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