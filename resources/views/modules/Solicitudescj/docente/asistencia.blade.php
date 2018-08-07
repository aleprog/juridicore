<div>

<form method="POST" action="{{ route ('supervisor.asistenciaSave')}}" accept-charset="UTF-8">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<table width="100%" border="1">
<tr>
<td>Fecha de Asistencia
</td>
<td>Estudiante</td>
<td>Semana</td>
<td>Hora de Entrada</td>
<td>Hora de Salida</td>
<td>Opciones</td>
</tr>
<tr>
<td>
{!! Form::date('fecha_registro', null,['class' => 'form-control','placeholder'=>'fecha_registro',"style"=>"width:100%","id"=>"fecha_registro","name"=>"fecha_registro"]) !!}

</td>
<td>{!! Form::select('estudiante', $objD, null,['class' => 'form-control select2',"style"=>"width:100%","id"=>"estudiante","name"=>"estudiante"]) !!}
</td>							
<td>{!! Form::text('semana','0',['class' => 'form-control',"style"=>"width:100%","id"=>"semana","name"=>"semana","onKeypress"=>"return soloNumeros(event)"]) !!}
</td>	
<td>
<input type="time"  id="hora_inicio" name="hora_inicio"  min="9:00" max="18:00" required />
</td>
<td><input type="time"  id="hora_fin" name="hora_fin"  min="9:00" max="18:00" required />
</td>
<td><button type="submit"class="btn btn-primary">Enviar</button></td>
</tr>
</table>
</form>
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