<?php

namespace App\Core\Entities\Solicitudescj;

use Illuminate\Database\Eloquent\Model;

class Postulant extends Model
{
    protected $connection = 'mysql_solicitudescj';
	
	public function career()
	{
		return $this->belongsTo('App\Core\Entities\Solicitudescj\Career','career_id','id');
	}

	public function request()
	{
		return $this->belongsTo('App\Core\Entities\Solicitudescj\RequestPostulant','id','postulant_id');
	}
}
