<div>

<form method="POST" action="{{ route ('supervisor.asistenciaSave')}}" accept-charset="UTF-8">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<table width="100%" border="1">
<tr>
<td>Fecha de Asistencia
</td>
<td>Estudiante</td>
<td>Semana (Solo numeros)</td>
<td>Hora/Entrada</td>
<td>Horas/trabajo(0-6)</td>
<td>Hora/Salida</td>
<td>Opciones</td>
</tr>
<tr>
<td>
{!! Form::date('fecha_registro', null,['class' => 'form-control','placeholder'=>'fecha_registro',"style"=>"width:100%","id"=>"fecha_registro","name"=>"fecha_registro"]) !!}

</td>
<td>{!! Form::select('estudiante', $objD, null,['class' => 'form-control select2',"style"=>"width:100%","id"=>"estudiante","name"=>"estudiante"]) !!}
</td>							
<td>{!! Form::text('semana','1',['class' => 'form-control',"style"=>"width:100%","id"=>"semana","name"=>"semana","maxlength"=>"2","onKeypress"=>"return soloNumeros1_99(event)"]) !!}
</td>	
<td>
<input type="time"  id="horario_inicio" name="hora_inicio" step="3600" onclick="agregahora()" onkeyup="agregahora()" min="9:00" max="15:00" required />
</td>
<td>
<input type="text" value="0" id="cant_horas"  name="cant_horas" onkeyup="agregahora()" onKeypress="return soloNumeros0_6(event)" maxlength="1" required />
</td>
<td>
<div style="display:none">
<input type="time"  id="idhf" name="hf"/></div>
<input type="time"  id="horario_fin" name="hora_fin" disabled />

</td>

<td>
<div style="display:none">
<button type="submit"class="btn btn-primary" id="enviarform">Enviar</button>
</div>
</form>
<span class="btn btn-primary" onclick="validarform()">Enviar</span>
</td>
</tr>
</table>

<div class="panel-body">
              <table class="table table-bordered table-striped " id="dtmenu" style="width:100%!important" >
                  <thead>

                  <th>Fecha de Asistencia</th>
                  <th>Estudiante</th>
				  <th>Semana</th>
                  <th>hora de inicio</th>
                  <th>hora de salida</th>
				  <th>Cantidad/Hora</th>

                  <th>Estado</th>

                  </thead>
                  <tbody id="tbobymenu">

                  </tbody>
              </table>
  </div>
</div>