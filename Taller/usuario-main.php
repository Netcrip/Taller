<section class="content-header text-center dropdown-toggle " data-toggle="collapse" href="#Usuario">
  <h1>
    Bienvenido al la Tuerca
  </h1> 
</section>
<div class="collapse" id="Usuario">

  <section id="usuariodato1" class="content-header">
        <h1>
          <small>Dominio:</small><h2 id="dominioautocliente"></h2>
          <a onclick="todoslosdatosvehiculo()" id="modificarauto" data-toggle="modal" data-target="#modal-editarauto"> <span class="label label-info"><i class="fa fa-pencil"></i></span></a>
          <a onclick="eliminarautocliente()" id="eliminarauto" ><span class="label label-danger"><i class="fa fa-ban"></i></span></a>
        </h1>   
  </section>
        <!-- Main content -->
  <section id="usuariodato2" class="content">
    <div class="row">
      <div class="small-box bg-info col-md-6 col-12">
        <div class="inner">
          <h3 id="kmautocliente"></h3>
          <p>Kilometros</p>
        </div>
        <div class="icon">
          <i class="fa fa-car"></i>
        </div>
          <a href="#" onclick="cargarkmcliente()" class="small-box-footer">Cargar Km.<i  class="fa fa-arrow-right"></i></a>
        </div>       
        <div class="small-box bg-success col-12 col-md-6">
          <div class="inner">
            <h3>Proximo Servicio</h3>
            <p id="proximoserviciocliente"></p>
          </div>
          <div hidden id="ordendeservicio"></div>
          <div class="icon">
            <i class="fa fa-info"></i>
          </div>
          <a  data-toggle="modal" data-target="#consultar-turno"  onclick="proximoturnoscliente()" class="small-box-footer"><i class="fa fa-info"></i></a>
        </div>         
      </div>
            <!-- /tabla -->  
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Servicios</h3>
        </div>
      </div>
                <!-- /.box-header -->
      <div class="box-body ">
        <table class="table tablas table-hover table-responsive " id="ordenescliente">
          <thead>
            <tr>
              <th>Ordent Trabajo</th>
              <th>Taller</th>
              <th>fecha</th>
              <th>Servicio</th>
              <th>Km</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="ordenesclientebody">           
           
          </tbody>
        </table>
      </div>

  </section>
<div id="Seleccionevehiculo">
  <div class="jumbotron">
  <h1 class="display-4 text-center">Hola!</h1>
  <p class="lead text-center">Por favor selecciona un vehiculo</p>
  <hr class="my-4">
  <p class="text-center">si no tienes vehiculo por favor usa el boton de abajo para agregar.</p>
  <p class="lead text-center">
    <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#modal-altavehiculo" role="button">Nuevo vehiculo</a>
  </p>
</div>
</div>
</div>


<!-- Modal editar auto -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal-editarauto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Editar vehiculo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tipo de vehiculo</label>
            <select class="form-control select2" id="editarselecciontipo" style="width: 100%;">              
            </select>
        </div>
        <div class="form-group">
          <label>Marca</label>
            <select class="form-control select2" id="editarselectmarca" style="width: 100%;">              
            </select>
        </div>
        <div class="form-group">
          <label>Modelo</label>
            <select class="form-control select2" id="editarseleccionmodelo" style="width: 100%;">              
            </select>
        </div>
        <div class="form-group">
          <label for="añonuevoauto">Dominio</label>
          <input class="form-control select2" type="text" placeholder="ingrese dominio" id="editarnuevodominio"style="width: 100%;">              
        </div>
        <div class="form-group">
          <label for="añonuevoauto">Año</label>
          <input class="form-control select2" type="number" placeholder="Ingrese año" id="editarañonuevoauto"style="width: 100%;">              
        </div>
        <div class="form-group">
          <label for="añonuevoauto">Motor</label>
          <input class="form-control select2" type="text" placeholder="ingrese nro motor" id="editarnuevomotor"style="width: 100%;">              
        </div>
        <div class="form-group">
          <label for="añonuevoauto">Chasis</label>
          <input class="form-control select2" type="text" placeholder="Ingrese numero chasis" id="editarnuevochasis"style="width: 100%;">              
        </div>
                     
      </div>

      <div class="modal-footer modal-footer-uniform col-12">
        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info float-right" id="btnactualizarauto" disabled onclick="editarvehiculocliente()"> Editar datos </button>       
      </div>
                    <!-- /.row -->
    </div>
                  <!-- /.box-body -->
  </div>
            
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="solicitartunro">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Solicitud de servicio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
          <div class="box-body">
          <div class="form-group">
              <label for="selecciondevehiculocliente">Seleccione vehiculo:</label>
                <select  class="form-control" name="" id="selecciondevehiculocliente"></select>
              </div>
            <div class="form-group">
              <label for="listadetaller">Seleccione Taller:</label>
                <select  class="form-control" name=""  id="listadetaller"></select>
            </div>
            <div class="form-group">
              <label for="datosdeltaller">Datos del taller:</label>
                <textarea type="text" id="datosdeltaller" class="form-control" disabled id="Info" style="resize:none"  rows="3"></textarea>
              </div>

            <label>Seleccion de servicio</label>
            <div clase="form-check form-check-inline nuevo-turnoscroll" id="serviciosdetaller" >
              
            </div>
          
          </div>
          <div class="form-group">
              <label for="dominioserv">Observaciones para el turno (dia/horario):</label>
                <textarea type="text" id="observacionescliente" class="form-control"  id="Info" style="resize:none"  rows="3"></textarea>
              </div>
          <div class="modal-footer modal-footer-uniform col-12">
            <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-info float-right" onclick="guardarsolicitud()"> Solicitar </button>
          </div>
        
              <!-- /.box-body -->
      </div>
    </div>    
    </div>
