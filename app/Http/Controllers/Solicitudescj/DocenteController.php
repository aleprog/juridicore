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
use App\Core\Entities\Solicitudescj\evaluacionSup;

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
        $vfa=0;
        $vfr=0;
        $vf=array_sum($request->opcion);
        if($vf<7)
        {
            $vfr=$vf;
        }else{
            $vfa=$vf; 
        }
        

        $objEv=new evaluaciontutor();
        $objEv->user_id=$request->estudianteo;
        $objEv->docente_id=Auth::user()->id;
        $objEv->visita=$obc;

        $objEv->e1=$request->opcion[0];
        $objEv->e2=$request->opcion[1];
        $objEv->e3=$request->opcion[2];
        $objEv->e4=$request->opcion[3];
        $objEv->e5=$request->opcion[4];
        $objEv->ec1=$request->opcion[5];
        $objEv->ec2=$request->opcion[6];
        $objEv->ec3=$request->opcion[7];
        $objEv->ec4=$request->opcion[8];
        $objEv->ec5=$request->opcion[9];
        $objEv->vfa=$vfa;
        $objEv->vfr=$vfr;
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
    public function imprimirEvaluacionSup($id)
    {
        $obj=evaluacionSup::Find($id);
        $teachers = StudentsSteachers::with(['docente','horario','lugar'])
        ->where('user_est_id',$obj->user_id)
        ->where('tipo','SUP')->first();
        
        $objU=User::Find($obj->user_id);
       
        $objPostulant=Postulant::where('identificacion',$objU->persona_id)->get()->first();
        $pdf=\PDF::loadView('modules.Solicitudescj.docente.evaluaciondoc',compact(
            'objPostulant','teachers','obj'));
        return $pdf->stream();

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
    public function datatableEvaluacionesSup()
	{
       return DataTables::of(
            DB::connection('mysql_solicitudescj')
                ->table('evaluacionsupervisor AS a')
                ->where('a.docente_id',Auth::user()->id)
                ->join('juridicorebase_ant.users as u','u.id','a.user_id')
                ->join('postulants as p','p.identificacion','u.persona_id')
                ->orderby('a.created_at', 'ASC')
                ->select(
                    'a.id as id',
                'a.total as total',
                DB::RAW('CONCAT(p.apellidos," ",p.nombres) as estudiante'),
				'a.created_at as fecha_registro'
               )
                ->get()

        )->addColumn('Opciones', function ($select) {
		        return '<a href="'.route('supervisor.imprimirEvaluacionSup',$select->id).'" target="_blank" class="btn btn-primary btn-sm">Imprimir</a>';
            })
           
          
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
		        return '<a href="'.route('tutor.imprimirEvaluacion',$select->id).'" target="_blank" class="btn btn-primary btn-sm">Imprimir</a>';
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
    public function evaluacionDesempeño()
    {
       

        $objD=DB::connection('mysql_solicitudescj')
        ->table('students_teachers as et')
        ->where('et.user_doc_id',Auth::user()->id)
        ->join('juridicorebase_ant.users as u','u.id','et.user_est_id')
        ->join('postulants as p','p.identificacion','u.persona_id')
        ->where('et.estado','A')
   
        ->select('u.id as id', DB::RAW('CONCAT(p.apellidos," ",p.nombres) as apellidos'))
        ->pluck('apellidos','id');

        
        return view('modules.Solicitudescj.docente.supervisorindex',compact('objD'));
    }
    public function evaluacionSupSave(request $request)
    {
        $countEs=evaluacionSup::where('user_id',$request->estudianteo)->get()->count();
        if($countEs<1)
        {
            $e1=$request->e1;
            $e2= $request->e2;
            $e3= $request->e3;
            $e4= $request->e4;
            $e5= $request->e5;
            $e6= $request->e6;
            $e7= $request->e7;
            $e8= $request->e8;
            $e9= $request->e9;
            $e10= $request->e10;
            $e11= $request->e11;
            //dd($e1);
          
             $i=0;
             $c1=0;
             $c2=0;
             $c3=0;
             $c4=0;
             $c5=0;
             switch($e1)
             {
                 case "1":
                 $c1=$c1+1;
     
                 break;
                 case "2":
                 $c2=$c2+1;
     
                 break;
                 case "3":
                 $c3=$c3+1;
     
                 break;
                 case "4":
                 $c4=$c4+1;
     
                 break;
                 case "5":
                 $c5=$c5+1;
                 break;
     
             }
             switch($e2)
             {
                 case "1":
                 $c1=$c1+1;
     
                 break;
                 case "2":
                 $c2=$c2+1;
     
                 break;
                 case "3":
                 $c3=$c3+1;
     
                 break;
                 case "4":
                 $c4=$c4+1;
     
                 break;
                 case "5":
                 $c5=$c5+1;
                 break;
     
             }
             
                 switch($e3)
                 {
                     case "1":
                     $c1=$c1+1;
     
                     break;
                     case "2":
                     $c2=$c2+1;
     
                     break;
                     case "3":
                     $c3=$c3+1;
     
                     break;
                     case "4":
                     $c4=$c4+1;
     
                     break;
                     case "5":
                     $c5=$c5+1;
                     break;
     
                 }
                 
                 switch($e4)
                 {
                     case "1":
                     $c1=$c1+1;
     
                     break;
                     case "2":
                     $c2=$c2+1;
     
                     break;
                     case "3":
                     $c3=$c3+1;
     
                     break;
                     case "4":
                     $c4=$c4+1;
     
                     break;
                     case "5":
                     $c5=$c5+1;
                     break;
     
                 }
                 switch($e5)
                 {
                     case "1":
                     $c1=$c1+1;
     
                     break;
                     case "2":
                     $c2=$c2+1;
     
                     break;
                     case "3":
                     $c3=$c3+1;
     
                     break;
                     case "4":
                     $c4=$c4+1;
     
                     break;
                     case "5":
                     $c5=$c5+1;
                     break;
     
                 }
                 switch($e6)
                 {
                     case "1":
                     $c1=$c1+1;
     
                     break;
                     case "2":
                     $c2=$c2+1;
     
                     break;
                     case "3":
                     $c3=$c3+1;
     
                     break;
                     case "4":
                     $c4=$c4+1;
     
                     break;
                     case "5":
                     $c5=$c5+1;
                     break;
     
                 }
                 switch($e7)
                 {
                     case "1":
                     $c1=$c1+1;
     
                     break;
                     case "2":
                     $c2=$c2+1;
     
                     break;
                     case "3":
                     $c3=$c3+1;
     
                     break;
                     case "4":
                     $c4=$c4+1;
     
                     break;
                     case "5":
                     $c5=$c5+1;
                     break;
     
                 }
                 switch($e8)
                 {
                     case "1":
                     $c1=$c1+1;
     
                     break;
                     case "2":
                     $c2=$c2+1;
     
                     break;
                     case "3":
                     $c3=$c3+1;
     
                     break;
                     case "4":
                     $c4=$c4+1;
     
                     break;
                     case "5":
                     $c5=$c5+1;
                     break;
     
                 }
                 switch($e9)
                 {
                     case "1":
                     $c1=$c1+1;
     
                     break;
                     case "2":
                     $c2=$c2+1;
     
                     break;
                     case "3":
                     $c3=$c3+1;
     
                     break;
                     case "4":
                     $c4=$c4+1;
     
                     break;
                     case "5":
                     $c5=$c5+1;
                     break;
     
                 }
                 switch($e10)
                 {
                     case "1":
                     $c1=$c1+1;
     
                     break;
                     case "2":
                     $c2=$c2+1;
     
                     break;
                     case "3":
                     $c3=$c3+1;
     
                     break;
                     case "4":
                     $c4=$c4+1;
     
                     break;
                     case "5":
                     $c5=$c5+1;
                     break;
     
                 }
                 switch($e11)
                 {
                     case "1":
                     $c1=$c1+1;
     
                     break;
                     case "2":
                     $c2=$c2+1;
     
                     break;
                     case "3":
                     $c3=$c3+1;
     
                     break;
                     case "4":
                     $c4=$c4+1;
     
                     break;
                     case "5":
                     $c5=$c5+1;
                     break;
     
                 }
                
             $obj=new evaluacionSup();
             $obj->user_id=$request->estudianteo;
             $obj->docente_id=Auth::user()->id;
             $obj->e1=$request->e1;
             $obj->e2=$request->e2;
             $obj->e3=$request->e3;
             $obj->e4=$request->e4;
             $obj->e5=$request->e5;
             $obj->e6=$request->e6;
             $obj->e7=$request->e7;
             $obj->e8=$request->e8;
             $obj->e9=$request->e9;
             $obj->e10=$request->e10;
             $obj->e11=$request->e11;
             $obj->ob1=$request->ob1;
             $obj->ob2=$request->ob2;
             $obj->ob3=$request->ob3;
     
             $obj->fr1=$c1;
             $obj->fr2=$c2;
             $obj->fr3=$c3;
             $obj->fr4=$c4;
             $obj->fr5=$c5;
     
             $obj->sum1=$c1*1;
             $obj->sum2=$c2*2;
             $obj->sum3=$c3*3;
             $obj->sum4=$c4*4;
             $obj->sum5=$c5*5;
              
             $obj->total=($c5*5)+($c4*4)+($c3*3)+($c2*2)+($c1*1);
            
             $obj->save();
    
             $m='Grabado Correctamente';
        }
        $objD=DB::connection('mysql_solicitudescj')
        ->table('students_teachers as et')
        ->where('et.user_doc_id',Auth::user()->id)
        ->join('juridicorebase_ant.users as u','u.id','et.user_est_id')
        ->join('postulants as p','p.identificacion','u.persona_id')
        ->where('et.estado','A')
   
        ->select('u.id as id', DB::RAW('CONCAT(p.apellidos," ",p.nombres) as apellidos'))
        ->pluck('apellidos','id');

        $m="El estudiante ya tiene un registro";
      
        return view('modules.Solicitudescj.docente.supervisorindex',compact('objD','m'));
    }
    

}
