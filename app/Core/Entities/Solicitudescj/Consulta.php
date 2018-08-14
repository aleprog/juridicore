<?php

namespace App\Core\Entities\Solicitudescj;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
	protected $connection = 'mysql_solicitudescj';

    protected $table = 'consultas';
}	
