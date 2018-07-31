<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ReportController extends Controller
{
    //

    public function index()
    {

        return view("modules.Report.reporteGeneral");
    }

    public function reporteGeneralDatos(request $request)
    {
        if ($request->fechai == null || $request->fechaf == null) {
            $array_response['status'] = 404;
            $array_response['message'] = "No pueden estar vacio los intervalos de fechas";
        } else {
            $datetime1 = date_create($request->fechaf); //fecha actual
            $datetime2 = date_create($request->fechai); //fecha de db
            $interval = date_diff($datetime1, $datetime2, false);
            $dias = intval($interval->format('%R%a'));
            if (($dias < 0) || ($dias == 0)) {
                $result = DB::connection('mysql_prueba')
                    ->table('bestados as be')
                    ->join('bases as b', 'be.base_id', 'b.id')
                    ->whereBetween('b.fecha_ing', [$request->fechai, $request->fechaf])
                    ->select('b.tipo_linea as tipo_linea',
                        'b.operadora as operadora',
                        'be.estado as estado',
                        'b.region as region',
                        'b.tipo_solicitud as tipo_solicitud')->get()->toArray();

                if (count($result) > 0) {
                    $array_response['status'] = 200;
                    $array_response['message'] = $result;
                } else {
                    $array_response['status'] = 404;
                    $array_response['message'] = "No hay resultado en su reporte. Recuerde Utilizar la ultima columna para la reporteria detallada";

                }
            } else if ($dias > 0) {
                $array_response['status'] = 404;
                $array_response['message'] = "La Fecha es menor a la fecha Inicial";
            }
        }

        return response()->json($array_response, 200);
    }


}
