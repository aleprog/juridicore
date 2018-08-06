<?php
namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\Period;
use Yajra\Datatables\Datatables;

class PeriodController extends Controller
{
	public function index(){
        /*$users=User::whereHas('roles', function ($query) {
		    $query->whereIn('abv',['SUP','TUT','SEC']);
		})->get();
		dd($users);*/
		//dd($users[0]->roles_label);
		//dd(User::all());
		return view('modules.Solicitudescj.periods.index');
	}

	public function create(){
		
		return view('modules.Solicitudescj.periods.create');
	}

	public function store(Request $request)
    {
        $rules = [
            'descripcion' => 'required|unique:mysql_solicitudescj.periodos,descripcion',
            'fechai' => 'required',
            'fechaf' => 'required',
            'maxtutoria' => 'required|integer',
        ];
        $messages = [
            'descripcion.required' => 'Escriba el descripcion ',
            'fechai.required' => 'Escriba la fecha inicio ',
            'fechaf.required' => 'Escriba la fecha final',
        ];
        $this->validate($request, $rules, $messages);


        
        $period = new Period();
        $period->descripcion=$request->descripcion;
        $period->fechai=$request->fechai;
        $period->fechaf=$request->fechaf;
        $period->maxtutoria=$request->maxtutoria;
        $period->fechai_extraordinaria=$request->fecha_extraordinaria;
        $period->fechaf_extraordinaria=$request->fechaf_extraordinaria;
        $period->estado = 'A';
        $period->save();

        return redirect()->route('periods.index');
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'descripcion' => 'required|unique:mysql_solicitudescj.periodos,descripcion,'.$id.',id',
            'fechai' => 'required',
            'fechaf' => 'required',
            'maxtutoria' => 'required|integer',
        ];
        $messages = [
            'descripcion.required' => 'Escriba el descripcion ',
            'fechai.required' => 'Escriba la fecha inicio ',
            'fechaf.required' => 'Escriba la fecha final',
        ];
        $this->validate($request, $rules, $messages);


        
        $period = Period::find($id);
        $period->descripcion=$request->descripcion;
        $period->fechai=$request->fechai;
        $period->fechaf=$request->fechaf;
        $period->maxtutoria=$request->maxtutoria;
        $period->fechai_extraordinaria=$request->fecha_extraordinaria;
        $period->fechaf_extraordinaria=$request->fechaf_extraordinaria;
        $period->estado = 'A';
        $period->save();

        return redirect()->route('periods.index');
    }

	public function getDatatable()
    {


	    $periods=Period::get();

    	//dd($postulants);

        return DataTables::of($periods)->addColumn('actions', function ($select) {
			return '<p class="text-center"><a title="Gestionar Periodo" href="'.route('periods.show',$select->id).'"><span class="fa fa-cog"></span></a><p>';
        })->addColumn('estado_label', function ($select) {
            return $select->estado_label;
        })->rawColumns(['actions','estado_label'])
        ->make(true);


    }

    public function show($id){
     	$period=Period::find($id);

		if(!$period){
            return redirect()->route('period.index')->with('danger','No se ha encontrado el period');
        }  

        //dd($postulant);

        return view('modules.Solicitudescj.periods.edit', compact('period'));
    }
}