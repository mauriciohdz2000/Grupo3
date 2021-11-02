<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';


//$objeto = new ConexBD();
//$conexion = $objeto->get_conexion();

$nombre_producto = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$precio_compra = $_POST['precio_compra'];
$cantidad = $_POST['cantidad'];
$precio_venta = $_POST['precio_venta'];

//obtener atributo de archivo

$imgFile = $_FILES['imagen']['name'];
$tmp_dir = $_FILES['imagen']['tmp_name'];
$imgSize = $_FILES['imagen']['size'];

$path = "../../../Public/img/img_productos/";

$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); //Obtenemos la extencion del archivo//
$newName = $nombre_producto.".".$imgExt; //Asignamos un nuevo nombre al archivo//

$carga_img = CargaIMG($tmp_dir, $newName, $path);

$tabla = "productos";
$campos = "nombre_producto,descripcion, precio_compra, cantidad, precio_venta,  imagen_cate";
$valores = "'$nombre_producto','$descripcion','$precio_compra','$cantidad','$precio_venta','$newName'";

$query1 = "SELECT * FROM productos WHERE nombre_producto = '$nombre_producto'";

//$insertData = $conexion->query("INSERT INTO $tabla ($campos) VALUES ($valores)");
?>
<?php if (CountReg($query1) > 0) : ?>
    <script>
        alertify.error("El producto es existente en la base de datos ....");
        $("#contenido").load("productos/principal.php");
    </script>
<?php else : ?>
    <?php
    switch ($carga_img) {                      
        case 0;
            echo
            '<script>
                    alertify.error("Error Datos e imagen no cargados...");
                    $("#contenido").load("productos/principal.php");
            </script>';
            break;
        case 1:
            $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";

            if (CRUD($query2, "i")){
                echo 
                '<script>
                    alertify.success("Datos registrados...");
                    $("#contenido").load("productos/principal.php");
                </script>';
            }
            else{
                echo 
                '<script>
                    alert("Error datos no registrados...");
                    $("#contenido").load("productos/principal.php");
                </script>';
            }
            break;
    }
    ?>
<?php endif ?>