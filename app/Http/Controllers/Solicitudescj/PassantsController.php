<?php

namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\Postulant;
use App\Core\Entities\Solicitudescj\RequestPostulant;
use App\Core\Entities\Solicitudescj\Schedule;
use App\Core\Entities\Solicitudescj\StudentsSteachers;
use App\Core\Entities\Solicitudescj\State;
use App\Core\Entities\Solicitudescj\Place;
use App\Core\Entities\Solicitudescj\Horario;
use App\User;
use Spatie\Permission\Models\Role;
use App\Mail\CreateUserStudent as CreateUserStudent;
use App\Mail\RejectionUserStudent as RejectionUserStudent;
use Yajra\Datatables\Datatables;
use Mail;
use App\Http\Controllers\Ajax\SelectController;
use DB;

class PassantsController extends Controller
{
	public function index(){

        //dd(1);

        /*$postulants=Postulant::with(['career'])->with(['request' => function ($query) {
            $query->with(['state' => function ($query) {
            
            }]);
        }])->get();*/

        //$postulants=Postulant::with(['career','request','request.state'])->get();

        //dd($postulants);

        $postulants=Postulant::with(['request','request.state'])
    	->whereHas('request.state', function ($query) {
		    $query->whereIn('abv',['AP','NE','AB']);
		})->get();

		//dd($postulants);
		
		return view('modules.Solicitudescj.passants.index');

    }
    

	public function getDatatable()
    {


    	$postulants=Postulant::with(['request','request.state'])
    	->whereHas('request.state', function ($query) {
		    $query->whereIn('abv',['AP','NE','AB']);
		})->get();

    	//dd($postulants);

        return DataTables::of($postulants)->addColumn('actions', function ($select) {

            return '<p class="text-center"><a title="Gestionar Pasante" href="'.route('passants.show',$select->id).'"><span class="fa fa-cog"></span></a><p>';
        })->addColumn('status_label', function ($select) {
            return $select->status_label;
        })->rawColumns(['actions','status_label'])
        ->make(true);


    }


    public function show($id){
        $postulant = Postulant::with(['request','request.state'])->find($id);

        //dd($postulant);

        $student=User::where('persona_id',$postulant->identificacion)->get();

        $supervisors=User::whereHas('roles', function ($query) {
            $query->whereIn('abv',['TUT']);
        })->pluck('name','id');

        $horarios = Schedule::pluck('descripcion','id');

        

        $students_teachers = StudentsSteachers::where('user_est_id',$student[0]->id)->where('tipo','TUT')->get();

        $students_teachers1 = StudentsSteachers::where('user_est_id',$student[0]->id)->where('tipo','SUP')->get();

        if(count($students_teachers)>0){
            $supervisor=User::find($students_teachers[0]->user_doc_id);
            $horario=[];
            $horario_id=0;
            //$horario=Schedule::find($students_teachers[0]->horario_id);
            $supervisor_id=$supervisor->id;
            //$horario_id=$students_teachers[0]->horario_id;
        }else{
            $supervisor=[];
            $horario=[];
            $supervisor_id=0;
            $horario_id=0;
        }

        if(count($students_teachers1)>0){
            $supervisor1=User::find($students_teachers1[0]->user_doc_id);
            $horario1=Schedule::find($students_teachers1[0]->horario_id);
        }else{
            $supervisor1=[];
            $horario1=[];
            
        }




        if(!$postulant){
            return redirect()->route('passant.index')->with('danger','No se ha encontrado el postulante');
        }  

        //dd($postulant);

        return view('modules.Solicitudescj.passants.show', compact('postulant','supervisors','supervisor','supervisor_id','horarios','horario','horario_id','supervisor1','horario1','student','students_teachers1'));
    }


    public function assignSteacherTutor(Request $request)
    {
        //dd($request->all());

        $rules = [
            'user_doc_id' => 'required',
            //'horario_id' => 'required',
        ];
        $messages = [
            'user_doc_id.required' => 'Elija el supervisor ',
            //'horario_id.required' => 'Elija el Horario',

        ];
        $this->validate($request, $rules);


        $teachers = StudentsSteachers::where('user_est_id',$request->id)->where('tipo','TUT')->get();

        if(count($teachers)>0){
           $students_teachers= StudentsSteachers::find($teachers[0]->id);
           //dd($students_teachers);
        }else{
           $students_teachers= new StudentsSteachers(); 
        }
        
        $students_teachers->user_est_id = $request->id;
        $students_teachers->user_doc_id = $request->user_doc_id;
        $students_teachers->tipo = 'TUT';
        //$students_teachers->horario_id = $request->horario_id;
        $students_teachers->estado = 'A';
        $students_teachers->save();

        return redirect()->route('passants.index');

    }

