<section class="content-header text-center dropdown-toggle" data-toggle="collapse" href="#Taller">
  <h1 >
    Taller
  </h1>  
</section>
<div class="collapse" id="Taller">
  <section>
    <!-- Main content -->
      <!-- /tabla -->  
      <div class="box-body">
        <h4 class="box-title">Ordenes de Trabajo del Dia:</h4>
        <div class="col-12">
          <input class="form-control text-center col-6 offset-md-10" type="date" value="" id="fechaparaordenes">  
        </div>
          <!-- /.box-header -->
      </div>
      <div class="box-body">
          <table class="table table-hover table-responsive tablas" id="tordenes">
                <thead>
                  <tr>
                    <th>O. Trabajo</th>
                    <th>Dominio</th>
                    <th>Horario</th>
                    <th class="d-none sm-block ">Cantidad de servicio</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="tordenesbody">
                </tbody>
          </table>
      </div>

        <!-- Tabla para -->   
        <div class="box">
          <h2>Solicitudes de Ordenes</h2>
        </div>
        
        <div class="box-body">
            <table class="table table-hover table-responsive tablas" id="solturnos">
              <thead>
                <tr>
                  <th>N° Solicitud</th>
                  <th>Dominio</th>
                  <th>Servicio</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="Solicitudbody">
            
              </tbody>
            </table>
        </div>


  </section>
</div>

