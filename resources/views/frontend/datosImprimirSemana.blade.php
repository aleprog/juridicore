
<!DOCTYPE html>
<html lang="es">
<head>
@include('frontend.partials.head')

</head>

<body>

<div id="renderMe">
			
									<div class="modal-content">

															<div class="modal-header">
															<table width="100%" >
															<tr>
															<td>
															<img src="{{url('/images/ug.png')}}"  width="100px" height="120px">
															</td>
															<td>	 <center>
																			<h5>UNIVERSIDAD DE GUAYAQUIL</h5>
																			<h5>FACULDAD DE JURISPRUDENCIA Y CIENCIAS SOCIALES</h5>
																		
																</center></td>
																
																<td>
																
																<img src="{{url('/images/juris.png')}}"style="float:right" width="80px" height="120px">

																</td>
																</tr>
																</table>
															<center><strong>	
															<h3>
																			INFORME SEMANAL</h3>
																			<h3>
																		
																			</strong>
																			</center>
															</div>

																<div class="modal-body" >

																	<div class="agileits-w3layouts-info">
																	<div style="background: url('/images/fondo1.png') no-repeat center;background-size: 200px 300px;">
																	<table border="1" width="100%">
																	
																	<tr>
																	<td><h5><strong> Estudiante</strong></h5></td>
																	<td>{{$objPostulant->apellidos.$objPostulant->nombres}}</td>
																	</tr>
																	<tr>
																	<td><h5><strong> Facultad</strong></h5></td>
																	<td>Facultad de Jurisprudencia y Ciencias Sociales</td>
																	</tr>
																	<tr>
																	<td><h5><strong> Carrera</strong></h5></td>
																	<td>{{$objPostulant->carrera}}</td>
																	</tr>
																	<tr>
																	<td><h5><strong> Supervisor</strong></h5></td>
																	<td>{{$supervisor}}</td>
																	</tr>
																
																	<tr>
																	<td><h5><strong>Semana</strong></h5></td>
																	<td>{{$semana}}</td>
																	</tr>
																	
																	</table>
																	<br/>
																	<table width="100%" border="1" style="text-align:center;">
																	<tr>
																		<td><strong>Fecha</strong></td>
																		<td><strong>Horas diarias</strong></td>
																		<td><strong>Descripcion de tareas desarrolladas</strong></td>
																	</tr>
																	<div style="display:none">{!!$cchoras=0!!}</div>
																	@foreach ($objAsistencia as $asistencia)
																	<tr>
																		<td>{{$asistencia["fecha"]}}</td>
																			<div style="display:none">{!! $cchoras=$cchoras+$asistencia["horas"]!!}</div>
																		<td>{{$asistencia["horas"]}} de horas laborales</td>
																		<td>{{$asistencia["descripcion"]}}</td>
																	</tr>																	</tr>
																	@endforeach
																	<tr>
																	<td><strong>Total de horas</strong></td>
																	<td>{{$cchoras}}</td>
																	<td></td>
																	</tr>
																	</table>
																	<br/>
																	<table width="100%">
																	<tr>
																	<td><strong>Observaciones:</strong>
																	</td>
																	<td>_______________________________________________________________________
																	</td>
																	</table>
																	<table style="text-align:center;" width="100%">
																	<tr>
																	<td style="height:400px">Firma
																	</td>
																	
																	<td>Sello de la Institucion
																	</td>
																	
																	</tr>
																		<tr>
																	<td>{{$supervisor}}
																	</td>
																	
																	<td>
																	</td>
																	
																	</tr>
																	</table>
																	</div>					
										 </div>
					</div>
		
<div id="editor"></div>


	<!-- //map -->
	<!-- footer -->
	<!-- //footer -->
	<!-- //footer -->


</body>

</html>
