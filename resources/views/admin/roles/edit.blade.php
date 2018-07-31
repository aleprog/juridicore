@extends('layouts.app')
@section('css')
    <link href="{{ url('adminlte/plugins/notifications/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('javascript')
    <script src="{{ url('js/modules/admin/menu_rol.js') }}"></script>
@endsection
@section('contentheader_title')
    JuridiCore
@endsection

@section('contentheader_description')
    Edición de Roles
@endsection
@section('content')

    {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update', $role->id]]) !!}
<div class="row">
			<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            Agregar Nuevos
        </div>

        <div class="panel-body" style="margin:25px">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'disabled'=>'disabled']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('permission', 'Permissions', ['class' => 'control-label']) !!}
                    {!! Form::select('permission[]', $permissions, null, ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('permission'))
                        <p class="help-block">
                            {{ $errors->first('permission') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>
    {!! Form::button('<b><i class="fa fa-save"></i></b> Guardar Cambios', array('type' => 'button', 'class' => 'btn btn-primary','id' => "btnG")) !!}
    {!! Form::close() !!}
@stop

