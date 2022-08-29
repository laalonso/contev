<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','controller@welcome');

Route::get('aviso', function () {
    return view('aviso_privacidad');
})->name('aviso');

Route::get('contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('acerca', function () {
    return view('acerca');
})->name('acerca');

Route::get('universidades','controller@universidades')->name('registradas');
Route::get('universidades/servicios/{universidad_id}','controller@servicios');
Route::post('contacto','controller@contacto')->name('contacto');


Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@inicio')->name('inicio');
    Route::get('/editarPassword','HomeController@editarPassword');
    Route::post('/actualizarPassword','HomeController@actualizarPassword');
//-------------------------Encargado de empresa-------------------------
            Route::resource('enterprise/services','Root\EnterpriseServiceController')->middleware('encargadoempresa');
            
            /////trabajando en este.
            
             Route::resource('enterprise/servicess','Root\CompanyController')->middleware('encargadoempresa');
            
            
            Route::resource('enterprise/vacancies','Root\VacancieController')->middleware('encargadoempresa');
            Route::get('enterprise/universidades/lista','Root\StudentController@listaUniversidades')->middleware('encargadoempresa');
            Route::get('enterprise/universidades/proyectos/','Root\ProjectUniversityController@listaProyectosuniversidad')->middleware('encargadoempresa');
    
          // Route::get('enterprise/universidades/proyectos','Root\StudentController@listaProyectosempresa')->middleware('encargadoempresa');
           Route::get('enterprise/projects/details/{project_id}','Root\ProjectUniversityController@detalles')->middleware('encargadoempresa');
            Route::get('enterprise/universidades/servicios','Root\StudentController@listaServiciosUniversidad')->middleware('encargadoempresa');
            ///Agrgador para la solicitud
            Route::get('enterprise/universidades/servicios/postular/{servicio_id}','Root\StudentController@postularServiciosuni')->middleware('encargadoempresa');
            Route::get('enterprise/universidades/servicios/listapostulacionesuni','Root\StudentController@listaServiciosPostulacionesuni')->middleware('encargadoempresa');
               
            Route::get('enterprise/postulaciones/listapostulacion','Root\StudentController@listaPostulaciones')->middleware('encargadoempresa');
            
            /// ACTUALIZAR PERFIL DE EMPRESA 
            
         Route::resource('empresas','Root\CompaniController')->middleware('encargadoempresa');    
          Route::post('enterprise/perfil/actualizar','Root\CompaniController@actualizarPf')->middleware('encargadoempresa');
        ///proyectos de cada universidad    
        Route::get('enterprise/projects/lista/{id_universidad}','Root\UniversityController@listaproyectosuni')->middleware('encargadoempresa');
        //servicios de cada universidad
         Route::get('enterprise/services/lista/{id_universidad}','Root\UniversityServiceController@listaserviciouni')->middleware('encargadoempresa');
         
         
         ///Lista servicios universidades postuladas
            Route::get('enterprise/services/universidades/postuladas/{servicio_id}','Root\EnterpriseServiceController@listaUniversidadesPostuladas')->middleware('encargadoempresa');
         
          ///Lista vacantes universidades postuladas
           Route::get('enterprise/vacancies/universidades/postuladas/{vacante_id}','Root\VacancieController@listaVacantePostuladas')->middleware('encargadoempresa'); 
           
            //Lista para buscar candidato
              Route::resource('enterprise/studentss','Root\LearnerController')->middleware('encargadoempresa');
           Route::get('enterprise/estudiante/listaEvaluaciones/{estudiante_id}','Root\LearnerController@listaEvaluaciones')->middleware('encargadoempresa');
     
    
