<?php
    include('../config/config.php');
    include('../sesion.php');
    $userClass = new userClass();
    include('../clases/tablas.php');
    $tablas= new tablaServicio(); 

  ?>
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
                        <a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
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
            <?php 
              if(in_array(24,$userClass->userDetails($_SESSION['uid']))){
                include('administrador-nav.php');
              }
              if(in_array(22,$userClass->userDetails($_SESSION['uid']))){
                include('usuario-nav.php');
              }
              if(in_array(23,$userClass->userDetails($_SESSION['uid']))){
                include('taller-nav.php');
              }
              
            ?>
            <!--?php ?--> 
            <!--??--> 
          </ul>	
        </section>
      </aside>
      <div class="content-wrapper" >
        <!-- contenido -->
        <?php 
          //$result= $userClass->userDetails($_SESSION['uid']);**/
          
        
          
          if(in_array(23,$userClass->userDetails($_SESSION['uid']))){
            include('taller-main.php');
          }

          if(in_array(24,$userClass->userDetails($_SESSION['uid']))){
           include('usuario-main.php');
          }
          
          if(in_array(24,$userClass->userDetails($_SESSION['uid']))){
            include('administrador-main.php');
            
          }
          
       
          
        ?>
   
        <!--?php include('taller-main.php')?-->
        <!--?php ?-->
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
  
  
  </body>
</html>


