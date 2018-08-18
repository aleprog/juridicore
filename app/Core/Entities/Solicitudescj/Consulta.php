<?php

namespace App\Core\Entities\Solicitudescj;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
	protected $connection = 'mysql_solicitudescj';
	protected $append = ['created_at_es', 'created_at_en'];

    protected $table = 'consultas';

    public function supervisor()
	{
		return $this->belongsTo('App\User','supervisor_id','id');
	}

	public function cliente()
	{
		return $this->belongsTo('App\Core\Entities\Solicitudescj\Client','cliente_id','id');
	}

	public function getCreatedAtEsAttribute(){
		return $this->created_at->format('d-m-Y');
	}

	public function getCreatedAtEnAttribute(){
		return $this->created_at->format('d-m-Y');
	}


	public function getEstadoLabelAttribute(){

    	$label='';

        $label='<span class="label label-default label-many">Sin definir</span> ';

        if($this->estado=='A'){
            $label='<span class="label label-success label-many">Activo</span> ';
        }elseif($this->estado=='I'){
            $label='<span class="label label-danger label-many">Bloqueado</span> ';
        }elseif($this->estado=='P'){
            $label='<span class="label label-warning label-many">Pendiente</span> ';
        }

        return $label;
    }
}	
