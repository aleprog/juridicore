<?php

namespace App\Core\Entities\Solicitudescj;

use Illuminate\Database\Eloquent\Model;

class RequestPostulant extends Model
{
	    protected $table='requests';
        protected $connection = 'mysql_solicitudescj';

    public function state()
	{
		return $this->belongsTo('App\Core\Entities\Solicitudescj\State','state_id','id');
	}

}


