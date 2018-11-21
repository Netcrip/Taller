<section class="content-header text-center dropdown-toggle" data-toggle="collapse" href="#Administracion">
  <h1 >
    Administracion
  </h1>  
</section>
<div class="collapse" id="Administracion">
  <section>
    <div class="box">
      <h2>Administrar Talleres</h2>
    </div>
    <div class="box-body ">
    <table class="table table-hover table-responsive tablas" id="talleresadministrador">
      <thead>
        <tr>
          <th>Id Taller</th>
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="talleresadministradorbody">
      </tbody>
    </table>
  </div>
        <!-- Tabla para -->   
  <div class="box">
    <h2>Administrar Servicios</h2>
  </div>
  <div class="box-body">
    <table class="table table-hover table-responsive tablas" id="tablaservicioadministrador">
      <thead >
        <tr>
          <th>Id servicio</th>
          <th>Nombre</th>
          <th>Tipo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody  id="tablaservicioadministradorbody">
  
      </tbody>
    </table>
  </div>

  </section>
</div>


<div class="modal center-modal fade" id="nuevo-taller" tabindex="-1" style="display: block;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        <h5 class="modal-title">Nuevo Taller</h5>
        <button type="button" class="close" data-dismiss="modal">
				  <span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
        <div class="col-md-12 col-12">
          <form action="">
            <div class="form-group">
              <input type="text" class="form-control"   placeholder="Nombre taller"> 
            </div>
            <div class="form-group">
              <input type="text" class="form-control"   placeholder="Email administrador"> 
            </div>
            <div id="serviciosscroll">
              <table class="table table-hover table-responsive" >
                <thead>
                  <tr>
                    <td>Servicio</td>
                    <td>Estado</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>lorem</td>
                      <td><label class="custom-control custom-checkbox">
										  <input type="checkbox" required="" value="single" name="styled_single_checkbox" class="custom-control-input" aria-invalid="false"> <span class="custom-control-indicator"></span> <span class="custom-control-description"></span> </label>
                    </td>
                  </tr>
                  <tr>
                    <td>lorem</td>
                    <td><label class="custom-control custom-checkbox">
                      <input type="checkbox" required="" value="single" name="styled_single_checkbox" class="custom-control-input" aria-invalid="false"> <span class="custom-control-indicator"></span> <span class="custom-control-description"></span> </label>
                    </td>             
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"   placeholder="otro dato taller"> 
            </div>
          </form>
        </div>
			</div>
      <div class="modal-footer modal-footer-uniform">
        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-bold btn-pure btn-primary float-right">Save changes</button>
			</div>
    </div>
	</div>
</div>

<div class="modal center-modal fade" id="nuevo-servicio" tabindex="-1" style="display: block;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        <h5 class="modal-title">Alta de servicio</h5>
        <button type="button" class="close" data-dismiss="modal">
				  <span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
        <div class="col-md-12 col-12">
          <form action="">
            <div class="form-group">
              <label for="nombreservicio">Nombre del servicio</label>
              <input type="text" class="form-control" id="nombreservicio"   > 
            </div>
            <div class="form-group">
              <label for="descripcionservicio">Descripcion del servicio</label>
              <input type="text" class="form-control" id="descripcionservicio"   > 
            </div>
          
          </form>
        </div>
			</div>
      <div class="modal-footer modal-footer-uniform col-12">
        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-bold btn-pure btn-primary float-right" onclick="nuevoserviciosadministrador()">Crear servicio</button>
			</div>
		</div>
	</div>
</div>

<div class="modal center-modal fade" id="editars-servicio" tabindex="-1" style="display: block;">
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
          <form action="">
            <div class="form-group">
              <input type="text" class="form-control" disabled  placeholder="AF-352-LS" > 
            </div>
            <div class="form-group">
              <label>Taller</label>
              <select class="form-control select2" style="width: 100%;">
                <option value="">Seleccione Taller:</option>
                <option >T1</option>
                <option >T2</option>
                <option >T3</option>
              </select>
            </div>
            <div class="form-group">
              <input class="form-control" type="date" value="2011-08-19" >
              <input class="form-control" type="time" value="13:45:00" >
            </div>
          </form>
        </div>

		  </div>
    </div>
    <div class="modal-footer modal-footer-uniform">
      <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-bold btn-pure btn-primary float-right">Save changes</button>
		</div>
	</div>
</div>

<div class="modal center-modal fade" id="editar-servicio" tabindex="-1" style="display: block;">
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
          <form action="">
            <div class="form-group">
              <input type="text" class="form-control" disabled  placeholder="AF-352-LS" > 
            </div>
            <div class="form-group">
                  <label>Taller</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option value="">Seleccione Taller:</option>
                    <option >T1</option>
                    <option >T2</option>
                    <option >T3</option>
                  </select>
            </div>
            <div class="form-group">
              <input class="form-control" type="date" value="2011-08-19" id="fecha">
              <input class="form-control" type="time" value="13:45:00" id="hora">
            </div>
          </form>
        </div>
			</div>
      <div class="modal-footer modal-footer-uniform">
        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-bold btn-pure btn-primary float-right">Save changes</button>
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
              <input type="text" class="form-control"   placeholder="Nombre taller"> 
            </div>
            <div class="form-group">
              <input type="text" class="form-control"   placeholder="Email administrador"> 
            </div>
            <div id="tallerservicio">
              <table class="table table-hover table-responsive" >
                <thead>
                  <tr>
                    <td>Servicio</td>
                    <td>Estado</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>lorem</td>
                    <td><label class="custom-control custom-checkbox">
                        <input type="checkbox" required="" value="single" name="styled_single_checkbox" class="custom-control-input" aria-invalid="false"> <span class="custom-control-indicator"></span> <span class="custom-control-description"></span> </label>
                    </td>
                  </tr>
                  <tr>
                    <td>lorem</td>
                    <td><label class="custom-control custom-checkbox">
                        <input type="checkbox" required="" value="single" name="styled_single_checkbox" class="custom-control-input" aria-invalid="false"> <span class="custom-control-indicator"></span> <span class="custom-control-description"></span> </label>
                    </td>             
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"   placeholder="otro dato taller"> 
            </div>
          </form>
        </div>
			</div>
      <div class="modal-footer modal-footer-uniform">
        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-bold btn-pure btn-primary float-right">Save changes</button>
			</div>
		</div>
	</div>
</div>

