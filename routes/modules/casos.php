<?php

	Route::get('admin/casos', 'Solicitudescj\CasosController@index')
	->name('casos.index');

	Route::get('admin/casos/data', 'Solicitudescj\CasosController@getDatatable')
	->name('casos.data');

	Route::get('admin/casos/{id}/gestion', 'Solicitudescj\CasosController@show')
	->name('casos.show');

	Route::put('admin/casos/{id}/caso', 'Solicitudescj\CasosController@updateCaso')
	->name('casos.updateCaso');

	Route::get('admin/casos/{id}/imprimir', 'Solicitudescj\CasosController@print')
	->name('casos.print');

	Route::get('admin/casos/{id}/imprimir_cedula', 'Solicitudescj\CasosController@printCedula')
	->name('casos.printCedula');
