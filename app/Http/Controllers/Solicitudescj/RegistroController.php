<?php

namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\Postulant;
use App\Core\Entities\Solicitudescj\RequestPostulant;
use App\Http\Controllers\Ajax\SelectController;

class RegistroController extends Controller
{
    public function registroP(Request $request){

			$identificacion=$request->identificacion;
			$nombres=$request->nombres;
			$apellidos=$request->apellidos;
			$semestre=$request->semestre;
			$direccion=$request->direccion;
			$convencional=$request->convencional;
			$celular=$request->celular;
			$carrera=$request->carrera;
			$correo_institucional=$request->correo_institucional;
				$this->validate($request,[
				'identificacion'=>'required|unique:mysql_solicitudescj.postulants',	
				
					],['identiticacion.uniqued'=>'Ya posee una solicitud en procesos',
				]);
		  $objPostulant=new Postulant();
		  $objPostulant->identificacion=$identificacion;
		  $objPostulant->nombres=$nombres;
		  $objPostulant->apellidos=$apellidos;
		  $objPostulant->semestre=$semestre;
		  $objPostulant->direccion=$direccion;
		  $objPostulant->celular=$celular;
		  $objPostulant->carrera=$carrera;
		  $objPostulant->correo_institucional=$correo_institucional;

		  $objPostulant->convencional=$convencional;
		  $objPostulant->save();
		   
		  $objRequest=new RequestPostulant();
		  $objRequest->postulant_id=$objPostulant->id;
		  $objRequest->save();
		  
		  $message="Grabado Exitoso, porfavor imprima la solicitud";
		  $objPostulant=Postulant::where(['identificacion'=>$identificacion,'estado'=>'A'])->get()->toArray();
		  $idv=$objPostulant[0]['id'];

		  $objPostulant=$objPostulant[0];
		  
		  $datos['data']=$objPostulant;
		  $datos['message']=$message;
		  $datos['id']=$idv;
		  $identificacion=$objPostulant['identificacion'];
		  $nombres=$objPostulant['nombres'];
		  $apellidos=$objPostulant['apellidos'];
		  $nivel=$objPostulant['semestre'];
		  $carrera=$objPostulant['carrera'];
		  $correo_institucional=$objPostulant['correo_institucional'];
		  $convencional=$objPostulant['convencional'];
		  $celular=$objPostulant['celular'];
			$datos['message']=$message;
			$datos['pp']="1";
			return view('frontend.datosimprimir',compact(
				'identificacion',
				'nombres',
				'apellidos',
				'nivel',
				'carrera',
				'correo_institucional',
				'convencional',
				'celular'));
				//return $pdf->stream();

	//	return redirect()->route('frontend.imprimir')->with($datos);
	}
	public function registroPP(Request $request)
    {
		
        $identificacion=$request->identificacion;
			$objPostulant=Postulant::where(['identificacion'=>$identificacion,'estado'=>'A'])->get()->toArray();
			
			if($objPostulant!=[])
			{
				$idv=$objPostulant[0]['id'];
				$objRequest=RequestPostulant::with('state')->where(['postulant_id'=>$idv,'estado'=>'A'])->get();
				$estadodescripcion=$objRequest->first()->state->descripcion;
				$estadoabv=$objRequest->first()->state->abv;
				$objPostulant=$objPostulant[0];
				switch($estadoabv)
				{
					case 'AUI':
					$message="Solicitud se encuentra en estado,".$estadodescripcion;
					$datos['data']=$objPostulant;
					$datos['message']=$message;
					$datos['id']=$idv;
					$datos['usuario']=$objPostulant['nombres'].' '.$objPostulant['apellidos'];
					return redirect()->route('frontend.datos')->with($datos);
					break;
					case 'AP':
					

					break;
					case 'AU':
					

					break;
					case 'NE':

					break;
					case 'AB':

					break;
					case 'PE':

					break;
				}
				$message="Solicitud se encuentra en estado,".$estadodescripcion;
				$datos['message']=$message;
				 
			}else{
				$message="No tiene Solicitud Ingresada";
				$datos['message']=$message;
			}			
			return redirect()->route('frontend.home')->with($datos);

    }
}
