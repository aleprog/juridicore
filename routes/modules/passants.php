<?php

	Route::get('admin/gestion/pasantes', 'Solicitudescj\PassantsController@index')
	->name('passants.index');

	Route::get('admin/gestion/pasantes/data', 'Solicitudescj\PassantsController@getDatatable')
	->name('passants.data');

	Route::get('admin/gestion/pasantes/{id}/gestion', 'Solicitudescj\PassantsController@show')
	->name('passants.show');

	Route::post('admin/gestion/pasantes/guardar', 'Solicitudescj\PassantsController@assignSteacherSupervisor')
	->name('passants.assignSteacherSupervisor');


	Route::get('admin/gestion/pansantes/supervisor/{id}/activar', 'Solicitudescj\PassantsController@activarSupervisor')
	->name('passants.activarSupervisor');

	