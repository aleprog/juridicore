<?php

namespace App\Core\Entities\Solicitudescj;

use Illuminate\Database\Eloquent\Model;

class evaluacionSup extends Model
{
    protected $connection = 'mysql_solicitudescj';
    protected $table = 'evaluacionsupervisor';
}
