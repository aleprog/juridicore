<?php

namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\Postulant;
use App\Core\Entities\Solicitudescj\RequestPostulant;
use App\Core\Entities\Solicitudescj\Place;
use App\Core\Entities\Solicitudescj\StudentTeacher;
use App\Core\Entities\Solicitudescj\Horario;
use App\Core\Entities\Solicitudescj\Asistencia;

use Yajra\Datatables\Datatables;


use App\User;
use DB;
use Auth;

class StudentController extends Controller
{
    public function estudianteperfil()
	{
		$identificacion=Auth::user()->persona_id;
		$objPostulant=Postulant::where(['identificacion'=>$identificacion,'estado'=>'A'])->get()->toArray();
		$idv=$objPostulant[0]['id'];
		$objPostulant=$objPostulant[0];
		
		$datos['usuario']=$objPostulant['nombres'].' '.$objPostulant['apellidos'];

		$datos['data']=$objPostulant;
		$lugares=Place::all()->pluck('descripcion','id');
		//dd($lugares);
		$supervisor=User::where('abv','SUP')->pluck('name','id');
		$horario=Horario::all()->pluck('descripcion','id');
		$horario_inicio='';
		$horario_fin='';

		$lugar_id=null;
		$user_doc=null;
		$horario_id=1;
		
		
		$message='';
		$tipoM='';
		$objSt=StudentTeacher::where('user_est_id',Auth::user()->id)->get();
		$cc=0;
		$objSt1=$objSt->where('estado','A');
		
		if(count($objSt)!=0)
		{
			$message='Su seleccion de Horario está en proceso de revisiòn';
			$tipoM='warning';
			$cc=1;
			$objSt=$objSt->first();
			$user_doc=$objSt->user_doc_id;
			$horario_id=$objSt->horario_id;
			$lugar_id=$objSt->lugar_id;
			$horario_inicio=$objSt->hora_inicio;
			$horario_fin=$objSt->hora_fin;

		}
		if(count($objSt1)!=0)
		{
			$message='Su proceso de pasantias ha iniciado ';
			$tipoM='info';
			$cc=2;
		}			
		return view('modules.Solicitudescj.student.index',compact(
		'datos',
		'lugares',
		'supervisor',
		'user_doc',
		'cc',
		'lugar_id',
		'horario_id',
		'horario',
		'message',
		'tipoM',
		'horario_fin',
		'horario_inicio'));

	}
	public function getDatatablesemanas()
	{
		return DataTables::of(
            DB::connection('mysql_solicitudescj')
                ->table('asistencias AS a')
				->where(['a.user_id'=>Auth::user()->id,
						'a.estado'=>'A']
						)
                ->groupBy('a.semana')
                ->select(DB::RAW('count(a.id) as cid'
				DB::RAW('sum(a.horas) as horas'),
				'a.semana as semana')
                ->get()

        )->addColumn('Opciones', function ($select) {
			if($select->cid==5)
			{
				return '<a href="'.route('student.semanaImprime',$select->semana).'" class="btn btn-info btn-xs" target="_blank">Imprimir</a>';

			}else{
				return '';
			}

            })
           
            ->make(true);
	}
	public function semanaImprime($semana)
	{
		//dd($semana);
		$usuario=Auth::user()->persona_id;
		
		$idsupervisor=StudentTeacher::where(
		[
		'user_est_id'=>Auth::user()->id,
		'estado'=>'A',
		'tipo'=>'SUP'
		
		])->get()->first();
		$supervisor=User::find($idsupervisor->user_doc_id);
		$supervisor=$supervisor->name;
		$objPostulant=Postulant::where('identificacion',$usuario)->get()->first();
		$objAsistencia=Asistencia::
		where('user_id',Auth::user()->id)
		->where('estado','A')
		->select(
		'fecha','horas','descripcion')
		->get()->toArray();
		$pdf=\PDF::loadView('frontend/datosImprimirSemana',compact(
			'objPostulant','semana','supervisor','objAsistencia'));
		return $pdf->stream();

			/*return view('frontend/datosImprimirSemana',compact(
			'objPostulant','semana','supervisor','objAsistencia'));*/

	}
	public function getDatatableAsistencia()
	{
       return DataTables::of(
            DB::connection('mysql_solicitudescj')
                ->table('asistencias AS a')
				->where('a.user_id',Auth::user()->id)
                ->orderby('a.created_at', 'ASC')
                ->select(
				'a.id as id',
				'a.estado as estado',
				'a.fecha as fecha',

				'a.descripcion as descripcion',
				'a.semana as semana',
				'a.horas as horas')
                ->get()

        )->addColumn('Estado', function ($select) {
				switch($select->estado)
				{
					case 'A':
					return '<span class="label label-primary">Aprobada</span>';
					break;
					case 'I':
					if(!$select->horas)
					{
						return '<span class="label label-success">No hay Asistencia</span>';
							break;
					}
					
					$link='<a href="'.route('student.agregaActividad',$select->id).'" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>';
					return '<span class="label label-danger">Pendiente</span>&nbsp;'.$link;
					break;
					case 'P':
					return '<span class="label label-warning">Enviado-Pendiente de Aprobar</span>';

					break;
				}

            })
           
            ->make(true);
    }
	public function agregaActividad($id)
	{
		$obj=Asistencia::Find($id);
		$fecha=$obj->fecha;
			return view('modules.Solicitudescj.student.actividadesagrega',
			compact('id','fecha'));

	}
	public function estudianteasigna(Request $request){
		
		$objSt=new StudentTeacher();
		$objSt->user_est_id=Auth::user()->id;
		$objSt->user_doc_id=$request->supervisor;
		$objSt->horario_id=$request->horario;
		$objSt->lugar_id=$request->lugar;
		$objSt->hora_inicio=$request->horario_inicio;
		$objSt->hora_fin=$request->horario_fin;

		$objSt->tipo='SUP';
		$objSt->estado='I';
		$objSt->save();
			return redirect()->route('admin.estudianteperfil');

	}
	public function actividadSave(Request $request)
	{
		
		$obj=Asistencia::Find($request->id);
		$obj->descripcion=$request->descripcion;
		$obj->estado='P';
		$obj->save();
		$message='Grabado Exitoso';
		return redirect()->route('estudiante.actividadesEstudiante');
	}
	public function actividadesEstudiante()
	{
		$message='Aun no ha elegido Horario';
		$tipoM='warning';
		$objSt=StudentTeacher::where('user_est_id',Auth::user()->id)->get();
		$cc=0;
		$objSt1=$objSt->where('estado','A');
		if(count($objSt)!=0)
		{
			$message='Su seleccion de Horario está en proceso de revisiòn';
			$tipoM='warning';
			$cc=1;
			

		}
		if(count($objSt1)!=0)
		{
			$message='Su proceso de pasantias ha iniciado ';
			$tipoM='info';
			$cc=2;
		}
				return view('modules.Solicitudescj.student.actividades',compact('cc','message','tipoM'));

	}
	public function supervisor(Request $request)
	{
		$result = DB::connection('mysql')
            ->table('users AS C')
            ->where('C.lugarasignado_id', $request->valor)
            ->where('C.estado', 'A')
            ->groupBy('C.name', 'C.id')
            ->orderBy('C.name', 'DSC')
            ->select('C.id as id', 'C.name as descripcion')->get();

           // dd($result);

        if (count($result) > 0) {
            //$result = $result->get('descripcion', 'id');
            //$lista['data'] = $result;
            $array_response['status'] = 200;
            $array_response['message'] = $result;
        } else {
            $array_response['status'] = 404;
            $array_response['message'] = "No hay resultados";
        }


		return response()->json($array_response, 200);
	}
	
}