//-------------------------Encargado de universidad-------------------------
    Route::resource('university/services','Root\UniversityServiceController')->middleware('encargado');
            Route::get('university/services/empresas/postuladas/{servicio_id}','Root\UniversityServiceController@listaEmpresasPostuladas')->middleware('encargado');
            Route::post('university/services/equipment','EquipmentServiceController@agregarEquipo')->middleware('encargado');
                Route::post('university/services/equipment/cargarImagen','EquipmentServiceController@cargarImagen')->middleware('encargado');
                Route::get('university/services/equipment/galeria/{servicio_id}','EquipmentServiceController@galeria')->middleware('encargado');
                Route::post('university/services/equipment/galeria/imagen/eliminar','EquipmentServiceController@eliminarImagen')->middleware('encargado');
            Route::post('university/services/personal','EquipmentServiceController@agregarPersonal')->middleware('encargado');
            Route::get('university/services/laboratorio/detalles/{service_id}','EquipmentServiceController@laboratorioDetalles')->middleware('encargado');
            Route::get('university/services/laboratorio/personal/editar/{personal_id}','EquipmentServiceController@editarPersonal')->middleware('encargado');
            Route::post('university/services/laboratorio/personal/actualizar','EquipmentServiceController@actualizarPersonal')->middleware('encargado');
            Route::post('university/services/laboratorio/personal/eliminar','EquipmentServiceController@eliminarPersonal')->middleware('encargado');
            Route::post('university/services/laboratorio/equipo/actualizar','EquipmentServiceController@actualizarEquipo')->middleware('encargado');
            Route::get('university/perfil','Root\UniversityController@perfil')->middleware('encargado');
            Route::post('university/perfil/actualizarLogo','Root\UniversityController@actualizarLogo')->middleware('encargado');
            Route::post('university/perfil/actualizarBanner','Root\UniversityController@actualizarBanner')->middleware('encargado');
            Route::post('university/perfil/actualizarPortada','Root\UniversityController@actualizarPortada')->middleware('encargado');

    Route::resource('university/projects','Root\ProjectUniversityController')->middleware('encargado');
            Route::get('university/projects/addStudent/{projet_id}','Root\ProjectUniversityController@addStudent')->middleware('encargado');
            Route::get('university/projects/addStudent/save/{project_id}/{student_id}','Root\ProjectUniversityController@saveStudentProject')->middleware('encargado');
            Route::get('university/projects/details/{project_id}','Root\ProjectUniversityController@detalles')->middleware('encargado');
    
    Route::resource('university/lineas','LineasController')->middleware('encargado');
      
            
    Route::resource('university/students','Root\StudentController')->middleware('encargado');
    
            Route::get('university/estudiante/listaEvaluaciones/{estudiante_id}','Root\StudentController@listaEvaluaciones')->middleware('encargado');
          ///
            Route::get('university/estudiante/vacancies/{estudiante_id}','Root\StudentController@listaVacantesEstudiante')->middleware('encargado');
            
            Route::get('university/empresas/lista','Root\StudentController@listaEmpresas')->middleware('encargado');
            Route::get('university/empresas/vacantes','Root\StudentController@listaVacantes')->middleware('encargado');
            Route::get('university/empresas/proyectos','Root\StudentController@listaProyectos')->middleware('encargado');
            Route::get('university/empresas/servicios','Root\StudentController@listaServicios')->middleware('encargado');
            Route::get('university/empresas/servicios/listapostulaciones','Root\StudentController@listaServiciosPostulaciones')->middleware('encargado');
            Route::get('university/empresas/servicios/postular/{servicio_id}','Root\StudentController@postularServicios')->middleware('encargado');
