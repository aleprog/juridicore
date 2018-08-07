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
		if($this->request->state->abv=='IN'){
			return '<p class="label label-warning">'.$this->request->state->descripcion.'<p>';
		}elseif($this->request->state->abv=='AU'){
			return '<p class="label label-info">'.$this->request->state->descripcion.'<p>';
		}elseif($this->request->state->abv=='AP'){
			return '<p class="label label-success">'.$this->request->state->descripcion.'<p>';
		}elseif($this->request->state->abv=='PE'){
			return '<p class="label label-warning">'.$this->request->state->descripcion.'<p>';
		}elseif($this->request->state->abv=='AUI'){
			return '<p class="label label-danger">'.$this->request->state->descripcion.'<p>';
		}elseif($this->request->state->abv=='NE'){
			return '<p class="label label-danger">'.$this->request->state->descripcion.'<p>';
		}elseif($this->request->state->abv=='AB'){
			return '<p class="label label-danger">'.$this->request->state->descripcion.'<p>';
		}else{
			return '<p class="label label-default">'.$this->request->state->descripcion.'<p>';
		}

	}

	public function getStatusRequestAttribute(){
		return $this->request->state->descripcion;
	}

	public function getCreatedAtEsAttribute(){
		return $this->created_at->format('d-m-Y');
	}
}
