<?php
    include '../../../Models/conexion.php';
    include '../../../Controllers/prosesos.php';
    include '../../../Models/procesos.php';

        //$objeto = new ConexionBD();
        //$conexion = $objeto->get_conexion();
    
        $idusuario = $_POST['idusuario'];
        $clave = password_hash($_POST['clave'],PASSWORD_DEFAULT);

?>

<?php if(CRUD("UPDATE usuarios SET clave = '$clave' WHERE idusuario ='$idusuario'", "u")):?>
    <script>
        alertify.success("Clave Actualizado...");
        $('#modalKeyUpd').modal('hide');
        $("#contenido").load("usuarios/principal.php");
    </script>
<?php else:?>
    <script>
        alertify.error("Error al actualizar clave...");
        $('#modalKeyUpd').modal('hide');
        $("#contenido").load("usuarios/principal.php");
    </script>
<?php endif?>