//---------------------Rutas de los estudiantes--------------------------
    Route::resource('estudiantes','Root\StudentEvaluationController')->middleware('estudiante');
    //este
        Route::post('estudiantes/cv/actualizar','Root\StudentEvaluationController@actualizarCv')->middleware('estudiante');
        Route::get('estudiantes/lista/postulaciones','Root\StudentEvaluationController@listaPostulaciones')->middleware('estudiante');
        Route::get('estudiantes/evaluaciones/lista','Root\StudentEvaluationController@listaEvaluaciones')->middleware('estudiante');
        Route::get('estudiantes/empresas/lista','Root\StudentEvaluationController@listaEmpresas')->middleware('estudiante');
        Route::get('estudiantes/empresas/vacantes','Root\StudentEvaluationController@listavacantes')->middleware('estudiante');
        //este
        Route::get('estudiantes/empresas/vacantes/postular/{vacante_id}','Root\StudentEvaluationController@postularVacante')->middleware('estudiante');
    Route::resource('estudiante/test','Root\TestController')->middleware('estudiante');
    

    //////////////////////////// ROOT ///////////////////////////
    Route::group(['middleware' => ['root']], function () {
        Route::get('/inicio', 'HomeController@index')->name('home');

        Route::prefix('root')->group(function () {
        

            Route::prefix('user')->group(function () {
                Route::resources([
                    'all' => 'Root\UserController',
                ]);
            });

            Route::prefix('rol')->group(function () {
                Route::resources([
                    'all' => 'Root\RoleController',
                ]);
            });

Route::prefix('university')->group(function () {
                Route::resources([
                    'all' => 'Root\UniversityController',
                    'systems' => 'Root\SystemController',
                ]);
              //  Route::get('/studentevaluations/create2/{student}', 'Root\StudentEvaluationController@create');
//Ruta para la asignación de encargado de la univesidad
                Route::get('/encargado/{id_universidad}','Root\UniversityController@asignarEncargado');
//Ruta para guardar el encargado de la universidad
                Route::get('/encargado/{id_user}/{id_universidad}/','Root\UniversityController@guardarEncargado');
//Ruta para mostrar la lista de encargados de las universidades
                Route::get('/encargados','Root\UniversityController@listaEncargados');
//Ruta para eliminar encargados de las universidades
                Route::get('/encargado/universidad/eliminar/{id_encargado}','Root\UniversityController@EliminarEncargado');
                
                Route::get('/services/list/{instituion_id}','Root\UniversityController@listarServicios');
                Route::get('/projects/list/{instituion_id}','Root\UniversityController@listarProyectos');
                Route::get('/students/list/{instituion_id}','Root\UniversityController@listarEstudiantes');
                Route::get('/registro','Root\UniversityController@registradas');
                Route::get('/services/laboratorio/detalles/{service_id}','Root\UniversityController@laboratorioDetalles');
                Route::get('/services/laboratorio/detalles/personal/pdf/{service_id}','Root\UniversityController@personalEspecializadoPDF');
                Route::get('/services/laboratorio/detalles/equipo/pdf/{service_id}','Root\UniversityController@equipoEspecializadoPDF');
            Route::resource('/notificaciones','AdminNotificacionsController');
                Route::get('/notificaciones/filtro/{filtro}','AdminNotificacionsController@filtro');
                Route::get('/notificaciones/marcar/leidas','AdminNotificacionsController@marcarLeidas');
                Route::get('/notificaciones/ver/{notificacion_id}','AdminNotificacionsController@verNotificacion');

            });
            
        //// Codigo de empresas    
        Route::prefix('enterprise')->group(function () {
                Route::resources([
                    'all' => 'Root\EnterpriseController',
                      'systems' => 'Root\SystemController',
                      //'vacancies' =>'Root\VacancieController',
                    //   'enterpriseservices' =>'Root\EnterpriseServiceController',
                ]);
                 //  Route::get('/studentevaluations/create2/{student}', 'Root\StudentEvaluationController@create');
                 
//Ruta para la lista  de  univesidad proyectos
             ///   Route::get('/encargadoempresa/{id_universidad}','Root\UniversityController@listarProyecto');                 
                 
//Ruta para la asignación de encargado de la empresa
                Route::get('/encargadoempresa/{id_empresa}','Root\EnterpriseController@asignarEncargado');
//Ruta para guardar el encargado de la empresa
                Route::get('/encargadoempresa/{id_user}/{id_empresa}/','Root\EnterpriseController@guardarEncargado');
//Ruta para mostrar la lista de encargados de las empresas
                Route::get('/encargadoss','Root\EnterpriseController@listaEncargados');
       
     //Ruta para eliminar encargados de las empresass
                Route::get('/encargado/empresa/eliminar/{id_encargado}','Root\EnterpriseController@EliminarEncargado');
          
                 
            });
      



        ///agregar direccion de la empresa    
             Route::prefix('addressenterprise')->group(function () {
                Route::resources([
                    'all' => 'Root\AddressEnterpriseController',
                ]);
                Route::get('/all/create2/{enterprise}', 'Root\AddressEnterpriseController@create');
                Route::get('/viewmunicipalities', 'Root\AddressEnterpriseController@viewmunicipalities');
                Route::get('/viewlocations', 'Root\AddressEnterpriseController@viewlocations');
            });
           
           //fin de codigo
            /////** fin
 
     ////// Sociedad orgainizada////

         Route::prefix('sociedadorganizada')->group(function () {
        Route::resources([
            'all' => 'Root\SocietyController',          
        ]);
       
         
    });





        });
    });

});