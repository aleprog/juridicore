<?php
namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\Client;
use App\Core\Entities\Solicitudescj\Consulta;
use Yajra\Datatables\Datatables;
use App\User;
use App\Core\Entities\Solicitudescj\StudentsSteachers;

class CasosController extends Controller
{
	public function index(){
		
		return view('modules.Solicitudescj.casos.index');

	}

	public function getDatatable()
  	{

      $casos=Consulta::with('cliente')->where('supervisor_id',auth()->user()->id)->orderBy('estado','DESC')->orderBy('id','ASC')->get();


       //dd($casos);

      return DataTables::of($casos)->addColumn('actions', function ($select) {
        return '<p class="text-center"><a title="Gestionar Clientes" href="'.route('casos.show',$select->id).'"><span class="fa fa-cog"></span></a><p>';
          })->addColumn('estado_label', function ($select) {
              return $select->estado_label;
      })->rawColumns(['actions','estado_label'])
      ->make(true);     

  	}

  	public function show($id){

  	  $caso =Consulta::find($id);
  	  	
      $client=Client::find($caso->cliente_id);

      $students = StudentsSteachers::where('user_doc_id',auth()->user()->id)->where('tipo','SUP')->where('estado','A')->pluck('user_est_id');

     

      $practicantes=User::whereIn('id',$students)->where('estado','A')->get();

      //dd($students,$practicantes);

      if(!$client){
            return redirect()->route('casos.index')->with('danger','No se ha encontrado el period');
      }

      return view('modules.Solicitudescj.casos.show', compact('client','practicantes','caso'));
    }


    public function updateCaso(Request $request,$id)
    {

      $rules = [
        'razon' => 'required',
        'causa' => 'required_if:razon,==,Patrocinio',
        'detalle' => 'required',
        'tipo_proceso' => 'required_if:razon,==,Patrocinio',
        'unidad_judicial' => 'required_if:razon,==,Patrocinio',
        'fecha_inicio' => 'required_if:razon,==,Patrocinio',
        //'demandante' => 'required_if:razon,==,Patrocinio',
        //'demandado' => 'required_if:razon,==,Patrocinio',
        'tipo_usuario' => 'required_if:razon,==,Patrocinio',
        'practicante_id' => 'required',
      ];
        
      $this->validate($request, $rules);

      //dd($request->all());
      $client = Consulta::find($id);
      $client->razon = $request->razon;
      $client->causa = $request->causa;
      $client->detalle = $request->detalle;
      $client->tipo_proceso = $request->tipo_proceso;
      $client->unidad_judicial = $request->unidad_judicial;
      $client->fecha_inicio = $request->fecha_inicio;
      $client->tipo_usuario = $request->tipo_usuario;
      //$client->demandante = $request->demandante;
      //$client->demandado = $request->demandado;
      $client->practicante_id = $request->practicante_id;
      $client->estado = 'A';

      //dd($client);
 
      $client->save();

      return redirect()->route('casos.show',$client->id);

    }

}