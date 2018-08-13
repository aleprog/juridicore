<?php

Route::get('admin/clientes', 'Solicitudescj\ClientController@index')
	->name('clients.index');

	Route::get('admin/clientes/data', 'Solicitudescj\ClientController@getDatatable')
	->name('clients.data');

	Route::get('admin/cliente/{id}', 'Solicitudescj\ClientController@show')
	->name('clients.show');

	Route::get('admin/clientes/agregar', 'Solicitudescj\ClientController@create')
	->name('clients.create');

	Route::post('admin/clientes/guardar', 'Solicitudescj\ClientController@store')
	->name('clients.store');

	Route::put('admin/clientes/{id}/editar', 'Solicitudescj\ClientController@update')
	->name('clients.update');