<!----------------modal--------------------> 

  <div class="modal center-modal fade" id="asignar-turno" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="asignarturnotitulo">Asignarturno Orden</h5>
          <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="">Asignacion de Turno: </label>
           <h5 id="asignarturnosolicitudnro"> NNN</h5>
          <div class="col-md-12 col-12">
            <form action="">
              <div class="form-group">
                <label for="dominioserv">Dimonio:</label>
                <input type="text" class="form-control" disabled  placeholder="AF-352-LS" id="dominioserv"> 
              </div>
              <div clase="form-check form-check-inline nuevo-turnoscroll" id="serviciocheckorden" >
                  <?php
                  $sth=$tablas->gettablaservicio();
                  $thservicio= $sth->fetchAll();
                  if($sth->rowCount()):
                    foreach($thservicio as $row){ ?>  
                    <input class="form-check-input col-4" type="checkbox" name="checkservicioserviciosorden" disabled id='a<?php echo $row['codserv']; ?>' value='<?php echo $row['codserv'];?>'> 
                    <label class="form-check-label col-6" for="a<?php echo $row['codserv']; ?>"><?php echo $row['nombre']; ?></label><br>                       
                    <?php }  ?>
                  <?php endif;  ?>
              </div>
              <div class="form-group">
                <label for="dominioserv">El cliente apreciaria el el turno sea:</label>
                <textarea type="text" id="observacioneclientesolicitud" class="form-control" disabled id="Info" style="resize:none"  rows="3"></textarea>
              </div>
              <div class="form-group">
              <label for="dominioserv">Observaciones:</label>
                <textarea type="text" id="tallerobservacioneclientesolicitud" class="form-control"  id="Info" style="resize:none"  rows="3"></textarea>
              </div>
              <div class="form-group">
                <input class="form-control" type="date" value="2011-08-19" id="fechasolicitudorden">
                <input class="form-control" type="time" value="13:45:00" id="horasolicitudorden">
              </div>
            </form>
          </div>

        </div>
          <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="btnasignarturno"class="btn btn-bold btn-pure btn-primary float-right">Asignar Turno</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal center-modal fade" id="editar-orden" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarordenestitulo">Editar Orden</h5>
          <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12 col-12">
          <label for="">Orden a editar: </label>
           <h5 id="editarordennumero"> NNN</h5>
            <form id="formeditarturno" >
              <div class="form-group">
                <label for="dominioeditarorden">Dominio:</label>
                <input type="text" id="dominioeditarorden"class="form-control" disabled > 
              </div>
              <label>Seleccion de servicio</label>
              <div clase="form-check form-check-inline nuevo-turnoscroll" id="modificarturnochek" >
                  <?php
                  $sth=$tablas->gettablaservicio();
                  $thservicio= $sth->fetchAll();
                  if($sth->rowCount()):
                    foreach($thservicio as $row){ ?>  
                    <input class="form-check-input col-4" type="checkbox" name="checkserviciomodificar" id='<?php echo $row['codserv']; ?>' value='<?php echo $row['codserv']; ?>'> 
                    <label class="form-check-label col-6" for="<?php echo $row['codserv']; ?>"><?php echo $row['nombre']; ?></label><br>                       
                    <?php }  ?>
                  <?php endif;  ?>
              </div>
            
              <div class="form-group">
                <input class="form-control" type="date" id="editarordenfecha">
                <input class="form-control" type="time" id="editarordenhorario"  >
              </div>
              <div class="form-group"> 
                <label for="modificarturnoobservacion">Observaciones</label>
                <input class="form-control" id="modificarturnoobservacion"type="text">
              </div>
            </form>
          </div>

        </div>
          <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="btnguardarturnomodificado" class="btn btn-bold btn-pure btn-primary float-right" disabled>Modificar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal center-modal fade" id="editar-taller" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar taller</h5>
          <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12 col-12">
            <form action="">
              <div class="form-group">
                <input type="text" class="form-control" id="editartallernombre" disabled > 
              </div>
              <div class="form-group">
                <input type="text" class="form-control" disabled  id="talleradministrador"> 
              </div>
              <div clase="form-check form-check-inline nuevo-turnoscroll" id="tallerserviciochek" >
                  <?php
                  $sth=$tablas->gettablaservicio();
                  $thservicio= $sth->fetchAll();
                  if($sth->rowCount()):
                    foreach($thservicio as $row){ ?>  
                    <input class="form-check-input col-4" type="checkbox" name="tallerservicioeditar" id='ts<?php echo $row['codserv']; ?>' value='<?php echo $row['codserv']; ?>'> 
                    <label class="form-check-label col-6" for="ts<?php echo $row['codserv']; ?>"><?php echo $row['nombre']; ?></label><br>                       
                    <?php }  ?>
                  <?php endif;  ?>
              </div>
            </form>
          </div>
        </div>
          <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="modificarserviciostaller" disabled class="btn btn-bold btn-pure btn-primary float-right">Modificar servicios</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal center-modal fade" id="nuevo-turno" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuevo Turno</h5>
          <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12 col-12">
            <form  id="formasignarturnonuevo">
              <div class="form-group">
                <input type="text" class="form-control"  placeholder="AF-352-LS" id="dominionuevoturno"  required=""> 
              </div>
            
              <label>Seleccion de servicio</label>
              <div clase="form-check form-check-inline nuevo-turnoscroll requiered" id="nuevo-turnoscroll" >
                  <?php
                  $sth=$tablas->gettablaservicio();
                  $thservicio= $sth->fetchAll();
                  if($sth->rowCount()):
                    foreach($thservicio as $row){ ?>  
                    <input class="form-check-input col-4" type="checkbox" name="checkservicio" id='<?php echo "cs".$row['codserv']; ?>' value='<?php echo $row['codserv']; ?>'> 
                    <label class="form-check-label col-6" for="<?php echo "cs".$row['codserv']; ?>"><?php echo $row['nombre']; ?></label><br>                       
                    <?php }  ?>
                  <?php endif;  ?>
              </div>
              
  
              <div class="form-group">
                <input class="form-control" type="date" value="2018-11-10" id="fechaordennuevoturno"  required>
                <input class="form-control" type="time" value="13:45" id="horaordennuevoturno"  required>
              </div>
              <div class="form-group"> 
              <label for="modificarturnoobservacion">Observaciones</label>
              <input class="form-control" id="obsdennuevoturno"type="text">
              </div>
              <div class="modal-footer modal-footer-uniform col-12">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">cerrar</button>
                <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Cargar Turno</button>
              </div>
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal center-modal fade" id="ver-orden" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarordenestitulo">Ver Orden</h5>
          <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12 col-12">
          <label for="">Ver orden: </label>
           <h5 id="verdennumero"> NNN</h5>
            <form id="formeditarturno" >
              <div class="form-group">
                <label for="verdominioeditarorden">Dominio:</label>
                <input type="text" id="verdominioeditarorden"class="form-control" disabled > 
              </div>
              <label>Seleccion de servicio</label>
              <div clase="form-check form-check-inline nuevo-turnoscroll" id="verturnochek" >
                  <?php
                  $sth=$tablas->gettablaservicio();
                  $thservicio= $sth->fetchAll();
                  if($sth->rowCount()):
                    foreach($thservicio as $row){ ?>  
                    <input class="form-check-input col-4" type="checkbox" disabled name="checkserviciover" id='ver<?php echo $row['codserv']; ?>' value='<?php echo $row['codserv']; ?>'> 
                    <label class="form-check-label col-6" for="ver<?php echo $row['codserv']; ?>"><?php echo $row['nombre']; ?></label><br>                       
                    <?php }  ?>
                  <?php endif;  ?>
              </div>
            
              <div class="form-group">
                <input class="form-control" disabled type="date" id="verordenfecha">
                <input class="form-control" disabled type="time" id="verordenhorario"  >
              </div>
              <div class="form-group"> 
                <label for="verturnoobservacion">Observaciones</label>
                <input class="form-control" disabled id="verturnoobservacion"type="text">
              </div>
            </form>
          </div>

        </div>
          <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="btnguardarturnomodificado" class="btn btn-bold btn-pure btn-primary float-right" disabled>Modificar</button>
        </div>
      </div>
    </div>
  </div>