    public function assignSteacherSupervisor(Request $request)
    {

        $rules = [
            'lugar' => 'integer|min:1',
            'supervisor' => 'integer|min:1',
            'horario' => 'integer|min:1',
            'hora' => 'integer|min:1',
            //'horario_id' => 'required',
        ];
        $messages = [
            'lugar.min' => 'Selecione el lugar',
            'supervisor.min' => 'Selecione el supervisor',
            'horario.min' => 'Selecione la hora de inicio',
            'hora.min' => 'Selecione el hora a trabajar',
            //'horario_id.required' => 'Elija el Horario',
        ];
        $this->validate($request, $rules, $messages);
        //dd($request->all());

        $teachers = StudentsSteachers::where('user_est_id',$request->id)->where('tipo','SUP')->get();

        if(count($teachers)>0){
           $students_teachers= StudentsSteachers::find($teachers[0]->id);
           //dd($students_teachers);
        }else{
           $students_teachers= new StudentsSteachers(); 
        }

        $hora_final=intval($request->horario)+intval($request->hora);

        //dd(intval($request->horario)+intval($request->hora));

        $students_teachers->user_est_id = $request->id;
        $students_teachers->user_doc_id = $request->supervisor;
        $students_teachers->tipo = 'SUP';
        $students_teachers->lugar_id = $request->lugar;
        $students_teachers->hora_inicio = $request->horario.':00';
        $students_teachers->hora_fin = $hora_final.':00';
        //$students_teachers->horario_id = $request->horario_id;
        $students_teachers->estado = 'A';
        $students_teachers->save();

        return redirect()->route('passants.show',$request->postulant_id);
    }

    public function activarSupervisor($id){
        $teachers = StudentsSteachers::where('user_est_id',$id)->where('tipo','SUP')->first();

        //dd($teachers);
        $teachers->estado = 'A';
        $teachers->save();

        return redirect()->route('passants.index');
    }

    public function statusRejection(Request $request)
    {
        //dd($request->all());

        $rules = [
            'motivo' => 'required|string|min:20|max:255',
            //'horario_id' => 'required',
        ];
        $messages = [
            'motivo.required' => 'El motivo del rechazo es requerido',
            //'horario_id.required' => 'Elija el Horario',

        ];
        $this->validate($request, $rules);

        $postulantRequest = RequestPostulant::where('postulant_id',$request->postulant_id)->first(); 

        $status=State::where('abv','NE')->first();
        $motivo= $request->motivo;
        $postulant = Postulant::find($request->postulant_id); 
        $postulant->motivo=$motivo;
        $postulant->estado='I';
        $postulant->save();

        $user = User::where('persona_id',$postulant->identificacion)->first();

        $user->estado = 'I';
        $user->save();
        

        //dd($postulantRequest,$status,$postulant);
        //dd($postulantRequest,$request->id);      
        $postulantRequest->state_id=$status->id;
        $postulantRequest->save();

        Mail::to($user[0]->email)->send(new RejectionUserStudent($user[0], $postulant, $motivo));

        return redirect()->route('passants.index');
        //->with('message','El participante ha sido rechazado exitosamente');
    }

    public function consultaSupervisor(Request $request){

        if($request->query('request')=='lugares'){
            return $lugares=Place::all();
        }elseif($request->query('request')=='supervidores'){
            $lugar_id=$request->query('lugar_id');
            /*$result = DB::connection('mysql')
            ->table('users AS C')
            ->where('C.lugarasignado_id', $lugar_id)
            ->where('C.estado', 'A')
            ->groupBy('C.name', 'C.id')
            ->orderBy('C.name', 'DSC')
            ->select('C.id as id', 'C.name as descripcion')->get();*/
            $result= User::where('estado','A')
            ->where('lugarasignado_id',$lugar_id)
            ->select('id as id', 'name as descripcion')
            ->orderBy('name', 'DESC')
            ->get();

            //dd($result);
            return $result;
        }elseif($request->query('request')=='horarios'){
            return $horario=Horario::all();
        }

        //dd($request->query('request'),$request->query);

    }

    public function selectSupervisor($id){
        $teachers = StudentsSteachers::with(['docente','horario','lugar'])->where('user_est_id',$id)->where('tipo','SUP')->first();

        return $teachers;
    }


    

}

