@extends('layouts.app')

@section('contentheader_title')
	JuridiCore
@endsection

@section('contentheader_description')
	Sistema Integrado de PublyNext
@endsection
@section('css')
	<link href="{{ url('adminlte/plugins/notifications/sweetalert.css') }}" rel="stylesheet">
	<link href="{{ url('adminlte/plugins/pivot/') }}/pivot.css" rel="stylesheet">
	<link href="{{ url('adminlte/plugins/datepicker/') }}/datepicker3.css" rel="stylesheet">

@endsection
@section('javascript')
	<script src="{{ url('js/modules/report/reporteGeneral.js') }}"></script>
	<script src="{{ url('adminlte/plugins/pivot/') }}/pivot.js"></script>
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

	</script>
@endsection
@section('content')

	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">

				<div class="panel-body">
					<div class="col-lg-12">
						<div class="col-lg-2">

							{!! Form::text('fecha_inicio',' ',['class'=>'form-control pickadate','id'=>'fechai','placeholder'=>'Seleccione fecha ', ""]) !!}

						</div>
						<div class="col-lg-1">
							<i class="fa fa-calendar"></i>
						</div>
						<div class="col-lg-2">

							{!! Form::text('fecha_final',' ',['class'=>'form-control pickadate','id'=>'fechaf','placeholder'=>'Seleccione fecha ', ""]) !!}

						</div>
						<div class="col-lg-1">
							<i class="fa fa-calendar"></i>

						</div>
						<div class="col-lg-1">
							{!! Form::button('<b><i class="fa fa-save"></i></b> Guardar Cambios', array('type' => 'button', 'class' => 'btn btn-primary','id' => "btnGuardar")) !!}
						</div>
					</div>
					<hr/>
					<div id="output" style="margin: 30px;"></div>
				</div>
			</div>
		</div>
	</div>

@endsection