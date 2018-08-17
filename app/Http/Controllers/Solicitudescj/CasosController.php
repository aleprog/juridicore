<?php
namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\Client;
use App\Core\Entities\Solicitudescj\Consulta;
use Yajra\Datatables\Datatables;
use App\User;
use App\Core\Entities\Solicitudescj\StudentsSteachers;
use PDF;


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

    public function print($id){

      $caso = Consulta::find($id);
      $client=Client::find($caso->cliente_id);

      //return view('modules.Solicitudescj.clients.imprimir', compact('client'));

      $path1=public_path() . '/images/ug.png';
      $type1 = pathinfo($path1, PATHINFO_EXTENSION);
      $im1 = file_get_contents($path1);
      $imdata1 = base64_encode($im1);

      $path2=public_path() . '/images/juris.png';
      $type2 = pathinfo($path2, PATHINFO_EXTENSION);
      $im2 = file_get_contents($path2);
      $imdata2 = base64_encode($im2);

      $pdf = PDF::loadView('modules.Solicitudescj.casos.imprimir', [
           'client' => $client,
           'caso' => $caso,
           'logo1'=>$imdata1,
           'type_image1'=>$type1,
           'logo2'=>$imdata2,
           'type_image2'=>$type2,
       ]);

      return $pdf->stream('caso_'.$id.'.pdf');
    }

    public function printCedula($id){

      $caso = Consulta::find($id);
      $client=Client::find($caso->cliente_id);

      //return view('modules.Solicitudescj.clients.imprimir', compact('client'));

      $path1=public_path() . '/images/ug.png';
      $type1 = pathinfo($path1, PATHINFO_EXTENSION);
      $im1 = file_get_contents($path1);
      $imdata1 = base64_encode($im1);

      $path2=public_path() . '/images/juris.png';
      $type2 = pathinfo($path2, PATHINFO_EXTENSION);
      $im2 = file_get_contents($path2);
      $imdata2 = base64_encode($im2);

      $path3=public_path() . '/file/'.$client->foto_cedula;
      $type3 = pathinfo($path3, PATHINFO_EXTENSION);
      $im3 = file_get_contents($path3);
      $imdata3 = base64_encode($im3);

      
      $pdf = PDF::loadView('modules.Solicitudescj.casos.imprimirCedula', [
           'client' => $client,
           'logo1'=>$imdata1,
           'type_image1'=>$type1,
           'logo2'=>$imdata2,
           'type_image2'=>$type2,
           'logo3'=>$imdata3,
           'type_image3'=>$type3,
       ]);

      return $pdf->stream('cedula_cliente_'.$client->cedula.'.pdf');
    }

}