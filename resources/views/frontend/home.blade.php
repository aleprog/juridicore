@extends('frontend.layouts.app')
@section('javascript')
<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
</script>

    <script src="{{ url('adminlte/plugins/datepicker/') }}/bootstrap-datepicker.js"></script>

    <script>
        $('.pickadate').datepicker({
            formatSubmit: 'yyyy-mm-dd',
            format: 'yyyy-mm-dd',
            selectYears: true,
            editable: true,
            autoclose: true,
            orientation: 'top'
        });
		@if(session('message'))
			alert('{{session("message")}}');
		@endif
	
		@if(session("pp"))
			imprimir();
		@endif
		@if ($errors->any())
		     		@foreach ($errors->all() as $error)
						alert('{{ $error }}');
					@endforeach
				
		@endif
	
function imprimir() {
	var identificacion='{{session("data")["identificacion"]}}';
	var nombres='{{session("data")["nombres"]}}';
	var apellidos='{{session("data")["apellidos"]}}';
	var convencional='{{session("data")["convencional"]}}';
	var direccion='{{session("data")["direccion"]}}';
	var carrera='{{session("data")["carrera"]}}';

	var celular='{{session("data")["celular"]}}';
	var semestre='{{session("data")["semestre"]}}';

								var html;
								var disp_setting = "toolbar=yes,location=no,";
								disp_setting += "directories=yes,menubar=yes,";
								disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
								//var contenido= document.getElementById("areaImprimir").innerHTML;
								var docprint = window.open("", "", disp_setting);
								docprint.document.open();
								 html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"';
								html += '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
								html += '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">';
								html += '<head><title></title>';
								html += '<style type="text/css">body{ margin:0px;';
								html += 'font-family:verdana,Arial;color:#000;';
								html += 'font-family:Verdana, Geneva, sans-serif; font-size:12px;}';
								html += 'a{color:#000;text-decoration:none;} ';
								html += '</style>';
								html += '</head><body onLoad="self.print()"><center>';
								html+='<div class="col-lg-12" style="height:1000px">';
								html+='<center><img src="/images/fondoO.jpeg" width="180px" height="150px"></center>';
								html+='<div style="padding:25px 25px 25px 25px" margin-top="100px">';
								html+='<h1>Solicitud de Practicas Pre Profesionales</h1>';
								html+='<hr/>';
								html+='<br/>';
								html+='<table width="100%" padding:"25px">';
								html+='<tr>';
								html+='<td>';
								html+='<h2 align="justify">Carrera:</h2>';
								html+='</td>';
								html+='<td>'+carrera+'</td>';
								html+='</tr>';
								html+='<tr>';
								html+='<td>';
								html+='<h2 align="justify">Identificacion:</h2>';
								html+='</td>';
								html+='<td>'+identificacion+'</td>';
								html+='</tr>';
								html+='<tr>';
								html+='<td>';
								html+='<h2 align="justify">Nombres:</h2>';
								html+='</td>';
								html+='<td>'+nombres+'</td>';
								html+='</tr>';
								html+='<tr>';
								html+='<td>';
								html+='<h2 align="justify">Apellidos:</h2>';
								html+='</td>';
								html+='<td>'+apellidos+'</td>';
								html+='</tr>';
								html+='<tr>';
								html+='<td>';
								html+='<h2 align="justify">Semestre:</h2>';
								html+='</td>';
								html+='<td>'+semestre+'</td>';
								html+='</tr>';
								html+='<tr>';
								html+='<td>';
								html+='<h2 align="justify">Direccion:</h2>';
								html+='</td>';
								html+='<td>'+direccion+'</td>';
								html+='</tr>';
								html+='<tr>';
								html+='<td>';
								html+='<h2 align="justify">Convencional:</h2>';
								html+='</td>';
								html+='<td>'+convencional+'</td>';
								html+='</tr>';
								html+='<tr>';
								html+='<td>';
								html+='<h2 align="justify">Celular:</h2>';
								html+='</td>';
								html+='<td>'+celular+'</td>';
								html+='</tr>';
								html+='<tr>';
								html+='<td>';
								html+='<h2 align="justify">Correo Insitucional:</h2>';
								html+='</td>';
								html+='<td>'+correo_institucional+'</td>';
								html+='</tr>';
								html+='</table>';
								html+='<hr/>';
								html+='<br/>';
		
								html+='</div>';
								html+='</div>';
								html+='<p style="bottom:0;left:0;position:relative" align="justify">';
								html+='Esta Solicitud es impresa desde la Web y sera verificada por su identificación';
								html+='al momento de entregar en la secretaria de la Facultad';
								html+='<p/>';
								html +='</body>';
								html+='</html>';

								docprint.document.write(html);
								docprint.document.close();
								docprint.focus();

}


   </script>
   
   <script>
   	


   </script>
@endsection
