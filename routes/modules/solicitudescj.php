<?php

Route::get('admin/estudianteperfil', 'Solicitudescj\StudentController@estudianteperfil')->name('admin.estudianteperfil');
Route::post('registroP', 'Solicitudescj\RegistroController@registroP')->name('registroP');
Route::post('registroPP', 'Solicitudescj\RegistroController@registroPP')->name('registroPP');
Route::post('admin/estudianteasigna', 'Solicitudescj\StudentController@estudianteasigna')->name('admin.estudianteasignacion');

Route::post('supervisor', 'Solicitudescj\StudentController@supervisor');

Route::get('estudiante/actividadesEstudiante', 'Solicitudescj\StudentController@actividadesEstudiante')->name('estudiante.actividadesEstudiante');
Route::get('datatableasistencias', 'Solicitudescj\StudentController@getDatatableAsistencia');
Route::get('datatablesemanas', 'Solicitudescj\StudentController@getDatatablesemanas');

Route::get('admin/estudianteperfil', 'Solicitudescj\StudentController@estudianteperfil')->name('admin.estudianteperfil');
Route::get('semanaImprime/{semana}', 'Solicitudescj\StudentController@semanaImprime')->name('student.semanaImprime');
Route::get('agregaActividad/{id}', 'Solicitudescj\StudentController@agregaActividad')->name('student.agregaActividad');
Route::post('estudiante/actividadSave', 'Solicitudescj\StudentController@actividadSave')->name('estudiante.actividadSave');


	



