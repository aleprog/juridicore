<?php

namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\Postulant;
use App\Core\Entities\Solicitudescj\RequestPostulant;
use App\Core\Entities\Solicitudescj\Schedule;
use App\Core\Entities\Solicitudescj\StudentsSteachers;
use App\User;
use Spatie\Permission\Models\Role;
use App\Mail\CreateUserStudent as CreateUserStudent;
use Yajra\Datatables\Datatables;
use Mail;
use App\Http\Controllers\Ajax\SelectController;

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


    public function assignSteacherSupervisor(Request $request)
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

    public function activarSupervisor($id){
        $teachers = StudentsSteachers::where('user_est_id',$id)->where('tipo','SUP')->first();

        //dd($teachers);
        $teachers->estado = 'A';
        $teachers->save();

        return redirect()->route('passants.index');
    }


    

}

