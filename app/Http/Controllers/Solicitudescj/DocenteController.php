<?php

namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;
use App\Core\Entities\Solicitudescj\StudentTeacher;
use App\Core\Entities\Solicitudescj\semanaObservaciones;
use App\Core\Entities\Solicitudescj\evaluaciontutor;
use App\Core\Entities\Solicitudescj\StudentsSteachers;
use App\User;
use App\Core\Entities\Solicitudescj\Postulant;

use App\Core\Entities\Solicitudescj\Asistencia;
use Datetime;

class DocenteController extends Controller
{
    public function evaluacionSupervision()
    {
        $objD=DB::connection('mysql_solicitudescj')
        ->table('students_teachers as et')
        ->where('et.user_doc_id',Auth::user()->id)
        ->join('juridicorebase_ant.users as u','u.id','et.user_est_id')
        ->join('postulants as p','p.identificacion','u.persona_id')
        ->where('et.estado','A')
   
        ->select('u.id as id', DB::RAW('CONCAT(p.apellidos," ",p.nombres) as apellidos'))
        ->pluck('apellidos','id');
        return view('modules.Solicitudescj.docente.tutorindex',compact('objD'));
    }
    public function index(){

        $objD=DB::connection('mysql_solicitudescj')
        ->table('students_teachers as et')
        ->where('et.user_doc_id',Auth::user()->id)
        ->join('juridicorebase_ant.users as u','u.id','et.user_est_id')
        ->join('postulants as p','p.identificacion','u.persona_id')
        ->where('et.estado','A')
   
        ->select('u.id as id', DB::RAW('CONCAT(p.apellidos," ",p.nombres) as apellidos'))
        ->pluck('apellidos','id');
        return view('modules.Solicitudescj.docente.docenteindex',compact('objD'));
    }
    public function StateActividad($id)
    {
        $objA=Asistencia::Find($id);
        $objA->estado='A';
        $objA->save();

        return redirect()->route('supervisor.asistencia');

    }
    public function semanaEstudiaante(Request $request)
	{
        $semanasNo=DB::connection('mysql_solicitudescj')->table('semanaObservaciones')
        ->where(['user_id'=>$request->valor])
        ->select('semana')
        ->get()->toArray();
       
        
		$result = DB::connection('mysql_solicitudescj')
            ->table('asistencias')
            ->where('user_id', $request->valor)
            ->where('estado', 'A')
            ->whereNotIn('semana',$semanasNo)
            ->where('docente_id',Auth::user()->id)
            ->groupBy('semana')
            ->orderBy('semana', 'DSC')
            ->select('semana as id', 'semana as descripcion')->get();
           

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
    public function evaluacionSave(request $request)
    {
        $obc=evaluaciontutor::where('docente_id',Auth::user()->id)
        ->where('user_id',$request->estudianteo)->get()->count();
        $obc=$obc+1;
        $objEv=new evaluaciontutor();
        $objEv->user_id=$request->estudianteo;
        $objEv->docente_id=Auth::user()->id;
        $objEv->visita=$obc;
        $objEv->save();

        $objD=DB::connection('mysql_solicitudescj')
        ->table('students_teachers as et')
        ->where('et.user_doc_id',Auth::user()->id)
        ->join('juridicorebase_ant.users as u','u.id','et.user_est_id')
        ->join('postulants as p','p.identificacion','u.persona_id')
        ->where('et.estado','A')
   
        ->select('u.id as id', DB::RAW('CONCAT(p.apellidos," ",p.nombres) as apellidos'))
        ->pluck('apellidos','id');

        $m='Grabado Correctamente';
        return view('modules.Solicitudescj.docente.tutorindex',compact('objD','m'));

    }
    public function observacionSave(request $request)
    {
        $objSo=new semanaObservaciones();

        $objSo->user_id=$request->estudianteo;
        $objSo->semana=$request->se;
        $objSo->observacion=$request->observacion;
        $objSo->docente_id=Auth::user()->id;
        $objSo->save();

        return redirect()->route('supervisor.asistencia');

    }
    public function imprimirEvaluacion($id)
    {
        $obj=evaluaciontutor::Find($id);
        $teachers = StudentsSteachers::with(['docente','horario','lugar'])
        ->where('user_est_id',$obj->user_id)
        ->where('tipo','SUP')->first();
        
        $objU=User::Find($obj->user_id);
       
        $objPostulant=Postulant::where('identificacion',$objU->persona_id)->get()->first();
        $pdf=\PDF::loadView('modules.Solicitudescj.docente.evaluacion',compact(
            'objPostulant','teachers','obj'));
        return $pdf->stream();

    }

    public function asistenciaSave(request $request)   
    {
        $objAsistencia=Asistencia::where(['user_id'=>$request->estudiante,
        'fecha'=>$request->fecha_registro])->count();
        $objD=DB::connection('mysql_solicitudescj')
        ->table('students_teachers as et')
        ->where('et.user_doc_id',Auth::user()->id)
        ->join('juridicorebase_ant.users as u','u.id','et.user_est_id')
        ->join('postulants as p','p.identificacion','u.persona_id')
        ->where('et.estado','A')
   
        ->select('u.id as id', DB::RAW('CONCAT(p.apellidos," ",p.nombres) as apellidos'))
        ->pluck('apellidos','id');

        $semana='Semana '.$request->semana;
        $objAsistencia2=Asistencia::where(['user_id'=>$request->estudiante,
        'semana'=>$semana])->count();

        if($objAsistencia<1 && $objAsistencia2<5)
        {
            $docent_id=Auth::user()->id;
            $objAsistencia=new Asistencia();
            $objAsistencia->user_id=$request->estudiante;
            $objAsistencia->docente_id=$docent_id;
            $objAsistencia->fecha=$request->fecha_registro;
            $objAsistencia->hora_inicio=$request->hora_inicio;
            $objAsistencia->hora_fin=$request->hf;
            if($request->cant_horas==0)
            {
                $objAsistencia->estado='A';
    
            }
            $objAsistencia->horas=$request->cant_horas;
            $objAsistencia->semana='Semana '.$request->semana;
           
            $objAsistencia->save();
          
                $m="Registro Grabado Exitosamente";
                return view('modules.Solicitudescj.docente.docenteindex')->with(['m'=>$m,'objD'=>$objD]);
    
        }else
        {
            if($objAsistencia2>4)
            {
                $m="Ya tiene la asistencia completa de la semana";
                return view('modules.Solicitudescj.docente.docenteindex')->with(['m'=>$m,'objD'=>$objD]);
    
            }
            $m="Ya existe este registro";
            return view('modules.Solicitudescj.docente.docenteindex')->with(['m'=>$m,'objD'=>$objD]);
        }
       
            
         

    }
    
    public function getDatatableObservaciones()
	{
       return DataTables::of(
            DB::connection('mysql_solicitudescj')
                ->table('semanaobservaciones AS a')
                ->where('a.docente_id',Auth::user()->id)
                ->join('juridicorebase_ant.users as u','u.id','a.user_id')
                ->join('postulants as p','p.identificacion','u.persona_id')
                ->orderby('a.created_at', 'ASC')
                ->select(
               'a.observacion as observacion',
				
                DB::RAW('CONCAT(p.apellidos," ",p.nombres) as estudiante'),
				'a.created_at as fecha_registro',
                'a.semana as semana'
               )
                ->get()

        )
          
            ->make(true);
    }
    public function datatableEvaluacionesTutor()
	{
       return DataTables::of(
            DB::connection('mysql_solicitudescj')
                ->table('evaluaciontutor AS a')
                ->where('a.docente_id',Auth::user()->id)
                ->join('juridicorebase_ant.users as u','u.id','a.user_id')
                ->join('postulants as p','p.identificacion','u.persona_id')
                ->orderby('a.created_at', 'ASC')
                ->select(
                    'a.id as id',
                'a.visita as visita',
                DB::RAW('CONCAT(p.apellidos," ",p.nombres) as estudiante'),
				'a.created_at as fecha_registro'
               )
                ->get()

        )->addColumn('Opciones', function ($select) {
		        return '<a href="'.route('tutor.imprimirEvaluacion',$select->id).'" class="btn btn-primary btn-sm">Imprimir</a>';
            })
           
          
            ->make(true);
    }
    

    public function datatableAsistencia()
	{
       return DataTables::of(
            DB::connection('mysql_solicitudescj')
                ->table('asistencias AS a')
                ->where('a.docente_id',Auth::user()->id)
                ->join('juridicorebase_ant.users as u','u.id','a.user_id')
                ->join('postulants as p','p.identificacion','u.persona_id')
                ->orderby('a.created_at', 'ASC')
                ->select(
                    'a.descripcion as descripcion',
				'a.id as id',
                'a.estado as estado',
                DB::RAW('CONCAT(p.apellidos," ",p.nombres) as estudiante'),
				'a.fecha as fecha',
                'a.semana as semana',
                'a.hora_inicio as hora_inicio',
                'a.hora_fin as hora_fin',
				'a.horas as horas')
                ->get()

        )->addColumn('Estado', function ($select) {
				switch($select->estado)
				{
                    case 'A':
                    if(!$select->horas)
					{
						return '<span class="label label-success" >No hay Asistencia</span>';
						break;
					}
					return '<span class="label label-primary">Actividad Aprobada</span>';
					break;
					case 'I':
					
					
					return '<span class="label label-info">Asistencia</span>&nbsp;';
					break;
                    
                    case 'P':
                   // 
                    return '
                    <a href="'.route('docente.stateactividad',$select->id).'" id="envio'.$select->id.'"></a>

                    <a onclick="confirma(\''.$select->descripcion.'\','.$select->id.')" class="label label-warning">
                    <i class="fa fa-check"></i>&nbsp; Pendiente de Aprobar Actividad
                    </a>';

                   

					break;
				}

            })
           
            ->make(true);
    }

}
