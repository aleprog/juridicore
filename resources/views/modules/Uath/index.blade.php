@extends('layouts.app')

@section('contentheader_title')
    JuridiCore
@endsection

@section('contentheader_description')
    Sistema Integrado de PublyNext
@endsection

@section('content')
@section('css')
    <link href="{{ url('adminlte/plugins/notifications/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ url('adminlte/plugins/pivot/') }}/pivot.css" rel="stylesheet">

@endsection
@section('javascript')
    <script src="{{ url('js/modules/uath/directorio.js') }}"></script>
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

<div class="col-lg-2" style="float:right">

    <a href="#" data-hover="tooltip" data-placement="top" class="btn btn-primary"
       data-target="#Modalagregar" data-toggle="modal" id="modal" onclick="limpiar();">Nuevo</a>
</div>
<hr/>

<div class="modal fade" id="Modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Datos del Empleado</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="col-lg-12" style="margin:5px">
                        <div class="col-md-12">

                            <div class="col-md-4">
                                <strong>Identificación:</strong>
                            </div>
                            <div class="col-md-4">
                                <strong>Nombres Completos:</strong>
                            </div>

                            <div class="col-md-4">
                                <strong>Apellidos Completos:</strong>
                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="col-md-4">
                                {!! Form::text('identificacion', null,["required"=>"required","class"=>"form-control" ,"placeholder"=>"Identificación",'maxlength'=>'13','id'=>'identificacion'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::text('nombres', null,["required"=>"required","class"=>"form-control" ,"placeholder"=>"Nombres",'id'=>'nombres'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::text('apellidos', null,["required"=>"required","class"=>"form-control" ,"placeholder"=>"Apellidos",'id'=>'apellidos'])!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin: 5px">

                        <div class="col-md-12">
                            <div class="col-md-4">
                            <strong>Género:</strong>

                                {!! Form::select('genero', ['0'=>'Genero','M'=>'Masculino','F'=>'Femenino'], 0,['class' => 'form-control select2','id'=>'genero']) !!}
                            </div>
                            <div class="col-md-4">
                            <strong>Provincia:</strong>

                                {!! Form::select('provincia_id', $provincia, null,['class' => 'form-control select2',"placeholder"=>"Provincia",'id'=>'provincia_id']) !!}
                            </div>
                            <div class="col-md-4">
                            <strong>Ciudad:</strong>

                            {!! Form::select('ciudad_id', [], null,['class' => 'form-control select2','placeholder'=>'CIUDAD',"style"=>"width:100%","id"=>"ciudad_id"]) !!}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin: 5px">
                    
                        <div class="col-md-4">
                        <strong>Convencional:</strong>

                            {!! Form::text('convencional', null, ["style"=>"resize: none",'placeholder'=>'Convencional',"class"=>"form-control",'id'=>'convencional','onKeypress'=>'if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;']) !!}
                        </div>
                        <div class="col-md-4">
                        <strong>Celular:</strong>

                            {!! Form::text('celular', null, ["style"=>"resize: none",'placeholder'=>'Celular','maxlength'=>'10',"class"=>"form-control",'id'=>'celular','onKeypress'=>'if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;','onBlur'=>'verificaCelular()']) !!}
                        </div>
                        <div class="col-md-4">
                        <strong>Fecha de Ingreso:</strong>

                            {!! Form::text('ing_empresa', null, ["style"=>"resize: none",'placeholder'=>'Ingreso a la Empresa:',"class"=>"form-control pickadate",'id'=>'ing_empresa']) !!}
                        </div>

                    </div>
                    <div class="col-md-12" style="margin: 5px">

                        <div class="col-md-4">
                        <strong>Modo:</strong>

                            {!! Form::select('modo', ['A'=>'ACTIVO','I'=>'PASIVO'], 'A',['class' => 'form-control select2','id'=>'modo']) !!}
                        </div>
                        <div class="col-md-4">
                        <strong>Cargo:</strong>

                            {!! Form::select('cargo', $cargo, null,['class' => 'form-control select2',"placeholder"=>"Cargo",'id'=>'cargo']) !!}
                        </div>
                        <div class="col-md-4">
                        <strong>Lider:</strong>

                            {!! Form::select('lider', $lider, null,['class' => 'form-control select2',"placeholder"=>"Lider",'id'=>'lider']) !!}
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin: 5px">
                        <div class="col-md-12">
                           
                            <div class="col-md-8">
                            <strong>Direccion:</strong>
                                {!! Form::textarea('direccion', null, ["style"=>"resize: none",'rows'=>"3",'placeholder'=>'Dirección',"class"=>"form-control-t",'onkeyup'=>"this.value = this.value.toUpperCase()" ,'maxlength'=>'200','id'=>'direccion']) !!}
                            </div>
                            <div class="col-md-4">
                                <strong>Bandeja Asignada:</strong>
                                {!! Form::select('departamento_id[]', $departamentos,null,['class' => 'form-control select2','multiple'=>'multiple','id'=>'departamento_id']) !!}

                            </div>

                        </div>

                    </div>


                    <div class="col-md-12" style="margin: 5px">

                        <div class="col-md-4">
                        <strong>Email:</strong>

                            {!! Form::email('email', null, ["style"=>"resize: none",'rows'=>"3",'placeholder'=>'email',"class"=>"form-control",'id'=>'email']) !!}
                        </div>
                        <div class="col-md-4">
                        <strong>Correo Institucional:</strong>

                            {!! Form::email('correo_institucional', null, ["style"=>"resize: none",'rows'=>"3",'placeholder'=>'Correo Institucional',"class"=>"form-control",'id'=>'correo_institucional']) !!}
                        </div>
                        <div class="col-md-4">
                        <strong>Tipo de Empleado:</strong>

                            {!! Form::select('tipo_empleado', ['LG'=>'LIDER','AD'=>'ADMINISTRATIVO','EN'=>'E-NORMAL','EE'=>'E-ELITE'],'EN',['class' => 'form-control select2','id'=>'tipo_empleado']) !!}
                        </div>


                    </div>



                    <input type="hidden" id="ciudad_id_h" value="0">

                </div>
            </div>
            <div class="modal-footer">
                <div style="text-align: center;">
                    {!! Form::button('<b><i class="fa fa-save"></i></b> Guardar Cambios', array('type' => 'button', 'class' => 'btn btn-primary','id' => "btnGuardar")) !!}
                    {!! Form::button('<b><i class="glyphicon glyphicon-remove"></i></b> Cerrar', array('type' => 'button', 'class' => 'btn btn-danger','id' => "btnCancelar", 'data-dismiss'=>"modal")) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Consulta de datos

    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped " id="dtmenu" style="width:100%!important">
            <thead>

            <th>Identificacion</th>
            <th>Nombres y Apellidos</th>
            <th>Ciudad</th>
            <th>Celular</th>
            <th>Lider</th>
            <th>Ingreso</th>
            <th>Estados</th>
            <th>Opciones</th>

            </thead>
            <tbody id="tbobymenu">

            </tbody>
        </table>
    </div>
</div>

@endsection
