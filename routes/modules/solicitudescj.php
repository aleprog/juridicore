<?php

Route::get('admin/estudianteperfil', 'Solicitudescj\StudentController@estudianteperfil')->name('admin.estudianteperfil');
Route::post('registroP', 'Solicitudescj\RegistroController@registroP')->name('registroP');
Route::post('registroPP', 'Solicitudescj\RegistroController@registroPP')->name('registroPP');
Route::post('admin/estudianteasigna', 'Solicitudescj\StudentController@estudianteasigna')->name('admin.estudianteasignacion');

Route::post('supervisor', 'Solicitudescj\StudentController@supervisor');
Route::post('semanaEstudiaante', 'Solicitudescj\DocenteController@semanaEstudiaante');


Route::get('estudiante/actividadesEstudiante', 'Solicitudescj\StudentController@actividadesEstudiante')
->name('estudiante.actividadesEstudiante');
Route::get('datatableasistencias', 'Solicitudescj\StudentController@getDatatableAsistencia');
Route::get('datatablesemanas', 'Solicitudescj\StudentController@getDatatablesemanas');
Route::get('datatableObservaciones', 'Solicitudescj\DocenteController@getDatatableObservaciones');


Route::get('admin/estudianteperfil', 'Solicitudescj\StudentController@estudianteperfil')->name('admin.estudianteperfil');
Route::get('semanaImprime/{semana}', 'Solicitudescj\StudentController@semanaImprime')->name('student.semanaImprime');
Route::get('agregaActividad/{id}', 'Solicitudescj\StudentController@agregaActividad')->name('student.agregaActividad');
Route::post('estudiante/actividadSave', 'Solicitudescj\StudentController@actividadSave')->name('estudiante.actividadSave');

Route::get('supervisor/asistencia', 'Solicitudescj\DocenteController@index')
->name('supervisor.asistencia');	
Route::get('datatableAsistencia', 'Solicitudescj\DocenteController@datatableAsistencia');

Route::post('supervisor/asistenciaSave', 'Solicitudescj\DocenteController@asistenciaSave')
->name('supervisor.asistenciaSave');
Route::post('supervisor/observacionSave', 'Solicitudescj\DocenteController@observacionSave')
->name('supervisor.observacionSave');
Route::get('StateActividad/{id}', 'Solicitudescj\DocenteController@StateActividad')->name('docente.stateactividad');

Route::get('estudiante/clinica', 'Solicitudescj\StudentController@Clinica')->name('student.clinica');
Route::post('/upload', 'StorageController@fotosClinica');
Route::post('/DeleteFoto', 'StorageController@DeleteFoto')->name('student.deleteFoto');;

Route::get('estudiante/evaluacion', 'Solicitudescj\StudentController@evaluacion')->name('student.evaluacion');

Route::get('tutor/evaluacionSupervision', 'Solicitudescj\DocenteController@evaluacionSupervision')->name('tutor.evaluacionSupervision');
Route::get('datatableEvaluacionesTutor', 'Solicitudescj\DocenteController@datatableEvaluacionesTutor');
Route::post('tutor/evaluacionSave', 'Solicitudescj\DocenteController@evaluacionSave')
->name('tutor.evaluacionSave');
Route::get('imprimirEvaluacion/{id}', 'Solicitudescj\DocenteController@imprimirEvaluacion')->name('tutor.imprimirEvaluacion');


