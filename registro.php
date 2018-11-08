<!DOCTYPE html>
<html>
<head>
    <?php include("head.php") ?>
    <title>Login</title>
</head>
<body class="bcolor">
    <?php include("nav.php")?>
    <div class="fondo">
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at" for="usuario"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingrese Email" id="usuario">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">                         
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" id="pass">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">                         
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" id="pass2" name="pass2" data-togle="pass2">
                        </div>
                        
                        <div class="row align-items-center remember">
                            <input type="checkbox">Recordar
                        </div>
                        <div class="form-group ">
                            <input type="submit" value="Registrar" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
<?php include("footer.php")?>
</body>
</html>