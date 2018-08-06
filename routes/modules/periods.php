<?php

Route::get('admin/gestion/periodos', 'Solicitudescj\PeriodController@index')
	->name('periods.index');

	Route::get('admin/gestion/periodos/data', 'Solicitudescj\PeriodController@getDatatable')
	->name('periods.data');

	Route::get('admin/gestion/{id}/periodos', 'Solicitudescj\PeriodController@show')
	->name('periods.show');

	Route::get('admin/gestion/periodos/agregar', 'Solicitudescj\PeriodController@create')
	->name('periods.create');

	Route::post('admin/gestion/periodos/guardar', 'Solicitudescj\PeriodController@store')
	->name('periods.store');

	Route::put('admin/gestion/{id}/periodos/editar', 'Solicitudescj\PeriodController@update')
	->name('periods.update');