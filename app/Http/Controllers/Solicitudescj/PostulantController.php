<?php

namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\Postulant;
use App\Core\Entities\Solicitudescj\RequestPostulant;
use App\User;
use Spatie\Permission\Models\Role;
use App\Mail\CreateUserStudent as CreateUserStudent;
use Yajra\Datatables\Datatables;
use Mail;
use App\Core\Entities\Solicitudescj\Postulant;
use App\Core\Entities\Solicitudescj\RequestPostulant;
use App\Http\Controllers\Ajax\SelectController;

class PostulantController extends Controller
{
	public function index(){

        //dd(1);

        /*$postulants=Postulant::with(['career'])->with(['request' => function ($query) {
            $query->with(['state' => function ($query) {
            
            }]);
        }])->get();*/

        //$postulants=Postulant::with(['career','request','request.state'])->get();

        //dd($postulants);
		
		return view('modules.Solicitudescj.postulants.index');

    }
    

	public function getDatatable()
    {


    	$postulants=Postulant::with(['request','request.state'])->get();

    	//dd($postulants);

        return DataTables::of($postulants)->addColumn('actions', function ($select) {

            return '<p class="text-center"><a title="Gestionar Postulante" href="'.route('porstulants.show',$select->id).'"><span class="fa fa-cog"></span></a><p>';
        })->addColumn('status_label', function ($select) {
            return $select->status_label;
        })->rawColumns(['actions','status_label'])
        ->make(true);


    }


    public function show($id){
        $postulant = Postulant::with(['request','request.state'])->find($id);

        //dd($postulant);

        if(!$postulant){
            return redirect()->route('postulant.index')->with('danger','No se ha encontrado el postulante');
        }  

        //dd($postulant);

        return view('modules.Solicitudescj.postulants.show', compact('postulant'));
    }


    public function statusRequest(Request $request){

        //dd($request);
        $postulantRequest = RequestPostulant::where('postulant_id',$request->id)->first(); 
        $postulant = Postulant::find($request->id); 
        //dd($postulantRequest,$request->id);      
        $postulantRequest->state_id=$request->status;
        $postulantRequest->save();

        

        if($request->status==2){
            $password=str_random(8);

            //dd($postulant);

            $user = new User();
            $user->name = $postulant->nombres.' '.$postulant->apellidos;
            $user->email = $postulant->correo;
            $user->password = bcrypt($password); 
            $user->persona_id = $postulant->identificacion;
            $user->estado = 'A';
            $user->save();

            $user->assignRole([4]);

            Mail::to($user->email)->send(new CreateUserStudent($user, $password));
        }



        return redirect()
                ->route('porstulants.index')
                ->with('success', 'Se ha Modificado el Estatus de la Solucitud Satifactoramente');

    }

}
