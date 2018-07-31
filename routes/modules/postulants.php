<?php

	Route::get('admin/postulantes', 'Solicitudescj\PostulantController@index')
	->name('porstulants.index');

	Route::get('admin/postulantes/data', 'Solicitudescj\PostulantController@getDatatable')
	->name('porstulants.data');

	Route::get('admin/postulante/{id}/gestion', 'Solicitudescj\PostulantController@show')
	->name('porstulants.show');

	Route::post('admin/postulante/estatus', 'Solicitudescj\PostulantController@statusRequest')
	->name('porstulants.statusRequest');
