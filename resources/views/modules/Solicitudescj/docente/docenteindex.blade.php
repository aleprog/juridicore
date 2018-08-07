@extends('layouts.app')

@section('contentheader_title')
	JuridiCore
@endsection

@section('contentheader_description')
	Sistema Integrado 
@endsection
@section('css')
    <link href="{{ url('adminlte/plugins/notifications/sweetalert.css') }}" rel="stylesheet">
	<style>
	a.tooltips {
  position: relative;
  display: inline;
}
a.tooltips span {
  position: absolute;
  width:140px;
  color: #FFFFFF;
  background: #139C8E;
  border: 2px solid #6D6D6D;
  height: 99px;
  line-height: 99px;
  text-align: center;
  visibility: hidden;
  border-radius: 23px;
}
a.tooltips span:before {
  content: '';
  position: absolute;
  top: 50%;
  right: 100%;
  margin-top: -12px;
  width: 0; height: 0;
  border-right: 12px solid #6D6D6D;
  border-top: 12px solid transparent;
  border-bottom: 12px solid transparent;
}
a.tooltips span:after {
  content: '';
  position: absolute;
  top: 50%;
  right: 100%;
  margin-top: -8px;
  width: 0; height: 0;
  border-right: 8px solid #139C8E;
  border-top: 8px solid transparent;
  border-bottom: 8px solid transparent;
}
a:hover.tooltips span {
  visibility: visible;
  opacity: 1;
  left: 100%;
  top: 50%;
  margin-top: -49.5px;
  margin-left: 15px;
  z-index: 999;
}
	</style>

@endsection
@section('javascript')

<script type="text/javascript">
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
			
    </script>
<script>

$("body").addClass("sidebar-collapse");

$('#dtmenu').DataTable().destroy();
$('#tbobymenu').html('');

$('#dtmenu').show();
$.fn.dataTable.ext.errMode = 'throw';
	var table=$('#dtmenu').DataTable(
	{

		dom: 'lfrtip',

		responsive: true, "oLanguage":
			{
				"sUrl": "/js/config/datatablespanish.json"
			},
	  
	  
		"lengthMenu": [[10, -1], [10, "All"]],
		"order": [[1, 'desc']],
		"searching": true,
		"info": true,
		"ordering": true,
		"bPaginate": true,
		"processing": true,
		"serverSide": true,
		"deferRender": true,
		"destroy": true,
		"ajax": "/datatableAsistencia/" ,

		"columns": [
	 
			{data: 'fecha', "width": "10%"},
			{data: 'estudiante', "width": "10%"},

			{data: 'semana', "width": "10%"},
			{data: 'hora_inicio', "width": "10%"},
			{data: 'hora_fin', "width": "10%"},
			{data: 'horas', "width": "10%"},


			{
				data: 'Estado',
				"width": "20%",
				"bSortable": true,
				"searchable": true,
				"targets": 0,
				"render": function (data, type, row) {
					return $('<div />').html(row.Estado).text();
				}
			},
			
		]
	}).ajax.reload();

</script>
@endsection
@section('content')
<hr/>
<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Inicio</div>

					<div class="panel-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="tabbable" id="tabs-999753">
										<ul class="nav nav-tabs">
											<li class="nav-item active">
												<a class="nav-link active" href="#panel-717633" data-toggle="tab">Asistencia</a>
											</li>
											<!--<li class="nav-item">
												<a class="nav-link" href="#panel-778868" data-toggle="tab">
                                                Actividades Estudiantiles
                                                </a>
											</li>-->
										</ul>
										<div class="tab-content">
											<!--<div class="tab-pane" id="panel-778868">
												<p>
												@include('modules.Solicitudescj.docente.actividad')
	
												</p>
											</div>-->
											<div class="tab-pane active" id="panel-717633">
												<p>
												@include('modules.Solicitudescj.docente.asistencia')
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection

