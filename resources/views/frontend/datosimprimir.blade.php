
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
															<img src="{{url('/images/ug.png')}}"  width="90px" height="110px">
															</td>
															<td>	 <center>
																			<h5>UNIVERSIDAD DE GUAYAQUIL</h5>
																		
																</center></td>
																
																<td>
																
																<img src="{{url('/images/juris.png')}}"style="float:right" width="80px" height="120px">	

																</td>
																</tr>
																</table>
															
															</div>

																<div class="modal-body" >
																	<br/>
																	<p align="right">
																	Guayaquil,.............de 2018
																	</p>
																	<br/>
																	
																	<strong>
																	<p>Señora Abogada</p>
																	<p>M.Katherine Mata Echeverria</p>
																	<p>Coordinadora General</p>
																	<p>CONSULTORIOS JURIDICOS GRATUITOS</p>
																	<p>Facultad de Jurisprudencia y Ciencias Sociales y Politicas</p>
																	<p>Universidad de Guayaquil</p>
																	<p>Ciudad.-</p>
																	
																	</strong>
																															
																	<div class="agileits-w3layouts-info">
																	<div style="background: url('/images/fondo1.png') no-repeat center;background-size: 200px 300px;">
																	<br/>
																	<br/>
																	<p align="justify">
																	Yo, {{$nombres}} {{$apellidos}} , con cédula de ciudadania Nº {{$identificacion}} ,
																	estudiante matriculado en el {{$nivel}} de la carrera {{$carrera}} , solicito 
																	a usted muy comedidamente se me asigneuna institucion , fecha de inicio y fin , 
																	asi como un tutor académico para realizar las prácticas preprofesionales.
																	</p>
																	<br/>
																	<p align="justify">
																	El pedido es solicitado	a razón de que me encuentro habilitado para realizar dicho 
																	proceso académico, el cual me comprometo  a cumplir con seriedad, discresión y 
																	honestidad, las actividades que me asignen. 
																	
																	</p>
																	<br/>
																	<p> Seguro de contar con una pronta respuesta de antemano le quedo agradecido</p>
																	<p>Atentamente,</p>
																	<br/>
																	<br/>
																	<br/>
																	<br/>
																	<p>___________________</p>
																	<p>{{$nombres}} {{$apellidos}}</p>
																	<p>C.I.{{$identificacion}}</p>
																	
																	<table border="1" style="padding:25px">
																	<tr>
																	<td>Dirección: {{$direccion}}
																	</td>
																	</tr>
																	<tr>
																	<td>Nùmero Telefónico Movil :{{$celular}}
																	</td>
																	</tr>
																	<tr>
																	<td>Correo Institucional :{{$correo_institucional}}
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
