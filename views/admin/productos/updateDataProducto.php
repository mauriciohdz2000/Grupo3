<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';
$id_producto = $_GET['id'];

$dataProducto = CRUD("SELECT * FROM productos WHERE id='$id_producto'", "s");

foreach ($dataProducto as $result) {
    $nombre_producto= $result['nombre_producto'];
    $descripcion= $result['descripcion'];
    $precio_compra= $result['precio_compra'];
    $cantidad= $result['cantidad'];
    $precio_venta= $result['precio_venta'];
    $imagen_cate= $result['imagen_cate'];  
}
?>
<script src="../../Public/js/funciones-productos.js"></script>
<form id="UPDproducto">
    <!-- id para identificar el producto que estamos utilizando -->
    <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">


    <!-- formulario para actualizar el producto -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Producto: </span>
        </div>
        <input type="text" name="nombre_producto" value="<?php echo $nombre_producto; ?>" class="form-control" placeholder="Nombre de producto" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Descripcion: </span>
        </div>
        <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>" placeholder="Descripcion" required="ON">
    </div>
    <!-- agregar el precio del producto -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Precio Compra</span>
        </div>
        <input type="text" name="precio_compra" class="form-control" value="<?php echo $precio_compra; ?>" placeholder="Precio Compra" required="ON">
    </div>
    <!-- agregar la cantidad en stock del producto -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Cantidad </span>
        </div>
        <input type="number" name="cantidad" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Cantidad" required="ON">
    </div>
    <!-- agregar precio de venta del producto -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Precio Venta</span>
        </div>
        <input type="text" name="precio_venta" class="form-control" value="<?php echo $precio_venta; ?>" placeholder="Precio Venta" required="ON">
    </div>
    <!--Agregar la foto del producto  -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="imagen"  id="imagen" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Agregar Imagen</label>
        </div>
    </div>
    <div>
        <img src="" width="200px" alt="" id="muestraimagen">
    </div>

    <button class="btn btn-primary">Actualizar</button>
</form>