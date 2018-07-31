@extends('layouts.app')
@section('contentheader_title')
    JuridiCore
@endsection

@section('contentheader_description')
    Creación de Roles
@endsection
@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['admin.roles.store']]) !!}
<div class="row">
			<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body" style="margin:25px">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::select('permission[]', $permissions, old('permission'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
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
    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-lg btn-primary']) !!}
    {!! Form::close() !!}
@stop

