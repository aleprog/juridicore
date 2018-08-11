<?php

namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;
use App\Core\Entities\Solicitudescj\StudentTeacher;
use App\Core\Entities\Solicitudescj\Asistencia;
use Datetime;

class DocenteController extends Controller
{
    public function index(){

        $objD=DB::connection('mysql_solicitudescj')
        ->table('students_teachers as et')
        ->where('et.user_doc_id',Auth::user()->id)
        ->join('juridicorebase_ant.users as u','u.id','et.user_est_id')
        ->join('postulants as p','p.identificacion','u.persona_id')
        ->where('et.estado','A')
   
        ->select('u.id as id','p.apellidos as apellidos')
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
   
        ->select('u.id as id','p.apellidos as apellidos')
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
                'p.apellidos as estudiante',
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
