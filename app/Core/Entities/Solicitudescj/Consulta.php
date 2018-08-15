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

	public function getCreatedAtEsAttribute(){
		return $this->created_at->format('d-m-Y');
	}

	public function getCreatedAtEnAttribute(){
		return $this->created_at->format('d-m-Y');
	}
}	
