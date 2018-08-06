@extends('layouts.app')

@section('contentheader_title')
    JuridiCore
@endsection

@section('contentheader_description')
    Creación de Periodos
@endsection
@section('css')
    <link href="{{ url('adminlte/plugins/notifications/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ url('adminlte/plugins/datepicker/') }}/datepicker3.css" rel="stylesheet">
@endsection
@section('javascript')
    <script src="{{ url('js/modules/solicitudescj/periodis.js') }}"></script>
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
    <hr/>
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['method' => 'POST', 'route' => ['periods.store']]) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('global.app_create')
                </div>

                <div class="panel-body" style="margin:25px">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('descripcion', 'Descripción', ['class' => 'control-label']) !!}
                            {!! Form::text('descripcion', old('descipcion'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('fechai', 'Fecha Inicio', ['class' => 'control-label']) !!}
                            {!! Form::text('fechai',' ',['class'=>'form-control pickadate','id'=>'fechai','placeholder'=>'Seleccione fecha ', ""]) !!}
                            
                        </div>
                    </div>

                    

                     <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('fechaf', 'Fecha Final', ['class' => 'control-label']) !!}
                            {!! Form::text('fechaf',' ',['class'=>'form-control pickadate','id'=>'fechaf','placeholder'=>'Seleccione fecha ', ""]) !!}
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">                            
                        
                            {!! Form::label('Max Tutorias', 'Maxima Tutorias', ['class' => 'control-label']) !!}
                            {!! Form::text('maxtutoria', null, ['class' => 'form-control', 'placeholder' => '','maxlength'=>'50']) !!}
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('fechai_extraordinaria', 'Fecha Inicio Extraordinaria', ['class' => 'control-label']) !!}
                            {!! Form::text('fechai_extraordinaria',' ',['class'=>'form-control pickadate','id'=>'fechai_extraordinaria','placeholder'=>'Seleccione fecha ', ""]) !!}
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('fechaf_extraordinaria', 'Fecha Final Extraordinaria', ['class' => 'control-label']) !!}
                            {!! Form::text('fechaf_extraordinaria',' ',['class'=>'form-control pickadate','id'=>'fechaf_extraordinaria','placeholder'=>'Seleccione fecha ', ""]) !!}
                            
                        </div>
                    </div>
                
                    <input type="hidden" name="estado" value="A"/>
                    <br>
                    <div class="pull-right">
                    {!! Form::button(trans('global.app_save'), ['type'=>'submit','class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
        

        {!! Form::close() !!}
        @stop
