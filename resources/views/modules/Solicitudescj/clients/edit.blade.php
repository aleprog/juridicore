@extends('layouts.app')

@section('contentheader_title')
    JuridiCore
@endsection

@section('contentheader_description')
    Modificación de Clientes
@endsection
@section('css')
    <link href="{{ url('adminlte/plugins/notifications/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ url('adminlte/plugins/datepicker/') }}/datepicker3.css" rel="stylesheet">
@endsection
@section('javascript')
    <script src="{{ url('js/modules/solicitudescj/clients.js') }}"></script>
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
        <div class="col-md-12 col-md-offset-0">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('global.app_update')
                </div>              

                <div class="panel-body" style="margin:25px">
                {!! Form::model($client,['method' => 'POST', 'route' => ['clients.update',$client->id]]) !!}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-xs-4 form-group">
                            {!! Form::label('nombres', 'Nonbres', ['class' => 'control-label']) !!}
                            {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            
                            
                        </div>

                         <div class="col-xs-4 form-group">
                            {!! Form::label('apellidos', 'Apellidos', ['class' => 'control-label']) !!}
                            {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}   
                            
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('cedula', 'Cedula', ['class' => 'control-label']) !!}
                            {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}   
                            
                        </div>

                        <div class="col-xs-12 clearfix" style="height: 10px;"></div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento', ['class' => 'control-label']) !!}
                            {!! Form::text('fecha_nacimiento',null,['class'=>'form-control pickadate','id'=>'fechai','placeholder'=>'Seleccione fecha ', 'required' => '']) !!}
                            
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('nacionalidad', 'Nacionalidad', ['class' => 'control-label']) !!}
                            {!! Form::text('nacionalidad', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}   
                            
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('etnia', 'Etnia', ['class' => 'control-label']) !!}
                            {!! Form::text('etnia', null, ['class' => 'form-control', 'placeholder' => '', ]) !!}   
                            
                        </div>

                        <div class="col-xs-12 clearfix" style="height: 10px;"></div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('celular', 'Celular', ['class' => 'control-label']) !!}
                            {!! Form::text('celular', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}   
                            
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('convencional', 'Convencional', ['class' => 'control-label']) !!}
                            {!! Form::text('convencional', null, ['class' => 'form-control', 'placeholder' => '']) !!}   
                            
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('instruccion', 'Instrucción', ['class' => 'control-label']) !!}
                            {!! Form::select('instruccion',['Basica'=>'Basica','Segundaria'=>'Segundaria','Superior'=>'Superior'], Null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!} 
                            
                        </div>

                        <div class="col-xs-12 clearfix" style="height: 10px;"></div>

                        <div class="col-xs-8 form-group">
                            {!! Form::label('domiciolio', 'Domicilio', ['class' => 'control-label']) !!}
                            {!! Form::text('domicilio', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}   
                            
                        </div>

                         <div class="col-xs-4 form-group">
                            {!! Form::label('estado_civil', 'Estado Civil', ['class' => 'control-label']) !!}
                            {!! Form::select('estado_civil',['Soltera'=>'Soltera','Casada'=>'Casada','Viuda'=>'Viuda','Divorciada'=>'Divorciada'], Null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!} 
                            
                        </div>

                        <div class="col-xs-12 clearfix" style="height: 10px;"></div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('sexo', 'Sexo', ['class' => 'control-label']) !!}
                            {!! Form::select('sexo',['Femenino'=>'Femenino','Masculino'=>'Masculino','Otros'=>'Otros'], Null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!} 
                            
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('tipo_sexo', 'Tipo Sexo', ['class' => 'control-label']) !!}
                            {!! Form::text('tipo_sexo', null, ['class' => 'form-control', 'placeholder' => '']) !!}   
                            
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('sector', 'Sector donde vive', ['class' => 'control-label']) !!}
                            {!! Form::text('sector', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}   
                            
                        </div>

                        <div class="col-xs-12 clearfix" style="height: 10px;"></div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('ocupacion', 'Ocupación', ['class' => 'control-label']) !!}
                            {!! Form::text('ocupacion', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}                           
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('iess', 'Afiliado al IESS', ['class' => 'control-label']) !!}
                            {!! Form::select('iess',['NO'=>'NO','SI'=>'SI'], Null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}                             
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('ingresos', 'Ingresos', ['class' => 'control-label']) !!}
                            {!! Form::text('ingresos', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}                           
                        </div>

                        

                        

                        <div class="col-xs-12 clearfix" style="height: 10px;"></div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('bono', 'Bono', ['class' => 'control-label']) !!}
                            {!! Form::select('bono',['NO'=>'NO','SI'=>'SI'], Null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}                             
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('discapacidad', 'Discapacidad', ['class' => 'control-label']) !!}
                            {!! Form::select('discapacidad',['NO'=>'NO','SI'=>'SI'], Null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}                             
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('tipo_discapacidad', 'Tipo de Discapacidad', ['class' => 'control-label']) !!}
                            {!! Form::text('tipo_discapacidad', null, ['class' => 'form-control', 'placeholder' => '']) !!}                           
                        </div>

                        <div class="col-xs-12 clearfix" style="height: 10px;"></div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('enfermedad', 'Enfermedad Catastrófica', ['class' => 'control-label']) !!}
                            {!! Form::select('enfermedad',['NO'=>'NO','SI'=>'SI'], Null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}                             
                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('tipo_enfermedad', 'Tipo de Enfermedad', ['class' => 'control-label']) !!}
                            {!! Form::text('tipo_enfermedad', null, ['class' => 'form-control', 'placeholder' => '']) !!}                           
                        </div>

                        

                    </div>
                   
                    <input type="hidden" name="estado" value="A"/>
                    <br>
                    <div class="pull-right">
                    {!! Form::button(trans('global.app_update'), ['type'=>'submit','class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['method' => 'POST', 'route' => ['clients.asignarSupervisor']]) !!}
                    <div class="row">

                        <div class="col-md-12" style="background-color: #ccc; margin-top: 20px;">
                            <h4 style="padding-left: 10px;" >Asignar Nueva Consulta al Supervisor</h4>
                        </div>

                        <div class="col-md-12" style="margin-top: 15px;">          

                        </div>

                        <div class="col-xs-4 form-group">
                            {!! Form::label('supervisor_id', 'Supervisor', ['class' => 'control-label']) !!}
                            {!! Form::select('supervisor_id', $supervisors, Null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}                             
                        </div>

                        <input type="hidden" name="cliente_id" value="{{$client->id}}"/>
                        <br>
                        <div class="pull-right">
                        {!! Form::button(trans('global.app_save'), ['type'=>'submit','class' => 'btn btn-primary']) !!}

                    </div>
                    {!! Form::close() !!}

                </div>
            </div>       
        </div>
        

        
        @stop
