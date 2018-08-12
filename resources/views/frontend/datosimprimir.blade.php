
<!DOCTYPE html>
<html lang="es">
<head>
@include('frontend.partials.head')

</head>
<style>
ol.u {list-style-type: none;}

</style>
<body>

<div id="renderMe">
			
									<div class="modal-content">

															<div class="modal-header">
															<table width="100%" >
															<tr>
															<td>
															<img src="{{public_path('images/')}}ug.png"  width="90px" height="110px">
															</td>
															<td>	 <center>
																			<h5>UNIVERSIDAD DE GUAYAQUIL</h5>
																		
																</center></td>
																
																<td>
																
																<img src="{{public_path('images/')}}juris.png"style="float:right" width="80px" height="120px">	

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
																	<ol class="u">
																	<li>Señora Abogada</li>
																	<li>M.Katherine Mata Echeverria</li>
																	<li>Coordinadora General</li>
																	<li>CONSULTORIOS JURIDICOS GRATUITOS</li>
																	<li>Facultad de Jurisprudencia y Ciencias Sociales y Politicas</li>
																	<li>Universidad de Guayaquil</li>
																	<li>Ciudad.-</li>
																	</ol>
																	</strong>
																	<ol class="u">
													
																	<div class="agileits-w3layouts-info">
																	<div style="background: url('/images/fondo1.png') no-repeat center;background-size: 200px 300px;">
																	<br/>
																
																	<li align="justify">
																	Yo, {{$nombres}} {{$apellidos}} , con cédula de ciudadania Nº {{$identificacion}} ,
																	estudiante matriculado en el {{$nivel}} de la carrera {{$carrera}} , solicito 
																	a usted muy comedidamente se me asigneuna institucion , fecha de inicio y fin , 
																	asi como un tutor académico para realizar las prácticas preprofesionales.
																	</li>
																	

																
																	<li align="justify">
																	<br/>
																	El pedido es solicitado	a razón de que me encuentro habilitado para realizar dicho 
																	proceso académico, el cual me comprometo  a cumplir con seriedad, discresión y 
																	honestidad, las actividades que me asignen. 
																	
																	</li>
																	
																	<li><br/> Seguro de contar con una pronta respuesta de antemano le quedo agradecido</li>
																	</ol>
																	
																	<li><br/>Atentamente,</li>
																	<p>&nbsp;</p>
																	<li>___________________</li>
																	<li>{{$nombres}} {{$apellidos}}</li>
																	<li>C.I.{{$identificacion}}</li>
																	</ol>
																	<br/>
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
