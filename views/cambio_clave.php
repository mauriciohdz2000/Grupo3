<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio clave</title>

    <!--CSS-->
    <link rel="stylesheet" href="../Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/css/boststrap-theme.css">
    <link rel="stylesheet" href="../Public/css/estilo.css">
    <!--JS-->
    <script src="../Public/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../Public/js/jquery-1.9.1.min.js"></script>
    <script src="../Public/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/05f4903dc9.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="../Controllers/login.php" method="POST">
                    <div class="input-group mb-3" style="width: 300px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input type="text" name="token" class="form-control" placeholder="Token" required="ON">
                    </div>
                    <div class="input-group mb-3" style="width: 300px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input type="password" name="passw1" class="form-control" placeholder="Nueva contraseña" required="ON">
                    </div>
                    <div class="input-group mb-3" style="width: 300px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input type="password" name="passw2" class="form-control" placeholder="Repita contraseña" required="ON">
                    </div>
                    <div>
                        <button class="btn btn-primary" name="cambioClave">Procesar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</body>

</html>