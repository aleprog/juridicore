@extends('layouts.app')

@section('contentheader_title')
    JuridiCore
@endsection

@section('contentheader_description')
    Gestión de postulante
@endsection
@section('css')
    <link href="{{ url('adminlte/plugins/notifications/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('javascript')
    <script src="{{ url('js/modules/solicitudescj/postulants.js') }}"></script>
@endsection
@section('content')
      <div class="col-lg-2 text-right" style="float:right">

      	<a class="btn btn-warning" href="{{route('porstulants.index')}}" >Postulante</a>
          
      </div>
<hr/>

    

      <div class="panel panel-default">
          <div class="panel-heading">
              Datos del postulante
          </div>

          <div class="panel-body">
            
              <br>
              <div class="col-sm-4 col-md-3">
		            <dt>Identificación</dt>
		            <dd><p>{{$postulant->identificacion}}</p></dd>
		        </div>

	            <div class="col-sm-4 col-md-3">
		            <dt>Nombre</dt>
		            <dd><p>{{$postulant->nombres}}</p></dd>
		        </div>

		        <div class="col-sm-4 col-md-3">
		            <dt>Apellidos</dt>
		            <dd><p>{{$postulant->apellidos}}</p></dd>
		        </div>

		        <div class="col-sm-4 col-md-3">
		            <dt>Estatus de Solicitud</dt>
		            <dd>{!!$postulant->status_label!!}</dd>
		        </div>

		        <div class="col-sm-4 col-md-3">
		            <dt>Dirreción</dt>
		            <dd><p>{{$postulant->direccion}}</p></dd>
		        </div>

		        <div class="col-sm-4 col-md-3">
		            <dt>Celular</dt>
		            <dd><p>{{$postulant->celular}}</p></dd>
		        </div>

		        <div class="col-sm-4 col-md-3">
		            <dt>Convencional</dt>
		            <dd><p>{{$postulant->convencional}}</p></dd>
		        </div>

		        <div class="col-sm-4 col-md-3">
		            <dt>Semestre</dt>
		            <dd><p>{{$postulant->semestre}}</p></dd>
		        </div>

		        <div class="col-sm-4 col-md-3">
		            <dt>Fecha de Registro</dt>
		            <dd><p>{{$postulant->created_at_es}}</p></dd>
		        </div>

		        

		        <div class="col-sm-4 col-md-3">
		            <dt>Correo Eléctronico</dt>
		            <dd><p>{{$postulant->correo_institucional}}</p></dd>
		        </div>

		        @if($postulant->status_request!='PENDIENTE')
		          
		          <div class="col-md-12" style="background-color: #ccc; margin-top: 20px;">
		        	<h4 style="padding-left: 10px;" >Documentación</h4>
		          </div>

		          <div class="col-md-12" style="margin-top: 15px;">          

		          </div>

		          
		          <div class="col-sm-4 col-md-3">
		            <dt class="text-center">CEDULA <br>

		            	@if($postulant->cedula_archivo)
		            		<span onclick="$('#carga_image').attr('src',''); $('#carga_pdf').attr('src','{{url("storage/cedula".$postulant->id.".pdf")}}')" class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span>
		            	@else
		            		<span class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span> 
		            	@endif 

		            </dt>
		            <dd class="text-center"><p><input type="checkbox" disabled="disabled" {{$postulant->cedula_archivo ? 'checked' : ''}}></p></dd>
		          </div>

		          <div class="col-sm-4 col-md-3">
		            <dt class="text-center">PAPELETA <br>

		            	@if($postulant->papeleta_archivo)
		            		<span onclick="$('#carga_image').attr('src',''); $('#carga_pdf').attr('src','{{url("storage/papeleta".$postulant->id.".pdf")}}')" class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span>
		            	@else
		            		<span class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span> 
		            	@endif 

		            </dt>
		            <dd class="text-center"><p><input type="checkbox" disabled="disabled" {{$postulant->papeleta_archivo ? 'checked' : ''}}></p></dd>
		          </div>

		          <div class="col-sm-4 col-md-3">
		            <dt class="text-center">FOTO <br>

		            	@if($postulant->foto_archivo)
		            		<span onclick="$('#carga_pdf').attr('src',''); $('#carga_image').attr('src','{{url("storage/foto".$postulant->id.".pdf")}}')" class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span>
		            	@else
		            		<span class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span> 
		            	@endif  

		            </dt>
		            <dd class="text-center"><p><input type="checkbox" disabled="disabled" {{$postulant->foto_archivo ? 'checked' : ''}}></p></dd>
		          </div>

		          <div class="col-sm-4 col-md-3">
		            <dt class="text-center">CURRICULUM <br>

		            	@if($postulant->curriculum_archivo)
		            		<span onclick="$('#carga_image').attr('src',''); $('#carga_pdf').attr('src','{{url("storage/curriculum".$postulant->id.".pdf")}}')" class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span>
		            	@else
		            		<span class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span> 
		            	@endif  

		            </dt>
		            <dd class="text-center"><p><input type="checkbox" disabled="disabled" {{$postulant->curriculum_archivo ? 'checked' : ''}}></p></dd>
		          </div>

		          <div class="col-sm-4 col-md-3">
		            <dt class="text-center">SOLICITUD <br>

		            	@if($postulant->solicitud_sellada)
		            		<span onclick="$('#carga_image').attr('src',''); $('#carga_pdf').attr('src','{{url("storage/solicitud_sellada".$postulant->id.".pdf")}}')" class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span>
		            	@else
		            		<span class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span> 
		            	@endif  

		            </dt>
		            <dd class="text-center"><p><input type="checkbox" disabled="disabled" {{$postulant->solicitud_sellada ? 'checked' : ''}}></p></dd>
		          </div>

		          <div class="col-sm-4 col-md-3">
		            <dt class="text-center">CERTIFICADO MATRICULA. <br>

		            	@if($postulant->certificado_matricula)
		            		<span onclick="$('#carga_image').attr('src','');; $('#carga_pdf').attr('src','{{url("storage/certificado_matricula".$postulant->id.".pdf")}}')" class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span>
		            	@else
		            		<span class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span> 
		            	@endif  

		            </dt>
		            <dd class="text-center"><p><input type="checkbox" disabled="disabled" {{$postulant->certificado_matricula ? 'checked' : ''}}></p></dd>
		          </div>

		          <div class="col-sm-4 col-md-3">
		            <dt class="text-center">CERTIFICADO NO ARRASTRE. <br>

		            	@if($postulant->certificado_no_arrastre)
		            		<span onclick="$('#carga_image').attr('src',''); $('#carga_pdf').attr('src','{{url("storage/certificado_arrastre".$postulant->id.".pdf")}}')" class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span>
		            	@else
		            		<span class="fa fa-file-pdf" style="color: #5fa9d4;font-size:50px;"></span> 
		            	@endif    

		            </dt>
		            <dd class="text-center"><p><input type="checkbox" disabled="disabled" {{$postulant->certificado_no_arrastre ? 'checked' : ''}}></p></dd>
		          </div>

		          
		          <div class="col-md-12 text-center" style="margin-top: 20px;">
		          	<embed id="carga_pdf" style="width: 100%;" src="" height="800"></embed>
		          	<img id="carga_image" style="width: 400px;" src="" height="auto"></img>
		          </div>

		        @endif

		        <div class="clearfix"></div>


		        <div class="col-md-12">
		            <hr>

		            {!! Form::open(['method' => 'POST', 'route' => ['porstulants.statusRequest'],'id'=>'FrmStatus']) !!}

			            <input type="hidden" name="id" value="{{$postulant->id}}" >

			            @if($postulant->status_request=='PENDIENTE')
				            <p class="text-right">
				        		<button id="btnGuardar" class="btn btn-primary" type="submit">Autorizar</button>
				        	</p>
				        	<input type="hidden" name="status" value="6" >

				        @elseif($postulant->status_request=='AUTORIZADO')

				        	@if($postulant->cedula_archivo && $postulant->papeleta_archivo && $postulant->foto_archivo && $postulant->curriculum_archivo && $postulant->solicitud_sellada && $postulant->certificado_matricula && $postulant->certificado_no_arrastre && $postulant->solicitud_sellada)
					          	<p class="text-right">
					        		<button id="btnGuardar" class="btn btn-primary"  type="submit">Aprobar</button>
					        	</p>
					        	<input type="hidden" name="status" value="2" >
					        @endif
				        @endif

				    {!! Form::close() !!}
		        </div>

		      
          </div>
      </div>

@endsection
