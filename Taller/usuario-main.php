<section class="content-header text-center dropdown-toggle " data-toggle="collapse" href="#Usuario">
  <h1>
    Bienvenido al la Tuerca
  </h1> 
</section>
<div class="collapse" id="Usuario">

  <section class="content-header">
        <h1>
          <small>Dominio:</small><h2 id="dominioautocliente"></h2>
          <a  data-toggle="modal" data-target="#modal-editarauto"> <span class="label label-info"><i class="fa fa-pencil"></i></span></a>
          <a  id="sa-warning" ><span class="label label-danger"><i class="fa fa-ban"></i></span></a>
        </h1>   
  </section>
        <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="small-box bg-info col-6">
        <div class="inner">
          <h3 id="kmautocliente"></h3>
          <p>Kilometros</p>
        </div>
        <div class="icon">
          <i class="fa fa-car"></i>
        </div>
          <a href="#" id="cargarkm" class="small-box-footer">Cargar Km.<i class="fa fa-arrow-right"></i></a>
        </div>       
        <div class="small-box bg-success col-6">
          <div class="inner">
            <h3>Proximo Servicio</h3>
            <p id="proximoserviciocliente"></p>
          </div>
          <div class="icon">
            <i class="fa fa-info"></i>
          </div>
          <a href="#" id="cancelarturno"class="small-box-footer">Cancelar.<i class="fa fa-arrow-right"></i></a>
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
</div>

<!-- Modal editar auto -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal-editarauto">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" >Vehiculo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">

              <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Modificar Vehiculo</h3>
          
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label>Vehiculo</label>
                          <select class="form-control select2" style="width: 100%;">
                            <option value="">Seleccione Vehiculo:</option>
                            <option value="1">Auto</option>
                            <option value="2">Moto</option>
                            <option value="3">Camioneta</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label>Marca</label>
                            <select class="form-control select2" style="width: 100%;">
                              <option value="">Seleccione Marca:</option>
                              <option value="1">Fiat</option>
                              <option value="2">Ford</option>
                              <option value="3">Chevrolet</option>
                            </select>
                          </div>

                          <div class="form-group">
                              <label>Modelo</label>
                              <select class="form-control select2" style="width: 100%;">
                                <option value="">Seleccione Modelo:</option>
                                <option value="1">Palio</option>
                                <option value="2">Fiesta</option>
                                <option value="3">Corsa</option>
                              </select>
                            </div>

                            <div class="form-group">
                                <label>Año:</label>
                                <select class="form-control select2" style="width: 100%;">
                                  <option value="">Seleccione Año:</option>
                                  <option value="1">2010</option>
                                  <option value="2">2012</option>
                                  <option value="3">2014</option>
                                </select>
                              </div>
                            
                              <div class="form-group">
                                  <label>Motor:</label>
                                  <select class="form-control select2" style="width: 100%;">
                                    <option value="">Seleccione Tipo de Motor:</option>
                                    <option value="1">1.4</option>
                                    <option value="2">1.6</option>
                                    <option value="3">1.8</option>
                                  </select>
                                </div>


                       
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                    
                        
                      </div>
                      <!-- /.col -->
                    </div>

                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info"> Guardar Datos </button>
                        
                         
                        </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.box-body -->
                </div>
            
          </div>
         
        </div>
        <!-- /.modal-content -->
      </div>





<!-- Modal nuevo Turno -->

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
         





