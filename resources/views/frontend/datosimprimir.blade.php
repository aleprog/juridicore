
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
																			FICHA DE INSCRIPCIÓN</h3>
																			<h3>
																			COORDINACIÓN DE VINCULACIÓN</h3>
																			<h3>
																			PRÁCTICAS PRE PROFESIONALES</h3>
																			</strong>
																			</center>
															</div>

																<div class="modal-body" >

																	<div class="agileits-w3layouts-info">
																	<div style="background: url('/images/fondo1.png') no-repeat center;background-size: 200px 300px;">
																	<table width="100%"style="margin:25px">
																	<tr>
																	<td><h3><strong> Identificacion</strong></h3></td>
																	<td>{{$identificacion}}</td>
																	</tr>
																	<tr>
																	<td><h3><strong> Nombres</strong></h3></td>
																	<td>{{$nombres}}</td>
																	</tr>
																	<tr>
																	<td><h3><strong> Apellidos</strong></h3></td>
																	<td>{{$apellidos}}</td>
																	</tr>
																	<tr>
																	<td><h3><strong> Carrera</strong></h3></td>
																	<td>{{$carrera}}</td>
																	</tr>
																	<tr>
																	<td><h3><strong> Nivel</strong></h3></td>
																	<td>{{$nivel}}</td>
																	</tr>
																
																	<tr>
																	<td><h3><strong> Correo Institucional</strong></h3></td>
																	<td>{{$correo_institucional}}</td>
																	</tr>
																	<tr>
																	<td><h3><strong> Convencional</strong></h3></td>
																	<td>{{$convencional}}</td>
																	</tr>
																	<tr>
																	<td><h3><strong> Celular</strong></h3></td>
																	<td>{{$celular}}</td>
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
