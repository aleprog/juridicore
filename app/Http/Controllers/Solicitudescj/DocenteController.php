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
        $horaInicio = new DateTime($request->hora_inicio);
        $horaTermino = new DateTime($request->hora_fin);

        $interval = $horaInicio->diff($horaTermino);
        $hora=$interval->format('%H');
        $docent_id=Auth::user()->id;
        $objAsistencia=new Asistencia();
        $objAsistencia->user_id=$request->estudiante;
        $objAsistencia->docente_id=$docent_id;
        $objAsistencia->fecha=$request->fecha_registro;
        $objAsistencia->hora_inicio=$request->hora_inicio;
        $objAsistencia->hora_fin=$request->hora_fin;
        $objAsistencia->horas=$hora;
        $objAsistencia->semana='Semana'.$request->semana;
       
        $objAsistencia->save();

        return redirect()->route('supervisor.asistencia');
         

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
					return '<span class="label label-primary">Actividad Aprobada</span>';
					break;
					case 'I':
					if(!$select->horas)
					{
						return '<span class="label label-success" >No hay Asistencia</span>';
							break;
					}
					
					return '<span class="label label-info">Solo Asistencia</span>&nbsp;';
					break;
                    case 'P':
                    
                    return '<a href="'.route('docente.stateactividad',$select->id).'" class="label label-warning tooltips" title="aaa">
                    <i class="fa fa-check"></i>&nbsp;Actividad Pendiente de Aprobar
                    <span>'.$select->descripcion.'</span>
                    </a>';

					break;
				}

            })
           
            ->make(true);
    }

}
