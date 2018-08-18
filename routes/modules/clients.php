<?php

Route::get('admin/clientes', 'Solicitudescj\ClientController@index')
	->name('clients.index');

	Route::get('admin/clientes/data', 'Solicitudescj\ClientController@getDatatable')
	->name('clients.data');

	Route::get('admin/clientes/data/consulta_asignacion/{id}', 'Solicitudescj\ClientController@getDatatableConsultaAsignacion')
	->name('clients.dataConsultaAsignacion');

	Route::get('admin/cliente/{id}', 'Solicitudescj\ClientController@edit')
	->name('clients.edit');

	Route::get('admin/cliente/{id}/gestion', 'Solicitudescj\ClientController@show')
	->name('clients.show');

	Route::get('admin/clientes/agregar', 'Solicitudescj\ClientController@create')
	->name('clients.create');

	Route::post('admin/clientes/guardar', 'Solicitudescj\ClientController@store')
	->name('clients.store');

	Route::put('admin/clientes/{id}/editar', 'Solicitudescj\ClientController@update')
	->name('clients.update');

	Route::put('admin/clientes/{id}/caso', 'Solicitudescj\ClientController@updateCaso')
	->name('clients.updateCaso');

	Route::get('admin/clientes/{id}/imprimir', 'Solicitudescj\ClientController@print')
	->name('clients.print');

	Route::post('admin/clientes/asignar/supervisor', 'Solicitudescj\ClientController@asignarSupervisor')
	->name('clients.asignarSupervisor');