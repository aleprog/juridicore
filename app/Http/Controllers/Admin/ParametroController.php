<?php

namespace App\Http\Controllers\Admin;

use App\Core\Entities\Admin\tb_parametro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ajax\SelectController;
use DB;
use Illuminate\Support\Facades\Utils;
use Yajra\Datatables\Datatables;



class ParametroController extends Controller
{
    public function index()
    {
        $objSelect = new SelectController();
        $father = $objSelect->getfatherparameter();
        $estado=['A'=>'ACTIVO','I'=>'INACTIVO'];
        $verificacion=  ['0'=>'Finaliza Proceso'];
        return view('admin/parametros/index',compact(['estado','father','verificacion']));
    }
    public function getParameterFather($parameter)
    {
        $objSelect = new SelectController();
        return $objSelect->getParameterFathera($parameter, 'json');
    }
    public function SaveParameter(request $request)
    {
        $rules = [
            'name' => 'required',
        ];
        $messages = [
            'name.required' => 'Escriba el nombre del parametro',
        ];
        $this->validate($request, $rules,$messages);
        $array_response = [];
        try{
            //Grabar dato

            if($request->var!=0)
            {
                $oobjOption         =tb_parametro::Find($request->var);
            }else
            {
                $oobjOption         = new tb_parametro();
            }

            if($request->father!=null)
            {
                $oobjOption->parametro_id = $request->father;
                $result=tb_parametro::Find($request->father);
                $oobjOption->nivel       = $result->nivel+1;
            }
            else
            {
                $oobjOption->nivel       = 2;

            }
            if($request->optionid!=null)
            {
                $oobjOption->estado  = $request->optionid;
            }
            else{
                $oobjOption->estado='A';
            }
            $oobjOption->descripcion  = $request->name;

            $intCod = tb_parametro::where('descripcion', $request->name)->first();

            if(count($intCod)>0&& $oobjOption->descripcion!=$request->name)
            {
                throw new \Exception ("Ya se encuentra el parametro registrado");
            }else{
                $oobjOption->descripcion  = $request->name;
                $oobjOption->verificacion=$request->verificacion;
                $oobjOption->save();
                $array_response['status'] = 200;
                $array_response['message'] = 'Se ha Guardado Exitosamente ';
            }
        }catch (\Exception $e) {
            $array_response['status'] = 404;
            $array_response['message'] = 'Error al guardar los datos , consulte con el Administrador:'.$e->getMessage();
        }

        return response()->json($array_response, 200);
    }
    public function ParameterEliminar(request $request){
        $result = tb_parametro::where(['parametro_id'=>$request->id])->get();


        try
        {
            if(count($result)>0) {
                throw new \Exception ("No puede Eliminar,Parametro se encuentra relacionado con otro ");

            }
            $objEliminar = tb_parametro::find($request->id);
            $objEliminar->delete();
            $array_response['status'] = 200;
            $array_response['message'] = 'Se ha Eliminado Exitosamente ';


        }catch (\Exception $e) {
            $array_response['status'] = 404;
            $array_response['message'] = 'Error al Eliminar los datos porfavor consulte con el Administrador'.$e->getMessage();
        }

        return response()->json($array_response, 200);
    }
    public function getDatatable()
    {

        return DataTables::of(
            DB::connection('mysql')
                ->table('tb_parametro AS g')
                ->select('g.id as id','g.descripcion AS name','g.estado as estado','g.parametro_id as parameter','g.verificacion as verificacion')
                ->get()

        )->addColumn('estado', function ($select)
        {
                switch($select->estado)
                {
                    case 'A':
                       // return '<a onclick="PedirConfirmacion(\'' . $select->id . '\',\'' . $select->parameter . '\',\'' . 'estado' . '\')" class="btn btn-xs btn-primary">Activo</a>';
                        return '<span class="label label-xs label-primary">Activo</span>';

                    case 'I':
                      //  return '<a onclick="PedirConfirmacion(\'' . $select->id . '\',\'' . $select->parameter . '\',\'' . 'estado' . '\')" class="btn btn-xs btn-danger">Inactivo</a>';
                          return '<span class="label label-xs label-danger">Inactivo</span>';

                    default:
                      //  return '<a onclick="PedirConfirmacion(\'' . $select->id . '\',\'' . $select->parameter . '\',\'' . 'estado' . '\')" class="btn btn-xs btn-success">Desconocido</a>';
                      return '<span class="label label-xs label-success">Desconocido</span>';

                }
        })
            ->addColumn('actions', function ($select)
        {

            return '<a href="#" onclick="EditChanges(\'' . $select->id . '\',\'' . $select->name . '\',\'' . $select->estado . '\',\'' . $select->parameter . '\',\'' . $select->verificacion . '\')"
                               data-hover="tooltip" data-placement="top" 
                               data-target="#Modalagregar" data-toggle="modal" id="modal"
                               class="label label-primary">
                        <span class="glyphicon glyphicon-edit"></span></a></small>
                
                        <a href="#" onclick="PedirConfirmacion(\'' . $select->id . '\',\'' . $select->parameter . '\',\'' . 'delete' . '\')"
                               class="label label-danger">
                        <span class="glyphicon glyphicon-trash"></span></a></small>';
        })

            ->make(true);
    }

}
