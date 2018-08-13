<?php
namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\Client;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{
	public function index(){
        /*$users=User::whereHas('roles', function ($query) {
		    $query->whereIn('abv',['SUP','TUT','SEC']);
		})->get();
		dd($users);*/
		//dd($users[0]->roles_label);
		//dd(User::all());
		return view('modules.Solicitudescj.clients.index');
	}


	public function getDatatable()
    {


	    $clients=Client::get();

    	//dd($clients);

        return DataTables::of($clients)->addColumn('actions', function ($select) {
			return '<p class="text-center"><a title="Gestionar Clientes" href="'.route('clients.show',$select->id).'"><span class="fa fa-cog"></span></a><p>';
        })->addColumn('estado_label', function ($select) {
            return $select->estado_label;
        })->rawColumns(['actions','estado_label'])
        ->make(true);


    }

    public function create(){
		
		return view('modules.Solicitudescj.clients.create');
	}

	public function store(Request $request)
    {

    	
        $rules = [
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'cedula' => 'required|digits_between:7,10|unique:mysql_solicitudescj.clientes,cedula',
            'fecha_nacimiento' => 'required',
            'nacionalidad' => 'required',
            'etnia' => 'nullable',
            'celular' => 'required|regex:/(09)[0-9]{8}/',
            'convencional' => 'nullable|digits_between:7,10',
            'instruccion' => 'required',
            'domicilio' => 'required',
            'estado_civil' => 'required',
            'sexo' => 'required',
            'tipo_sexo' => 'required_if:sexo,==,Otros',
            'sector' => 'required',
            'ocupacion' => 'required',
            'ingresos' => 'required|numeric',
            'bono' => 'nullable|numeric',
            'discapacidad' => 'required',
            'tipo_dicapacidad' => 'required_if:discapacidad,==,SI',
            'enfermedad' => 'required',
            'tipo_enfermedad' => 'required_if:enfermedad,==,SI',
        ];/*
        $messages = [
            'descripcion.required' => 'Escriba el descripcion ',
            'fechai.required' => 'Escriba la fecha inicio ',
            'fechaf.required' => 'Escriba la fecha final',
        ];*/
        
        $this->validate($request, $rules);

        //dd($request->all());
        /*

        
        $period = new Period();
        $period->descripcion=$request->descripcion;
        $period->fechai=$request->fechai;
        $period->fechaf=$request->fechaf;
        $period->maxtutoria=$request->maxtutoria;
        $period->fechai_extraordinaria=$request->fecha_extraordinaria;
        $period->fechaf_extraordinaria=$request->fechaf_extraordinaria;
        $period->estado = 'A';
        $period->save();*/

      $client = new Client();
      $client->nombres = $request->nombres;
	  $client->apellidos = $request->apellidos;
	  $client->cedula = $request->cedula;
	  $client->fecha_nacimiento = $request->fecha_nacimiento;
	  $client->nacionalidad = $request->nacionalidad;
	  $client->etnia = $request->etnia;
	  $client->celular = $request->celular;
	  $client->convencional = $request->convencional;
	  $client->instruccion = $request->instruccion;
	  $client->domicilio = $request->domicilio;
	  $client->estado_civil = $request->estado_civil;
	  $client->sexo = $request->sexo;
	  $client->tipo_sexo = $request->tipo_sexo;
	  $client->sector = $request->sector;
	  $client->ocupacion = $request->ocupacion;
	  $client->iess = $request->iess;
	  $client->ingresos = $request->ingresos;
	  $client->bono = $request->bono;
	  $client->discapacidad = $request->discapacidad;
	  $client->tipo_discapacidad = $request->tipo_discapacidad;
	  $client->enfermedad = $request->enfermedad;
	  $client->tipo_enfermedad = $request->tipo_enfermedad;
	  $client->monitor_id = auth()->user()->id;
	  $client->estado = 'A';

	  //dd($client);
	  $client->save();

      return redirect()->route('clients.index');
    }

    public function show($id){
     	$client=Client::find($id);

		if(!$client){
            return redirect()->route('client.index')->with('danger','No se ha encontrado el period');
        }

        return view('modules.Solicitudescj.clients.edit', compact('client'));
    }

    public function update(Request $request,$id)
    {

        
        $rules = [
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'cedula' => 'required|digits_between:7,10|unique:mysql_solicitudescj.clientes,cedula,'.$id.',id',
            'fecha_nacimiento' => 'required',
            'nacionalidad' => 'required',
            'etnia' => 'nullable',
            'celular' => 'required|regex:/(09)[0-9]{8}/',
            'convencional' => 'nullable|digits_between:7,10',
            'instruccion' => 'required',
            'domicilio' => 'required',
            'estado_civil' => 'required',
            'sexo' => 'required',
            'tipo_sexo' => 'required_if:sexo,==,Otros',
            'sector' => 'required',
            'ocupacion' => 'required',
            'ingresos' => 'required|numeric',
            'bono' => 'nullable|numeric',
            'discapacidad' => 'required',
            'tipo_dicapacidad' => 'required_if:discapacidad,==,SI',
            'enfermedad' => 'required',
            'tipo_enfermedad' => 'required_if:enfermedad,==,SI',
        ];
        
        $this->validate($request, $rules);

        

      $client = Client::find($id);
      $client->nombres = $request->nombres;
      $client->apellidos = $request->apellidos;
      $client->cedula = $request->cedula;
      $client->fecha_nacimiento = $request->fecha_nacimiento;
      $client->nacionalidad = $request->nacionalidad;
      $client->etnia = $request->etnia;
      $client->celular = $request->celular;
      $client->convencional = $request->convencional;
      $client->instruccion = $request->instruccion;
      $client->domicilio = $request->domicilio;
      $client->estado_civil = $request->estado_civil;
      $client->sexo = $request->sexo;
      $client->tipo_sexo = $request->tipo_sexo;
      $client->sector = $request->sector;
      $client->ocupacion = $request->ocupacion;
      $client->iess = $request->iess;
      $client->ingresos = $request->ingresos;
      $client->bono = $request->bono;
      $client->discapacidad = $request->discapacidad;
      $client->tipo_discapacidad = $request->tipo_discapacidad;
      $client->enfermedad = $request->enfermedad;
      $client->tipo_enfermedad = $request->tipo_enfermedad;

      //dd($client);
      $client->save();

      return redirect()->route('clients.index');
    }

}