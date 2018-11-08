
<section>
    <div class="box">
        <h2>Administrar Talleres</h2>
    </div>
    <div class="box-body ">
        <table class="table table-hover table-responsive" id="ordenes">
              <thead>
                <tr>
                  <th>Id Taller</th>
                  <th>Nombre</th>
                  <th>Direcciopm</th>
                  <th>Telefono</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a>#12</a></td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td> <a href="#" data-toggle="modal" data-target="#editar-taller"> <span class="label label-info"><i class="fa fa-pencil"></i></span></a>
                      <a href="" id="baja-taller"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                  </td>
                </tr>
                <tr>
                  <td><a>#10</a></td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td> <a href="#" data-toggle="modal" data-target="#editar-taller"> <span class="label label-info"><i class="fa fa-pencil"></i></span></a>
                      <a href="#" class="baja-taller"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                  </td>
                </tr>
                <tr>
                  <td><a>#9</a></td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td> <a href="#" data-toggle="modal" data-target="#editar-taller"> <span class="label label-info"><i class="fa fa-pencil"></i></span></a>
                    <a href="#" class="baja-taller"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                  </td>
                </tr>
                <tr>
                  <td><a>#11</a></td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td> <a href="#" data-toggle="modal" data-target="#editar-taller"> <span class="label label-info"><i class="fa fa-pencil"></i></span></a>
                    <a href="#" class="baja-taller"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                  </td>
                </tr>
                <tr>
                  <td><a>#5</a></td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td>Lorem Ipsum</td>
                  <td> <a href="#" data-toggle="modal" data-target="#editar-taller"> <span class="label label-info"><i class="fa fa-pencil"></i></span></a>
                    <a href="#" class="baja-taller"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                  </td>
                </tr>
              </tbody>
        </table>
    </div>
  
</section>
<section>
      <!-- Tabla para -->   
      <div class="box">
        <h2>Administrar Servicios</h2>
      </div>
      <div class="box-body">
          <table class="table table-hover table-responsive" id="solturnos">
            <thead>
              <tr>
                <th>Id servicio</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#11</a></td>
                <td>Lorem Ipsum</td>
                <td>Lorem Ipsum</td>
                <td> <a href="#" data-toggle="modal" data-target="#editar-servicio"> <span class="label bg-green"><i class="fa fa-pencil"></i></span></a>
                <a href="#" class="eliminarServicio"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                </td>
              </tr>
              <tr>
                <td>#10</a></td>
                <td>Lorem Ipsum</td>
                <td>Lorem Ipsum</td>
                <td> <a href="#" data-toggle="modal" data-target="#editar-servicio"> <span class="label bg-green"><i class="fa fa-pencil"></i></span></a>
                <a href="#" class="eliminarServicio"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                </td>
              </tr>
              <tr>
                <td>#09</a></td>
                <td>Lorem Ipsum</td>
                <td>Lorem Ipsum</td>
                <td> <a href="#" data-toggle="modal" data-target="#editar-servicio"> <span class="label bg-green"><i class="fa fa-pencil"></i></span></a>
                <a href="#" class="eliminarServicio"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                </td>
              </tr>
              <tr>
                <td>#08</a></td>
                <td>Lorem Ipsum</td>
                <td>Lorem Ipsum</td>
                <td> <a href="#" data-toggle="modal" data-target="#editar-servicio"> <span class="label bg-green"><i class="fa fa-pencil"></i></span></a>
                <a href="#" class="eliminarServicio"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                </td>
              </tr>
              <tr>
                <td>#07</a></td>
                <td>Lorem Ipsum</td>
                <td>Lorem Ipsum</td>
                <td> <a href="#" data-toggle="modal" data-target="#editar-servicio"> <span class="label bg-green"><i class="fa fa-pencil"></i></span></a>
                <a href="#" class="eliminarServicio"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                </td>
              </tr>
              <tr>
                <td>#02</a></td>
                <td>Lorem Ipsum</td>
                <td>Lorem Ipsum</td>
                <td> <a href="#" data-toggle="modal" data-target="#editar-servicio"> <span class="label bg-green"><i class="fa fa-pencil"></i></span></a>
                <a href="#" class="eliminarServicio"> <span class="label label-danger"><i class="fa fa-ban"></i></span></a>
                </td>
              </tr>
              </tbody>
          </table>
      </div>
</section>


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
              <input class="form-control" type="date" value="2011-08-19" >
              <input class="form-control" type="time" value="13:45:00" >
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