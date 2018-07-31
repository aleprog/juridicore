
<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			
			
			
			<div class="modal-content">
			

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">
Solicitud de Prácticas Pre Profesionales
					</h3>
				</div>
				<div class="tab-content">
				
				<div id="tabRegister" class="tab-pane fade in active">
				<div class="modal-body">
				
					<div class="agileits-w3layouts-info">
					<div style="background: url('/images/fondo.jpeg') no-repeat center;background-size: 500px 400px;">
					<form class="form-horizontal" method="POST" action="{{ route ('registroP')}}">
					{{ csrf_field() }}

					<fieldset>

					<!-- Form Name -->

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="Identificacion">Identificacion</label>  
					  <div class="col-md-5">
					  <input id="identificacion" name="identificacion" type="text" placeholder="Identificacion" class="form-control input-md" minlength="10" maxlength="10" onKeyPress="return soloNumeros(event)" required="">
					  </div>
					</div>
<div id="dependencia">
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="nombres">Nombres</label>  
					  <div class="col-md-5">
					  <input id="nombres" name="nombres" type="text" placeholder="Nombres" class="form-control input-md" required="">
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="apellidos">Apelidos</label>  
					  <div class="col-md-5">
					  <input id="apellidos" name="apellidos" type="text" placeholder="Apelidos" class="form-control input-md" required="">
					  </div>
					</div>
					<div class="form-group">
										  <label class="col-md-4 control-label" for="carrera">Carrera</label>
										  <div class="col-md-5">
											<select id="carrera" name="carrera" class="form-control">
														
											<option value="Derecho" selected>Derecho</option>
											<option value="Sociologia">Sociología</option>
											</select>			
											</div>
					</div>
					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="semestre">Semestre</label>
					  <div class="col-md-5">
						<select id="semestre" name="semestre" class="form-control">
						  <option value="7">7</option>
						  <option value="8">8</option>
						  <option value="9">9</option>
							<option value="EGRESADO">EGRESADO</option>

						</select>
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-md-4 control-label" for="celular">Correo Institucional</label>  
					  <div class="col-md-5">
					  <input id="correo_institucional" name="correo_institucional" type="text" placeholder="correo institucional" class="form-control input-md" onblur="validarEmail('correo_institucional')" required="">
					 
						</div>
						
						</div>
					<!-- Textarea -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="direccion">Dirección</label>
					  <div class="col-md-5">                     
						<textarea class="form-control" id="direccion" placeholder="Direccion" name="direccion" required></textarea>
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="convencional">Convencional</label>  
					  <div class="col-md-5">
					  <input id="convencional" name="convencional" type="text" placeholder="Convencional" maxlength="10" onKeypress="return soloNumeros(event)" class="form-control input-md">
					  </div>

					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="celular">Teléfono móvil</label>  
					  <div class="col-md-5">
					  <input id="celular" name="celular" type="text" placeholder="Teléfono móvil" maxlength="10" onKeypress="return soloNumeros(event)" class="form-control input-md" required="">
					  </div>
					</div>
				
					<!-- Button (Double) -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="enviar"></label>
					  <div class="col-md-8">
						<button id="enviarV"value="0" type="submit" name="enviarV" class="btn btn-primary">Enviar Solicitud</button>
						<button id="cerrar" name="cerrar" class="btn btn-danger" data-dismiss="modal">Cerrar </button>
					  </div>
					</div>
</div>
					</fieldset>
					</form>
					</div>
											
						</div>
				</div>
				  
				    <center> <h3><a class="label label-info" data-toggle="tab" href="#tabRegistered">Si ya esta registrado</a></h3></center>
				  
				</div>
				<div id="tabRegistered" class="tab-pane fade">
				<div class="modal-body">
					<div class="agileits-w3layouts-info">
					<form class="form-horizontal" method="POST" action="{{ route ('registroP')}}">
					{{ csrf_field() }}
					<form class="form-horizontal" method="POST" action="{{ route ('registroP')}}">

					<fieldset>

					<!-- Form Name -->

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="Identificacion">Identificacion</label>  
					  <div class="col-md-5">
					  <input id="identificacion" name="identificacion" type="text" placeholder="Identificacion" class="form-control input-md" maxlength="10" onKeyPress="return soloNumeros(event)" required="">

					  </div>
					  <div class="col-md-1">
					  	<button class="btn btn-primary" type="submit" value="1" name="enviarV" id="enviarV">Verifcar </button>

					  </div>
					 </form>

					</div>

					<!-- Text input-->
		
					</fieldset>
					</form>
											
					</div>
				 <center><h3>	<a data-toggle="tab" class="label label-info" href="#tabRegister">Registrarse</a> </h3></center>
				
				</div>
				</div>
				</div>
			</div>
		</div>
		</div>
	</div>