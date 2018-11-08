<!DOCTYPE html>
  <html lang="es">
  <head>
    <?php include("head.php")?>
    <title>La Tuerca</title>
  </head>

  <body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <b class="logo-mini">
            <span class="light-logo"><img src="images/aries-light-2.png" alt="logo"></span>
          </b>
            <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
          LA Tuerca
          </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav" >  
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-cog fa-spin"></i>
                </a>
                <ul class="dropdown-menu scale-up">
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row no-gutters">
                      <div class="col-12 text-left">
                        <a  data-toggle="modal" data-target="#modal-cuenta"><i class="ion ion-person" ></i>Perfil</a>
                      </div>
                      <div class="col-12 text-left">
                        <a data-toggle="modal"data-target="#modal-contraseña"><i class="ion ion-settings"></i> Cuenta </a>
                      </div>
                      <div role="separator" class="divider col-12">                    
                      </div>
                      <div class="col-12 text-left">
                        <a href="#"><i class="fa fa-power-off"></i> Logout</a>
                      </div>				
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar"> 
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <?php include('usuario-nav.php')?>
            <!--?php include('taller-nav.php')?--> 
            <!--?php include('administrador-nav.php')?--> 
          </ul>	
        </section>
      </aside>
      <div class="content-wrapper" >
        <!-- contenido -->
        <?php include('usuario-main.php')?>
        <!--?php include('taller-main.php')?-->
        <!--?php include('administrador-main.php')?-->
        <!-- /contenido -->
      </div>
      <!-- footer -->
      <footer class="main-footer">
          <?php include("footer.php")?>
      </footer>
      <!-- footer -->

    </div>

  <!-------------------------MODALES--------------------------------->
  <!------Modal Contraseña------------------------------->
  <div id="modal-contraseña" class="modal fade in show" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Cambiar Contraseña</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal form-element" id="formcontraseña">												
            <div class="col-md-12 m-b-20">
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Cotraseña Actual" id="password"> 
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Nueva Cotraseña" id="password2"> 
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Repetir Cotraseña" id="password3"> 
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Guardar</button>
          <button type="button" class="btn btn-default float-right" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
      <!-- /.modal-dialog -->
  </div>
  <!------Modal Cuenta----------------------------------->
  <div id="modal-cuenta" class="modal fade in show" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal form-element"id="formcuenta">												
            <div class="form-group">
              <h5>Nombre:<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="text" class="form-control" placeholder="Ej: Juancho " required="" data-validation-required-message="Este campo es Necesario"> 
              </div>
              <div class="form-control-feedback">
                <small>Ingrese un atributo valido para este campo.</small>
              </div>
            </div>
            <div class="form-group">
              <h5>Apellido:<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="text" class="form-control" placeholder="Ej: Talarga " required="" data-validation-required-message="Este campo es Necesario"> 
              </div>
              <div class="form-control-feedback"><small>Ingrese un atributo valido para este campo.</small>
              </div>
            </div>
            <div class="form-group">
              <h5>Tipo de Documento <span class="text-danger">*</span></h5>
              <div class="controls">
                <select name="select" id="seleccion1" required="" class="form-control" data-validation-required-message="Este campo es Necesario">
                  <option value="">Seleccione tipo de Documento</option>
                  <option value="1">D.N.I.</option>
                  <option value="2">L.C./L.E.</option>
                  <option value="3">Pasaporte</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <h5>Numero de Documento: <span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="noChar" class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Ingrese solamente Numeros, de entre 6 a 8 digitos " max="8" min="6" minlength="6" maxlength="8" data-validation-required-message="Este campo es requerido"> 
              </div>
            </div>
            <div class="form-group">
              <h5>Calle:<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="text" class="form-control" required="" data-validation-required-message="Este campo es Necesario"> 
              </div>
              <div class="form-control-feedback">
                <small>Ingrese un atributo valido para este campo.</small>
              </div>
            </div>
            <div class="form-group">
              <h5>Numero: <span class="text-danger">*</span></h5>
              <div class="controls">
              <input type="number" name="onlyNum" class="form-control" required="" data-validation-required-message="Este campo es Necesario"> 
              </div>
            </div>
            <div class="form-group">
              <h5>Piso:<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="noChar" class="form-control" required="" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Ingrese solamente Numeros, de entre 6 a 8 digitos " max="8" min="6" minlength="6" maxlength="8" data-validation-required-message="Este campo es Necesario"> 
              </div>
            </div>
            <div class="form-group">
              <h5>Departamento:<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="text" class="form-control" required="" data-validation-required-message="Este campo es Necesario"> 
                </div>
                <div class="form-control-feedback">
                  <small>Ingrese un atributo valido para este campo.</small>
                </div>
            </div>
            <div class="form-group">
              <h5>Localidad:<span class="text-danger">*</span></h5>
              <div class="controls">
                <select name="select" id="selecion2" required="" class="form-control" data-validation-required-message="Este campo es Necesario">
                  <option value="">Seleccione una Localidad:</option>
                  <option value="1">Lomas de Zamora</option>
                  <option value="2">Banfield</option>
                  <option value="3">Temperley</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <h5>Codigo Postal: <span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="number" name="onlyNum" class="form-control" required="" data-validation-required-message="Este campo es Necesario" max="4">
              </div>
            </div>
            <div class="form-group">
              <h5>Telefono:<span class="text-danger">*</span></h5>
              <div class="input-group"> 
                <input type="number" name="onlyNum" class="form-control" required="" data-validation-required-message="Este campo es Necesario"> 
              </div>
            </div>
            <div class="form-group">
              <h5>Correo de Email:<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Email incorrecto, ingrese uno vaido" required="" data-validation-required-message="Este campo es Necesario"> 
              </div>
            </div>
            <div class="form-group">
              <h5>Contraseña:<span class="text-danger">*</span></h5>
              <div class="input-group"> 
                <input type="password" name="text" max="12" min="6" minlength="6" maxlength="12" class="form-control" required="" data-validation-required-message="Este campo es Necesario"> 
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">Guardar</button>
          <button type="button" class="btn btn-default float-right" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
      <!-- /.modal-dialog -->
  </div>
  </body>
</html>


