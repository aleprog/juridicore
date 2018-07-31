@extends('layouts.auth')

@section('content')

<style>
body{
background-image: url(/img/hero-background.png);
		background-size: 100%;
		background-position: center;
		background-color: #0009;
		position: absolute;
		top: 0;
		width: 100%;
		height: 100vh;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center;
		background-size: cover;
		overflow: hidden;
}
</style>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel" style="background-color: #fff6">
                <div class="panel">
                <center><h3>JURIDICORE</h3></center>
                           <!-- <img  src="{{ url('img/logo.png') }} " class="img-responsive" style="padding:10px 0px 10px 50px"/>-->

				</div>
                <div class="panel-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong></strong> Existe un problema con el dato de ingresado:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cedula</label>

                            <div class="col-md-6">
                                <input type="text"
                                       class="form-control"
                                       name="persona_id" maxlength="13"
                                       value="{{ old('persona_id') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password">
                            </div>
                        </div>

                        


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label>
                                    <input type="checkbox"
                                           name="remember"> Recordar Contraseña
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"
                                        class="btn btn-primary"
                                        style="margin-right: 15px;">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection