@extends('layouts.app')
@section('contentheader_title')
    Juridiore
@endsection

@section('contentheader_description')
    Creación de Usuarios
@endsection
@section('content')
    <hr/>
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}
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
                            {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
                            {!! Form::select('roles[]', $roles, old('roles'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('roles'))
                                <p class="help-block">
                                    {{ $errors->first('roles') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 form-group">
                        {!! Form::label('persona_id', 'cedula*', ['class' => 'control-label']) !!}
                        {!! Form::text('persona_id', null, ['class' => 'form-control', 'placeholder' => 'cedula', 'required' => '','maxlength'=>'13']) !!}

                    </div>
                
                    <input type="hidden" name="estado" value="A"/>
                </div>
            </div>
        </div>
        {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-lg btn-primary']) !!}
        {!! Form::close() !!}
        @stop


