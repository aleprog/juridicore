<div class="panel-heading">Hola, {!!$usuario=$datos['usuario']!!} </div>
					
					
						
			<div class="modal-content">

	
						<div class="modal-body" >

							<div class="agileits-w3layouts-info">
							<div style="background: url('/images/fondo.jpeg') no-repeat center;background-size: 500px 600px;">
							<form method="POST" action="{{ route ('admin.estudianteasignacion')}}" accept-charset="UTF-8" enctype="multipart/form-data">
							<div class=" panel panel-body col-md-12">

							<input type="hidden" value="{{$cc}}" id="cc" name="cc">
									<div class="col-md-12">
									<div class="col-md-2">
									<label>Lugar:</label>
									</div>
									<div class="col-md-4">
									{!! Form::select('lugar', $lugares, $lugar_id,['class' => 'form-control select2','placeholder'=>'Lugares',"style"=>"width:100%","id"=>"lugar","name"=>"lugar"]) !!}

									</div>
									</div>
											<div class="col-md-12">

									<div class="col-md-2">
									<label>Supervisor:</label>

									</div>
									<div class="col-md-4">
									{!! Form::select('supervisor',$supervisor, $user_doc,['class' => 'form-control select2','placeholder'=>'Supervisores',"style"=>"width:100%","id"=>"supervisor","name"=>"supervisor"]) !!}

									</div>
									<div class="col-md-12">

									<div class="col-md-2">
									<label>Horario:</label>

									</div>
									<div class="col-md-4">
									{!! Form::select('horario',$horario, $horario_id,['class' => 'form-control select2','placeholder'=>'Horario',"style"=>"width:100%","id"=>"horariosd","name"=>"horario"]) !!}

									</div>
</div>							
							</div>
													
								</div>
						
						  
				  <hr/>
							<div class="panel-body">
								
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" value="{{$datos['data']['id']}}" name="idusuario">

								
								<div class="col-md-12">
								
								<hr/>
								<div class="alert alert-{{$tipoM}}" id="divmensaje">
 
								  {{$message}}.
								</div>
								
								</div>
								<div class="form-group">
								  <div class="col-md-6 col-md-offset-4">
								<button type="submit" style="display:none" class="btn btn-primary" value="3" name="btnvgenv"id="btnvgenv">Grabar</button>

								  </div>
								</div>
							  </form>
							  <div id="btnvgverificadiv"> 
								<button class="btn btn-primary" value="3" name="btnvgverifica" onclick="verificacc()">Grabar</button>
								</div>
							</div>
							
			</div>

				 