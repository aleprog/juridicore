<?php

namespace App\Http\Controllers\Solicitudescj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Entities\Solicitudescj\End;
use App\Core\Entities\Solicitudescj\Place;
use App\Core\Entities\Solicitudescj\Postulant;

use Yajra\Datatables\Datatables;
use App\User;
use DB;
use Auth;



class DirectoraController extends Controller
{
    public function placeIndex()
    {
        return view('modules.Solicitudescj.Directora.placeIndex');

    }
    public function checkout()
    {
        return view('modules.Solicitudescj.Directora.checkout');

    }
    public function datatablecheckout()
    {
        $estudiante= Auth::user()->evaluarole(['estudiante']);
        $supervisor= Auth::user()->evaluarole(['Supervisor']);

        $result=DB::connection('mysql_solicitudescj')
        ->table('postulants as p')
        ->JOIN('juridicorebase_ant.users as u','u.persona_id','p.identificacion')
        ->JOIN('students_teachers as st','st.user_est_id','u.id')
        ->where('st.tipo','SUP')
            ->where('p.estado','A');
            if($estudiante>0)
            {
                $result=$result->where('p.identificacion',Auth::user()->persona_id);
            }
            if($supervisor>0)
            {
                $result=$result->where('st.user_doc_id',Auth::user()->id);
            }
            $result=$result->select('p.id as id','p.identificacion as identificacion',
            DB::RAW('CONCAT(p.apellidos," ",p.nombres) as estudiante'),
                    'p.hsitu as hsitu','p.hacademicas as hacademicas','p.hclinica','p.htrabajoc','p.capacitaciones'
            )
            ->get();

       return DataTables::of($result)
              
        ->addColumn('Opciones', function ($select) use ($estudiante) {
               // return '<a href="'.route('tutor.imprimirEvaluacion',$select->id).'" target="_blank" class="btn btn-primary btn-sm">Imprimir</a>';
               $horas=$select->hsitu+$select->hacademicas+$select->hclinica+$select->htrabajoc+$select->capacitaciones;

               $memu='';
               $memu.='<p><span class="label label-primary"><h4>'.$horas.' horas</h4></span></p>';

               if($estudiante<1)
               {
                $memu.='&nbsp<a href="'.route('all.editarcheckout',$select->id).'" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>';
              
               }
                return $memu;
            })
           
          
            ->make(true);
    }
    public function editarcheckout($id)
    {
       
        $result=DB::connection('mysql_solicitudescj')
        ->table('postulants as p')->where('p.estado','A')
        ->where('p.id',$id)
        ->select('p.id as id','p.identificacion as identificacion',
        DB::RAW('CONCAT(p.apellidos," ",p.nombres) as estudiante'),
                'p.hsitu as hsitu','p.hacademicas as hacademicas','p.hclinica','p.htrabajoc','p.capacitaciones'
        )
        ->get()->first();        
        return view('modules.Solicitudescj.Directora.editarcheckout',compact('id','result'));

    }
    public function savecheckout(request $request)
    {
        $obj=Postulant::Find($request->id);
       if(isset($request->hsitu))
       {
        $obj->hsitu="160";
       }
       if(isset($request->hacademicas))
       {
        $obj->hacademicas="80";
       }
       if(isset($request->hclinica))
       {
        $obj->hclinica="100";
       }
      
       if(isset($request->htrabajoc))
       {
        $obj->htrabajoc="80";
       }
       if(isset($request->capacitaciones))
       {
        $obj->capacitaciones="80";
       }
       $obj->save();

       return redirect()->route('all.checkout');

}
    public function uploadFinal(request $request)
    {
        $id=Auth::user()->id;
        
         $obj=End::where([
         'user_id' => Auth::user()->id
         ])->get()->count();
         $m="Ya tiene un registro realizado";
   
         if($obj<1)
         {
            
            if($request->file('archivo')){
                $cedula = $request->file('archivo');
                    \Storage::delete($id.'Final'.'.pdf');
                    \Storage::disk('local')->put($id.'Final'.'.pdf',  \File::get($cedula));
              }

                $obj=new End();
                $obj->user_id = Auth::user()->id;
                $obj->filename = $id.'Final'.'.pdf';
                $obj->save();
             
             $m="Subida Exitosa";
 
         }
         $estudiante= Auth::user()->evaluarole(['estudiante']);
         $countEs=End::where('user_id',Auth::user()->id)->get()->count();
         
         $cc=0;
                
     return view('modules.Solicitudescj.Directora.Final')->with(['m'=>$m,
     'estudiante'=>$estudiante,'countEs'=>$countEs,'cc'=>$cc
     ]);
 
    }
    public function datatableAllFinal()
	{
        $estudiante= Auth::user()->evaluarole(['estudiante']);

        $result=DB::connection('mysql_solicitudescj')
            ->table('ends as f');
            if($estudiante>0)
            {
                $result=$result->where('f.user_id',Auth::user()->id);
            }
            
            $result=$result->join('juridicorebase_ant.users as u','u.id','f.user_id')
            ->join('postulants as p','p.identificacion','u.persona_id')
            ->select('f.id as id',DB::RAW('CONCAT(p.apellidos," ",p.nombres) as estudiante'),
                    'f.estado as estado','f.filename as filename','f.created_at as fecha_registro'
            )
            ->get();

       return DataTables::of($result)
       ->addColumn('Estados', function ($select) {
           switch($select->estado)
           {
               case 'P':
               return '<span class="label label-warning">Pendiente</span>';

               break;
               case 'I':
               return '<span class="label label-danger">Negado</span>';

               break;
               case 'AD':
               return '<span class="label label-primary">Aprobado Directora</span>';
               break;

               case 'AS':
               return '<span class="label label-success">Aprobado Secretaria</span>';
               break;
           }
        
        })
        
        ->addColumn('Opciones', function ($select) use ($estudiante) {
               // return '<a href="'.route('tutor.imprimirEvaluacion',$select->id).'" target="_blank" class="btn btn-primary btn-sm">Imprimir</a>';
               $memu='';
               if($estudiante<1)
               {
                $memu.='<a href="'.route('all.aprobarPdf',$select->id).'" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                $memu.='&nbsp<a href="'.route('all.negarPdf',$select->id).'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>';
              
               }
                $memu.='&nbsp<a href="/storage/'.$select->filename.'" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
                return $memu;
            })
           
          
            ->make(true);
    }
    public function negarPdf($id)
    {
            $obj=End::Find($id);
            $obj->estado='I';
            $obj->save();
            $m='Grabado Exitosamente';
            $estudiante= Auth::user()->evaluarole(['estudiante']);
            $countEs=End::where('user_id',Auth::user()->id)->get()->count();
            $cc=0;
            return view('modules.Solicitudescj.Directora.Final')->with(['m'=>$m,
            'estudiante'=>$estudiante,'countEs'=>$countEs,'cc'=>$cc]);
    }
    public function aprobarPdf($id)
    {
        $directora= Auth::user()->evaluarole(['Directora']);

        $obj=End::Find($id);
        if($directora>0)
        {
            $obj->estado='AD';

        }else{
            $obj->estado='AS';
        }
        $obj->save();
        $m='Grabado Exitosamente';
        $estudiante= Auth::user()->evaluarole(['estudiante']);
        $countEs=End::where('user_id',Auth::user()->id)->get()->count();
        $cc=0;
        return view('modules.Solicitudescj.Directora.Final')->with(['m'=>$m,
        'estudiante'=>$estudiante,'countEs'=>$countEs,'cc'=>$cc]);
    }
    public function datatableLugares()
	{
       return DataTables::of(
            DB::connection('mysql')
                ->table('places AS a')
                ->select(
                    'a.id as id',
                'a.descripcion as descripcion',
				'a.estado as estado'
               )
                ->get()

        )->addColumn('Estados', function ($select) {
            if($select->estado=="A")
            {
                return '<span class="label label-primary">Activo</span>';

            }else
            {
                return '<span class="label label-danger">Inactivo</span>';

            }

        })
        
        ->addColumn('Opciones', function ($select) {
               // return '<a href="'.route('tutor.imprimirEvaluacion',$select->id).'" target="_blank" class="btn btn-primary btn-sm">Imprimir</a>';
               return '<a href="'.route('admin.editarLugares',$select->id).'" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';

            })
           
          
            ->make(true);
    }
    public function saveLugar(request $request)
    {
        if($request->id!=null && $request->id!='')
        {
            $obj=Place::Find($request->id);
            $obj->descripcion=$request->descripcion;
            $obj->estado=$request->estado;
            $obj->save();
            

        }else{
            $obj=new Place();
            $obj->descripcion=$request->descripcion;
            $obj->estado=$request->estado;
            $obj->save();
        }
        return redirect()->route('admin.placeIndex');
       
    }
    public function editarLugares($id)
    {
        $obj=Place::Find($id);
        return view('modules.Solicitudescj.Directora.editarLugares',compact('obj'));
    }
    public function crearLugar()
    {
        return view('modules.Solicitudescj.Directora.crearLugar');

    }
    public function procesoFinal()
    {
        $estudiante= Auth::user()->evaluarole(['estudiante']);
        $countEs=End::where('user_id',Auth::user()->id)->get()->count();
        $cc=0;
        return view('modules.Solicitudescj.Directora.Final',compact('estudiante','countEs','cc'));
    }
    
}
