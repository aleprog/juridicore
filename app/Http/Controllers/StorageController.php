<?php

namespace App\Http\Controllers;

use App\Core\Entities\Solicitudescj\Postulant;
use App\Core\Entities\Solicitudescj\RequestPostulant;
use Illuminate\Http\Request;

class StorageController extends Controller
{
   public function index()
   {
      return \View::make('frontend.datos');
	  
   }
   public function save(Request $request)
	{		
	$id=$request->idusuario;
	
	$objPostulant=Postulant::where('id',$id)->where('estado','A')->update([

	  "carrera" => $request->carrera,
      "modalidad" => $request->modalidad,
      "semestre" => $request->nivel,
      "paralelo" => $request->paralelo,
      "horario" => $request->horario,
      "identificacion" => $request->identificacion,
      "nombres" => $request->nombres,
      "apellidos" => $request->apellidos,
      "provincia_id" => $request->provincia,
      "ciudad_id" => $request->ciu,
      "direccion" => $request->direccion,
      "estado_civil" => $request->estado_civil,
      "edad" => $request->edad,
      "fecha_nacimiento" => $request->fecha_nacimiento,
      "correo" => $request->correo,
      "convencional" =>$request->convencional,
      "celular" => $request->celular,
      "labora" => $request->labora,
      "ocupacion" => $request->ocupacion,
      "horario_t" => $request->horario_t,
      "direccion_t" => $request->direccion_t,
      "telefono_t" => $request->telefono_t,
	  "discapacidad" =>$request->discapacidad,
	  "correo_institucional" =>$request->correo_institucional,

      "carnet" => $request->carnet,
	    "area" => $request->area
	  ]);
      		
		
		 //----------------------------------------Cedula
if($request->file('cedula')){
		$cedula = $request->file('cedula');
			\Storage::delete('cedula'.$id.'.pdf');
 		   \Storage::disk('local')->put('cedula'.$id.'.pdf',  \File::get($cedula));
		$objPostulant=Postulant::where('id',$id)->where('estado','A')->where('cedula_archivo',0)->update(['cedula_archivo'=>1]);
}
if($request->file('papeleta')){
$papeleta = $request->file('papeleta');
		   	\Storage::delete('papeleta'.$id.'.pdf');

		   \Storage::disk('local')->put('papeleta'.$id.'.pdf',  \File::get($papeleta));
		$objPostulant=Postulant::where('id',$id)->where('estado','A')->where('papeleta_archivo',0)->update(['papeleta_archivo'=>1]);
}
if($request->file('foto')){
 $foto = $request->file('foto');
			\Storage::delete('foto'.$id.'.pdf');
		 
			\Storage::disk('local')->put('foto'.$id.'.pdf',  \File::get($foto));
		$objPostulant=Postulant::where('id',$id)->where('estado','A')->where('foto_archivo',0)->update(['foto_archivo'=>1]);
}
if($request->file('curriculum')){
 $curriculum = $request->file('curriculum');
		   	\Storage::delete('curriculum'.$id.'.pdf');

		   \Storage::disk('local')->put('curriculum'.$id.'.pdf',  \File::get($curriculum));
		$objPostulant=Postulant::where('id',$id)->where('estado','A')->where('curriculum_archivo',0)->update(['curriculum_archivo'=>1]);
}
if($request->file('certificado_matricula')){
  $certificado_matricula = $request->file('certificado_matricula');
						\Storage::delete('certificado_matricula'.$id.'.pdf');

			\Storage::disk('local')->put('certificado_matricula'.$id.'.pdf',  \File::get($certificado_matricula));
		$objPostulant=Postulant::where('id',$id)->where('estado','A')->where('certificado_matricula',0)->update(['certificado_matricula'=>1]);
}
if($request->file('certificado_arrastre')){
$certificado_arrastre = $request->file('certificado_arrastre');
						\Storage::delete('certificado_arrastre'.$id.'.pdf');

			\Storage::disk('local')->put('certificado_arrastre'.$id.'.pdf',  \File::get($certificado_arrastre));
		$objPostulant=Postulant::where('id',$id)->where('estado','A')->where('certificado_no_arrastre',0)->update(['certificado_no_arrastre'=>1]);
}
if($request->file('solicitud_sellada')){
$solicitud_sellada = $request->file('solicitud_sellada');
	 	   			\Storage::delete('solicitud_sellada'.$id.'.pdf');

		   \Storage::disk('local')->put('solicitud_sellada'.$id.'.pdf',  \File::get($solicitud_sellada));
		$objPostulant=Postulant::where('id',$id)->where('estado','A')->where('solicitud_sellada',0)->update(['solicitud_sellada'=>1]);
}

		$objPostulant=Postulant::where('id',$id)->where('estado','A')->where(
		['cedula_archivo'=>1,
		'papeleta_archivo'=>1,
		'foto_archivo'=>1,
		'curriculum_archivo'=>1,
		'certificado_matricula'=>1,
		'certificado_no_arrastre'=>1,
		'solicitud_sellada'=>1,
		])->get()->count();
		/*	$datos['data']=[
					 "carrera" => $request->carrera,
					  "modalidad" => $request->modalidad,
					  "semestre" => $request->nivel,
					  "paralelo" => $request->paralelo,
					  "horario" => $request->horario,
					  "identificacion" => $request->identificacion,
					  "nombres" => $request->nombres,
					  "apellidos" => $request->apellidos,
					  "provincia_text" => $request->provincia,
					  "ciudad_text" => $request->ciudad,
					  "direccion" => $request->direccion,
					  "estado_civil" => $request->estado_civil,
					  "edad" => $request->edad,
					  "fecha_nacimiento" => $request->fecha_nacimiento,
					  "correo" => $request->correo,
					  "convencional" =>$request->convencional,
					  "celular" => $request->celular,
					  "labora" => $request->labora,
					  "ocupacion" => $request->ocupacion,
					  "horario_t" => $request->horario_t,
					  "direccion_t" => $request->direccion_t,
					  "telefono_t" => $request->telefono_t,
					  "discapacidad" =>$request->discapacidad,
					  "carnet" => $request->carnet,
					  "area" => $request->area,
					  "correo_institucional" => $request->correo_institucional
								];*/
		if($objPostulant>0)
			{
				if($request->btnvg!=3)
				{
					$objRequestPostulant=RequestPostulant::where(['postulant_id'=>$id,'estado'=>'A'])->update(['state_id'=>1]);
				}
				
				
				
			}
		$message="Archivos Guardados Correctamente";
		$datos['message']=$message;
		$datos['printarchivo']="1";

		return redirect()->route('frontend.home')->with($datos);	
	}
}