</div>

<!-- Modal Consultar Turno -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="consultar-turno">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" >Ver Proximos turnos</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		  </div>
					<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
          <div class="box-body ">
            <table class="table tablas table-hover table-responsive " id="proximosturnosclientetabla">
              <thead>
                <tr>
                  <th>O. T.</th>
                  <th>Dominio</th>
                  <th>Taller</th>
                  <th>fecha</th>
                  <th>C. Serv.</th>
                </tr>
              </thead>
              <tbody id="proximosturnosclientebody">           
              
              </tbody>
            </table>
            
            
          </div>

							<!-- /.col -->
						
										<!-- /.col -->
					</div>
					<div class="modal-footer modal-footer-uniform">
						<button type="button" class="btn btn-bold btn-pure btn-secondary btn-block" data-dismiss="modal">Close</button>
					</div>
									<!-- /.row -->
				</div>
								<!-- /.box-body -->
			</div>
		</div>
					<!-- /.modal-content -->
</div>



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="consultar-solicitudes">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" >Ver Proximos turnos</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		  </div>
					<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
          <div class="box-body ">
          <table class="table tablas table-hover table-responsive " id="solicitudesclientetabla">
                <thead>
                  <tr>
                    <th>O. T.</th>
                    <th>Dominio</th>
                    <th>Taller</th>
                    <th>fecha</th>
                    <th>C. Serv.</th>
                  </tr>
                </thead>
                <tbody id="solicitudesclientebody">           
                
                </tbody>
              </table>            
          </div>

							<!-- /.col -->
						
										<!-- /.col -->
					</div>
					<div class="modal-footer modal-footer-uniform">
						<button type="button" class="btn btn-bold btn-pure btn-secondary btn-block" data-dismiss="modal">Close</button>
					</div>
									<!-- /.row -->
				</div>
								<!-- /.box-body -->
			</div>
		</div>
					<!-- /.modal-content -->
</div>

<div class="modal center-modal fade" id="ver-ordencliente" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarordenestitulocliente">Ver Orden</h5>
          <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12 col-12">
          <label for="">Ver orden: </label>
           <h5 id="vernumeroordencliente"> NNN</h5>
            <form id="formeditarturnoformordenescliente" >
              <div class="form-group">
                <label for="verdominioeditarordencliente">Dominio:</label>
                <input type="text" id="verdominioeditarordencliente"class="form-control" disabled > 
              </div>
              <label>Seleccion de servicio</label>
              <div clase="form-check form-check-inline nuevo-turnoscroll" id="verturnochekcliente" >
                  <?php
                  $sth=$tablas->gettablaservicio();
                  $thservicio= $sth->fetchAll();
                  if($sth->rowCount()):
                    foreach($thservicio as $row){ ?>  
                    <input class="form-check-input col-4" type="checkbox" disabled name="checkserviciovercliente" id='ver<?php echo $row['codserv']; ?>' value='<?php echo $row['codserv']; ?>'> 
                    <label class="form-check-label col-6" for="ver<?php echo $row['codserv']; ?>"><?php echo $row['nombre']; ?></label><br>                       
                    <?php }  ?>
                  <?php endif;  ?>
              </div>
            
              <div class="form-group">
                <input class="form-control" disabled type="date" id="verordenfechacliente">
                <input class="form-control" disabled type="time" id="verordenhorariocliente"  >
              </div>
              <div class="form-group"> 
                <label for="verordenobservacioncliente">Observaciones</label>
                <input class="form-control" disabled id="verordenobservacioncliente"type="text">
              </div>
            </form>
          </div>

        </div>
          <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-bold btn-pure btn-secondary btn-block" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


<!-- Modal Alta auto -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal-altavehiculo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Agregar vehiculo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tipo de vehiculo</label>
            <select class="form-control select2" id="selecciontipo" style="width: 100%;">              
            </select>
        </div>
        <div class="form-group">
          <label>Marca</label>
            <select class="form-control select2" id="selectmarca" style="width: 100%;">              
            </select>
        </div>
        <div class="form-group">
          <label>Modelo</label>
            <select class="form-control select2" id="seleccionmodelo" style="width: 100%;">              
            </select>
        </div>
        <div class="form-group">
          <label for="añonuevoauto">Dominio</label>
          <input class="form-control select2" type="text" placeholder="ingrese dominio" id="nuevodominio"style="width: 100%;">              
        </div>
        <div class="form-group">
          <label for="añonuevoauto">Año</label>
          <input class="form-control select2" type="number" placeholder="Ingrese año" id="añonuevoauto"style="width: 100%;">              
        </div>
        <div class="form-group">
          <label for="añonuevoauto">Motor</label>
          <input class="form-control select2" type="text" placeholder="ingrese nro motor" id="nuevomotor"style="width: 100%;">              
        </div>
        <div class="form-group">
          <label for="añonuevoauto">Chasis</label>
          <input class="form-control select2" type="text" placeholder="Ingrese numero chasis" id="nuevochasis"style="width: 100%;">              
        </div>
                     
      </div>

      <div class="modal-footer modal-footer-uniform col-12">
        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info float-right" onclick="cargarvehiculonuevo()"> Guardar Datos </button>       
      </div>
                    <!-- /.row -->
    </div>
                  <!-- /.box-body -->
  </div>
            
</div>
         





