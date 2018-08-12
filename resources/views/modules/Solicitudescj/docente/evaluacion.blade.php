
<!DOCTYPE html>
<html lang="es">
<head>
@include('frontend.partials.head')

</head>
<style>
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
.letrap{
		font-size:12px;
}
.letrapp{
		font-size:11px;
}
</style>
<body>
<div id="renderMe">
									<div class="modal-content">

															<div class="modal-header">
																<table width="100%" cellpadding=0 cellspacing=0 >
																<tr>
																<td>
																<img src="{{public_path('images/')}}ug.png"  width="80px" height="100px">
																</td>
																<td>	 <center>
																				<h5>UNIVERSIDAD DE GUAYAQUIL</h5>
                                                                                <h4>
																			FICHA DE SUPERVISIÓN DEL TUTOR ACADÉMICO</h4>
																	</center></td>
																	
																	<td>
																	
																	<img src="{{public_path('images/')}}juris.png"style="float:right" width="60px" height="100px">

																	</td>
																	</tr>
																	</table>
																<center><strong>	
																
																			
																			
																				</strong>
																				</center>
															</div>

																<div class="modal-body" >

																	<div class="agileits-w3layouts-info">
																		<div style="background: url({{public_path('images/fondo1.jpeg')}}) no-repeat center;background-size: 200px 300px;">
																		<div class="divTable letrapp">
																			<div class="divTableBody">
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Fecha</div>
																			<div class="divTableCell">&nbsp;{{$obj->created_at}}</div>
																			</div>
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Visita</div>
																			<div class="divTableCell">&nbsp;{{$obj->visita}}</div>
																			</div>
																		
																			
																			</div>
																			</div>
																		
                                                                        <div class="divTable letrapp">
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
																			<div class="divTableCell">&nbsp;Hora</div>
																			<div class="divTableCell">&nbsp;{{$teachers->hora_inicio.'-'.$teachers->hora_fin}}</div>
																			</div>
																			</div>
																			</div>
																		
																		<div class="divTable letrapp">
																			<div class="divTableBody">
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Insitucion</div>
																			<div class="divTableCell">&nbsp;{{$teachers->lugar->descripcion}}</div>
																			</div>
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Area de Desempeño</div>
																			<div class="divTableCell">&nbsp;</div>
																			</div>
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Supervisor Institucional</div>
																			<div class="divTableCell">&nbsp;{{$teachers->docente->name}}</div>
																			</div>
																			<div class="divTableRow">
																			<div class="divTableCell">&nbsp;Cargo de Supervisor Institucional</div>
																			<div class="divTableCell">&nbsp;ABOGADO</div>
																			</div>
																			
																			</div>
																			</div>
										
<div id="pantallas tesis_30233" x:publishsource="Excel">

<table border=1 cellpadding=0 cellspacing=0 width=1091 style='border-collapse:
 collapse;table-layout:fixed;width:100%' class="letrap">
 <col width=151 style='mso-width-source:userset;mso-width-alt:5522;width:113pt'>
 <col width=217 style='mso-width-source:userset;mso-width-alt:7936;width:163pt'>
 <col width=452 style='mso-width-source:userset;mso-width-alt:16530;width:339pt'>
 <col width=80 span=2 style='width:60pt'>
 <col width=111 style='mso-width-source:userset;mso-width-alt:4059;width:83pt'>
 <tr height=20 style='height:15.0pt'>
  <td colspan=3 height=20 class=xl6330233 width=820 style='height:15.0pt;
  width:615pt'>VALORACIÓN</td>
  <td class=xl6330233 width=80 style='border-left:none;width:60pt'>SI</td>
  <td class=xl6330233 width=80 style='border-left:none;width:60pt'>NO</td>
  <td class=xl6330233 width=111 style='border-left:none;width:83pt'>OBSERVACIONES</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 rowspan=5 height=120 class=xl6430233 width=300
  style='height:90.0pt;width:200pt'>VALORACIÓN AL ESTUDIANTE</td>
  <td class=xl6530233 width=452 style='border-top:none;border-left:none;
  width:339pt'>Realizo de manera satisfactoria sus PPP, en la institución
  receptora.</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6530233 width=452 style='height:15.0pt;border-top:none;
  border-left:none;width:339pt'>Cumplió con la planificación de PPP</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6530233 width=452 style='height:15.0pt;border-top:none;
  border-left:none;width:339pt'>Se encuentra conforme con las actividades
  realizadas en las PPP</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl6530233 width=452 style='height:30.0pt;border-top:none;
  border-left:none;width:339pt'>Considera que las PPP, realizadas en la
  insitución , contribuyen a la formación profesional del estudiante</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6530233 width=452 style='height:15.0pt;border-top:none;
  border-left:none;width:339pt'>El ambiente laboral es adecuado para el
  desarrollo de las PPP</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=2 rowspan=5 height=140 class=xl6430233 width=300
  style='height:105.0pt;width:200pt'>VALORACIÓN CONJUNTA CON EL SUPERVISOR
  INSTITUCIONAL</td>
  <td class=xl6530233 width=600 style='border-top:none;border-left:none;
  width:339pt'>El estudiante cumplió con el horario establecido para las PPP</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl6530233 width=600 style='height:30.0pt;border-top:none;
  border-left:none;width:339pt'>El comportamiento del estudiante estuvo acorde
  con las políticas de la empresa</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6530233 width=600 style='height:15.0pt;border-top:none;
  border-left:none;width:339pt'>El estudiante se acopló al equipo de trabajo
  del departamento</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6530233 width=600 style='height:15.0pt;border-top:none;
  border-left:none;width:339pt'>El estudiante cumplió con las actividades
  asignadas</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl6530233 width=600 style='height:30.0pt;border-top:none;
  border-left:none;width:339pt'>Considera que el estudiante tiene los
  conocimientos necesarios , de acuerdo a su nivel académico</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6330233 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 </table>
 <table  class="letrap">

 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl6730233 width=151 style='height:30.0pt;width:113pt'>VALORACION
  FINAL APROBADO</td>
  <td class=xl6630233><input type="checkbox"></td>
  <td class=xl6830233 colspan=4>(Si el número de valoraciones &quot;SI&quot;
  son minimo 7 y la evaluación del supervisor de la empresa es minimo de 7</td>
 </tr>
 <tr height=51 style='mso-height-source:userset;height:38.25pt'>
  <td height=51 class=xl6730233 width=151 style='height:38.25pt;width:113pt'>REPROBADO</td>
  <td class=xl6630233><input type="checkbox"></td>
  <td class=xl6830233 colspan=4>(Si el número de valoraciones &quot;SI&quot; es
  menos de 7 y la evaluación del supervisor de la empresa es menos de 7</td>
 </tr>

</table>

</div>



																		</div>					
										 							</div>
																</div>
		</div>
<div id="editor"></div>


</body>

</html>
