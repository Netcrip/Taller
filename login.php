<!DOCTYPE html>
<html>
<head>
    <?php include("head.php") ?>
    <title>Login</title>
</head>
<body class="bcolor">
    <?php
        include ("config/config.php");
        include ('clases/ClaseUsuario.php');
        $userClass = new userClass();
        $errorMsgReg = '';
        $errorMsgLogin = '';
        /* Login Form */
        if (!empty($_POST['loginSubmit'])) {
            $usernameEmail = $_POST['usernameEmail'];
            $password = $_POST['password'];
            if (strlen(trim($usernameEmail)) > 1 && strlen(trim($password)) > 1) {
                $uid = $userClass->userLogin($usernameEmail, $password);
                if ($uid) {
                    $userClass->userDetails($uid);
                    $url = 'taller/index.php';
                    header("Location: $url"); // Page redirecting to home.php
                    
                } else {
                    $errorMsgLogin = "Please check login details.";
                }
            }
        }
    ?>
    <?php include("nav.php")?>
    <div class="fondo">
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="" name="login">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at" for="usuario"></i></span>
                            </div>
                            <input type="text" class="form-control"  name="usernameEmail" placeholder="Ingrese Email" >
            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">                         
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Contraseña">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Recordar
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn" name="loginSubmit">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        ¿No tienes Cuenta?<a href="./registro.php">Crear</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">¿Olvidaste la contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<?php include("footer.php")?>
</body>
</html>