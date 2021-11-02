$(document).ready(function () {
    /* Cargar vista usuario */
    $(".user").click(function(event) {
        $("#contenido").load("usuarios/principal.php");
        event.preventDefault();
    });
     /* Cargar vista de productos */
    $(".product").click(function(event) {
        $("#contenido").load("productos/principal.php");
        event.preventDefault();
    });

     /* Cargar vista de Categorias */
    $(".categorias").click(function(event) {
        $("#contenido").load("categoria/principal.php");
        event.preventDefault();
    });

     /* Cargar vista de Categorias */
     $(".proveedores").click(function(event) {
        $("#contenido").load("proveedores/principal.php");
        event.preventDefault();
    });
     /* Cargar vista de Categorias */
     $(".inventario").click(function(event) {
        $("#contenido").load("inventario/principal.php");
        event.preventDefault();
    });
    
    /* btn salir*/
    $(".exit-sys").click(function () {
        if (confirm('Seguro/a en cerrar sesion')) {
            $("#contenido").load("../../index.php");
        }
        else {
            alert('Cierre de sesion cancelado');
            $("#contenido").load("usuarios/principal.php");
        }
    });
// funcion para eliminar el usuario
    $(".exit-sys1").click(function () {
        if (confirm('Seguro/a que desea eliminar el usuario')) {
            $("#contenido").load("usuarios/principal.php"); 
        }
        else {
            alert('Eliminar usuario cancelado');
            $("#contenido").load("usuarios/principal.php");
        }
    });
    //funcion para eliminar la categoria
    $(".eliminar-sys1").click(function () {
        if (confirm('Seguro/a que desea eliminar la categoria')) {
            $("#contenido").load("categoria/principal.php"); 
        }
        else {
            alert('Eliminar la categoria cancelada');
            $("#contenido").load("categoria/principal.php");
        }
    });
    // funcion para eliminar el proveedor
    $(".exit-provee").click(function () {
        if (confirm('Seguro/a que desea eliminar el proveedor')) {
            $("#contenido").load("proveedores/principal.php"); 
        }
        else {
            alert('Eliminar el proveedor cancelado');
            $("#contenido").load("proveedores/principal.php");
        }
    });

    // para la confirmacion de eliminar un producto
    $(".exit-sys3").click(function () {
        if (confirm('Seguro/a que desea eliminar el producto')) {
            $("#contenido").load("productos/principal.php"); 
        }
        else {
            alert('Eliminar el producto cancelado');
            $("#contenido").load("productos/principal.php");
        }
    });
});