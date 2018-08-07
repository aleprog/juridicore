<?php

namespace App\Core\Entities\Solicitudescj;

use Illuminate\Database\Eloquent\Model;

class Postulant extends Model
{
    protected $connection = 'mysql_solicitudescj';
    protected $append = ['status_label', 'created_at_es', 'status_request'];
	
	public function career()
	{
		return $this->belongsTo('App\Core\Entities\Solicitudescj\Career','career_id','id');
	}

	public function request()
	{
		return $this->belongsTo('App\Core\Entities\Solicitudescj\RequestPostulant','id','postulant_id');
	}

	public function getStatusLabelAttribute(){
		switch($this->request->state->abv)
		{
			case 'AU':
			return '<p class="label label-info">'.$this->request->state->descripcion.'<p>';

			break;
			case 'AP':
			return '<p class="label label-success">'.$this->request->state->descripcion.'<p>';

			break;
			case 'NE':
			return '<p class="label label-default">'.$this->request->state->descripcion.'<p>';

			break;
			case 'AB':
			return '<p class="label label-default">'.$this->request->state->descripcion.'<p>';

			break;
			case 'PE':
			return '<p class="label label-warning">'.$this->request->state->descripcion.'<p>';

			break;
			case 'AUI':
			return '<p class="label label-danger">'.$this->request->state->descripcion.'<p>';

			break;
		
		}
	}

	public function getStatusRequestAttribute(){
		return $this->request->state->descripcion;
	}

	public function getCreatedAtEsAttribute(){
		return $this->created_at->format('d-m-Y');
	}
}
