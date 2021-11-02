<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';


//$objeto = new ConexBD();
//$conexion = $objeto->get_conexion();

//obtenemos los atributos del archivo 

$imgFile = $_FILES['imagen']['name'];
$tmp_dir = $_FILES['imagen']['tmp_name'];
$imgSize = $_FILES['imagen']['size'];



$user = $_POST['user'];

$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

$tipo = $_POST['tipo_user'];

//obtener atributo de archivo

$imgFile = $_FILES['imagen']['name'];
$tmp_dir = $_FILES['imagen']['tmp_name'];
$imgSize = $_FILES['imagen']['size'];

$path = "../../../Public/img/usuarios/";

$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); //Obtenemos la extencion del archivo//
$newName = $user.".".$imgExt; //Asignamos un nuevo nombre al archivo//

$carga_img = CargaIMG($tmp_dir, $newName, $path);

$tabla = "usuarios";
$campos = "usuario, clave, token, tipo,foto, estado";
$valores = "'$user','$clave',NULL,'$tipo','$newName',1";

$query1 = "SELECT * FROM usuarios WHERE usuario = '$user'";

//$insertData = $conexion->query("INSERT INTO $tabla ($campos) VALUES ($valores)");
?>
<?php if (CountReg($query1) > 0) : ?>
    <script>
        alertify.error("Usuario ya registrado intente con uno nuevo ....");
        $("#contenido").load("usuarios/principal.php");
    </script>
<?php else : ?>
    <?php
    switch ($carga_img) {                      
        case 0;
            echo
            '<script>
                    alertify.error("Error Datos e imagen no cargados...");
                    $("#contenido").load("usuarios/principal.php");
            </script>';
            break;
        case 1:
            $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";

            if (CRUD($query2, "i")){
                echo 
                '<script>
                    alertify.success("Datos registrados...");
                    $("#contenido").load("usuarios/principal.php");
                </script>';
            }
            else{
                echo 
                '<script>
                    alert("Error datos no registrados...");
                    $("#contenido").load("usuarios/principal.php");
                </script>';
            }
            break;
    }
    ?>
<?php endif ?>