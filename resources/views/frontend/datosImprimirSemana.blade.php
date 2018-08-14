
<!DOCTYPE html>
<html lang="es">
<head>
@include('frontend.partials.head')

</head>
<style>
/* DivTable.com */
.divTable{
	display: table;
	width: 100%;
}
.divTableRow {
	display: table-row;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
}
.divTableCell, .divTableHead {
	border: 1px solid #999999;
	display: table-cell;
	padding: 3px 10px;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
	font-weight: bold;
}
.divTableFoot {
	background-color: #EEE;
	display: table-footer-group;
	font-weight: bold;
}
.divTableBody {
	display: table-row-group;
}
</style>
<body>

<div id="renderMe">
			
									<div class="modal-content">

															<div class="modal-header">
															<table width="100%" >
															<tr>
															<td>
															<img src="{{public_path('images/')}}ug.png"  width="100px" height="120px">
															</td>
															<td>	 <center>
																			<h5>UNIVERSIDAD DE GUAYAQUIL</h5>
																		
																</center></td>
																
																<td>
																
																<img src="{{public_path('images/')}}juris.png"style="float:right" width="80px" height="120px">

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
																	<div class="divTable">
																			<div class="divTableBody">
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Estudiante</div>
																			<div class="divTableCell">&nbsp;{{$objPostulant->apellidos.' '.$objPostulant->nombres}}</div>
																			</div>
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Facultad</div>
																			<div class="divTableCell">&nbsp;Facultad de Jurisprudencia y Ciencias Sociales</div>
																			</div>
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Carrera</div>
																			<div class="divTableCell">&nbsp;{{$objPostulant->carrera}}</div>
																			</div>
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Supervisor</div>
																			<div class="divTableCell">&nbsp;{{$supervisor}}</div>
																			</div>
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Semana</div>
																			<div class="divTableCell">&nbsp;{{$semana}}</div>
																			</div>
																			</div>
																			</div>
														<br/>
																	<table width="100%" border="1" style="text-align:left;" cellpadding="0" cellspacing="0" >
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
																	<td>{{$observaciones}}
																	</td>
																	</table>

															
																	


																	<table style="text-align:center;margin-top:120px" width="100%">
																	<tr>
																	<td style="">Firma
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
