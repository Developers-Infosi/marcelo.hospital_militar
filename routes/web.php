<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*


        /* Grupo de rotas autenticadas */
        Route::middleware(['auth'])->group(function () {

        /* Manager Dashboard  */
        route::get('/', ['as' => 'site.home', 'uses' => 'Admin\DashboardController@index']);

    Route::middleware([Admin::class])->group(function () {
        /* User */
        Route::get('admin/user/index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
        Route::get('admin/user/show/{id}', ['as' => 'admin.user.show', 'uses' => 'Admin\UserController@show'])->withoutMiddleware([Admin::class]);
        Route::get('admin/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit'])->withoutMiddleware([Admin::class]);
        Route::put('admin/user/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update'])->withoutMiddleware([Admin::class]);
        Route::get('admin/user/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@destroy']);
        /* end user */
});


        /** Patients*/
        Route::get('admin/pacientes/index', ['as' => 'admin.patients.index', 'uses' => 'Admin\PatientsController@index']);
        Route::get('admin/pacientes/show/{id}', ['as' => 'admin.patients.show', 'uses' => 'Admin\PatientsController@show']);
        Route::get('admin/pacientes/create', ['as' => 'admin.patients.create', 'uses' => 'Admin\PatientsController@create']);
        Route::post('admin/pacientes/store', ['as' => 'admin.patients.store', 'uses' => 'Admin\PatientsController@store']);
        Route::get('admin/pacientes/edit/{id}', ['as' => 'admin.patients.edit', 'uses' => 'Admin\PatientsController@edit']);
        Route::put('admin/pacientes/update/{id}', ['as' => 'admin.patients.update', 'uses' => 'Admin\PatientsController@update']);
        Route::get('admin/pacientes/ficha/{id}', ['as' => 'admin.patients.patientRecord', 'uses' => 'Admin\PatientsController@patientRecord']);
        Route::post('admin/pacientes/delete', ['as' => 'admin.patients.delete', 'uses' => 'Admin\PatientsController@destroy']);
        /** end  */

/**queryType  */
Route::get('admin/tipo-de-consultas/index', ['as' => 'admin.queryType.index', 'uses' => 'Admin\QueryTypeController@index']);
Route::get('admin/tipo-de-consultas/show/{id}', ['as' => 'admin.queryType.show', 'uses' => 'Admin\QueryTypeController@show']);
Route::get('admin/tipo-de-consultas/create', ['as' => 'admin.queryType.create', 'uses' => 'Admin\QueryTypeController@create']);
Route::post('admin/tipo-de-consultas/store', ['as' => 'admin.queryType.store', 'uses' => 'Admin\QueryTypeController@store']);
Route::get('admin/tipo-de-consultas/edit/{id}', ['as' => 'admin.queryType.edit', 'uses' => 'Admin\QueryTypeController@edit']);
Route::put('admin/tipo-de-consultas/update/{id}', ['as' => 'admin.queryType.update', 'uses' => 'Admin\QueryTypeController@update']);
Route::post('admin/tipo-de-consultas/delete', ['as' => 'admin.queryType.delete', 'uses' => 'Admin\QueryTypeController@destroy']);

/** end  queryType*/


/**queries  */
Route::get('admin/consultas/index', ['as' => 'admin.queries.index', 'uses' => 'Admin\QueriesController@index']);
Route::get('admin/consultas/show/{id}', ['as' => 'admin.queries.show', 'uses' => 'Admin\QueriesController@show']);
Route::get('admin/consultas/create/{id}', ['as' => 'admin.queries.create', 'uses' => 'Admin\QueriesController@create']);
Route::post('admin/consultas/store', ['as' => 'admin.queries.store', 'uses' => 'Admin\QueriesController@store']);
Route::get('admin/consultas/edit/{id}', ['as' => 'admin.queries.edit', 'uses' => 'Admin\QueriesController@edit']);
Route::put('admin/consultas/update/{id}', ['as' => 'admin.queries.update', 'uses' => 'Admin\QueriesController@update']);
Route::post('admin/consultas/delete', ['as' => 'admin.queries.delete', 'uses' => 'Admin\QueriesController@destroy']);
Route::get('admin/consultas/pesquisa', ['as' => 'admin.queries.search', 'uses' => 'Admin\QueriesController@search']);
Route::post('admin/consultas/validar-pesquisa', ['as' => 'admin.queries.validadeSearch', 'uses' => 'Admin\QueriesController@validadeSearch']);
/** end  queries*/





/**prescriptions  */
Route::get('admin/receitas/receita/{id}', ['as' => 'admin.prescriptions.revenue', 'uses' => 'Admin\PrescriptionController@revenue']);
Route::get('admin/receitas/index', ['as' => 'admin.prescriptions.index', 'uses' => 'Admin\PrescriptionController@index']);
Route::get('admin/receitas/show/{id}', ['as' => 'admin.prescriptions.show', 'uses' => 'Admin\PrescriptionController@show']);
Route::get('admin/receitas/create/{id}', ['as' => 'admin.prescriptions.create', 'uses' => 'Admin\PrescriptionController@create']);
Route::post('admin/receitas/store', ['as' => 'admin.prescriptions.store', 'uses' => 'Admin\PrescriptionController@store']);
Route::get('admin/receitas/edit/{id}', ['as' => 'admin.prescriptions.edit', 'uses' => 'Admin\PrescriptionController@edit']);
Route::put('admin/receitas/update/{id}', ['as' => 'admin.prescriptions.update', 'uses' => 'Admin\PrescriptionController@update']);
Route::post('admin/receitas/delete', ['as' => 'admin.prescriptions.delete', 'uses' => 'Admin\PrescriptionController@destroy']);
Route::get('admin/receitas/pesquisa', ['as' => 'admin.prescriptions.search', 'uses' => 'Admin\PrescriptionController@search']);
Route::post('admin/receitas/validar-pesquisa', ['as' => 'admin.prescriptions.validadeSearch', 'uses' => 'Admin\PrescriptionController@validadeSearch']);
/** end  prescriptions*/


/** screenings */
Route::get('admin/triagem/index', ['as' => 'admin.screenings.index', 'uses' => 'Admin\ScreeningController@index']);
Route::get('admin/triagem/show/{id}', ['as' => 'admin.screenings.show', 'uses' => 'Admin\ScreeningController@show']);
Route::get('admin/triagem/create/{id}', ['as' => 'admin.screenings.create', 'uses' => 'Admin\ScreeningController@create']);
Route::get('admin/triagem/ficha/{id}', ['as' => 'admin.screenings.screeningRecord', 'uses' => 'Admin\ScreeningController@screeningRecord']);
Route::post('admin/triagem/store', ['as' => 'admin.screenings.store', 'uses' => 'Admin\ScreeningController@store']);
Route::get('admin/triagem/edit/{id}', ['as' => 'admin.screenings.edit', 'uses' => 'Admin\ScreeningController@edit']);
Route::put('admin/triagem/update/{id}', ['as' => 'admin.screenings.update', 'uses' => 'Admin\ScreeningController@update']);
Route::post('admin/triagem/delete', ['as' => 'admin.screenings.delete', 'uses' => 'Admin\ScreeningController@destroy']);
Route::get('admin/triagem/screenings/{id}', ['as' => 'admin.screenings.searc', 'uses' => 'Admin\ScreeningController@screenings']);
Route::get('admin/triagem/pesquisa', ['as' => 'admin.screenings.search', 'uses' => 'Admin\ScreeningController@search']);
Route::post('admin/triagem/validar-pesquisa', ['as' => 'admin.screenings.validadeSearch', 'uses' => 'Admin\ScreeningController@validadeSearch']);
Route::get('admin/triagem/GetSubCatAgainstMainCatEdit/{id}', ['as' => 'admin.screenings', 'uses' => 'Admin\ScreeningController@GetSubCatAgainstMainCatEdit']);
/** end screenings  */

        /** Nurses*/
        Route::get('admin/enfermeiros/index', ['as' => 'admin.nurses.index', 'uses' => 'Admin\NursesController@index']);
        Route::get('admin/enfermeiros/show/{id}', ['as' => 'admin.nurses.show', 'uses' => 'Admin\NursesController@show']);
        Route::get('admin/enfermeiros/create', ['as' => 'admin.nurses.create', 'uses' => 'Admin\NursesController@create']);
        Route::post('admin/enfermeiros/store', ['as' => 'admin.nurses.store', 'uses' => 'Admin\NursesController@store']);
        Route::get('admin/enfermeiros/edit/{id}', ['as' => 'admin.nurses.edit', 'uses' => 'Admin\NursesController@edit']);
        Route::put('admin/enfermeiros/update/{id}', ['as' => 'admin.nurses.update', 'uses' => 'Admin\NursesController@update']);
        Route::post('admin/enfermeiros/delete', ['as' => 'admin.nurses.delete', 'uses' => 'Admin\NursesController@destroy']);
        /* end Nurses */

        /** Doctors*/
        Route::get('admin/doctores/index', ['as' => 'admin.doctors.index', 'uses' => 'Admin\DoctorsController@index']);
        Route::get('admin/doctores/show/{id}', ['as' => 'admin.doctors.show', 'uses' => 'Admin\DoctorsController@show']);
        Route::get('admin/doctores/create', ['as' => 'admin.doctors.create', 'uses' => 'Admin\DoctorsController@create']);
        Route::post('admin/doctores/store', ['as' => 'admin.doctors.store', 'uses' => 'Admin\DoctorsController@store']);
        Route::get('admin/doctores/edit/{id}', ['as' => 'admin.doctors.edit', 'uses' => 'Admin\DoctorsController@edit']);
        Route::put('admin/doctores/update/{id}', ['as' => 'admin.doctors.update', 'uses' => 'Admin\DoctorsController@update']);
        Route::post('admin/doctores/delete', ['as' => 'admin.doctors.delete', 'uses' => 'Admin\DoctorsController@destroy']);
        /* end Doctors */

        /** Doctors Specialtie*/
        Route::get('admin/doctores-especialidade/index', ['as' => 'admin.doctorspecialties.index', 'uses' => 'Admin\DoctorSpecialtiesController@index']);
        Route::get('admin/doctores-especialidade/show/{id}', ['as' => 'admin.doctorspecialties.show', 'uses' => 'Admin\DoctorSpecialtiesController@show']);
        Route::get('admin/doctores-especialidade/create', ['as' => 'admin.doctorspecialties.create', 'uses' => 'Admin\DoctorSpecialtiesController@create']);
        Route::post('admin/doctores-especialidade/store', ['as' => 'admin.doctorspecialties.store', 'uses' => 'Admin\DoctorSpecialtiesController@store']);
        Route::get('admin/doctores-especialidade/edit/{id}', ['as' => 'admin.doctorspecialties.edit', 'uses' => 'Admin\DoctorSpecialtiesController@edit']);
        Route::put('admin/doctores-especialidade/update/{id}', ['as' => 'admin.doctorspecialties.update', 'uses' => 'Admin\DoctorSpecialtiesController@update']);
        Route::post('admin/doctores-especialidade/delete', ['as' => 'admin.doctorspecialties.delete', 'uses' => 'Admin\DoctorSpecialtiesController@destroy']);
        /* end Doctors */



        /* End Exam types*/


        /* imageGallery */
        Route::get('admin/imageGallery/create/{id}', ['as' => 'admin.imageGallery.create', 'uses' => 'Admin\ImageGalleryController@create']);
        Route::post('admin/imageGallery/store/{id}', ['as' => 'admin.imageGallery.store', 'uses' => 'Admin\ImageGalleryController@store']);

        Route::get('admin/imageGallery/delete/{id}', ['as' => 'admin.imageGallery.delete', 'uses' => 'Admin\ImageGalleryController@destroy']);
        /* End imageGallery */




   /** Exam Types */
   Route::get('admin/tipo-de-exames/index', ['as' => 'admin.examtypes.index', 'uses' => 'Admin\ExamTypeController@index']);
   Route::get('admin/tipo-de-exames/show/{id}', ['as' => 'admin.examtypes.show', 'uses' => 'Admin\ExamTypeController@show']);
   Route::get('admin/tipo-de-exames/create', ['as' => 'admin.examtypes.create', 'uses' => 'Admin\ExamTypeController@create']);
   Route::post('admin/tipo-de-exames/store', ['as' => 'admin.examtypes.store', 'uses' => 'Admin\ExamTypeController@store']);
   Route::get('admin/tipo-de-exames/edit/{id}', ['as' => 'admin.examtypes.edit', 'uses' => 'Admin\ExamTypeController@edit']);
   Route::put('admin/tipo-de-exames/update/{id}', ['as' => 'admin.examtypes.update', 'uses' => 'Admin\ExamTypeController@update']);
   Route::post('admin/tipo-de-exames/delete', ['as' => 'admin.examtypes.delete', 'uses' => 'Admin\ExamTypeController@destroy']);
   /* end examtypes



        /** Doctors*/
        Route::get('admin/doctores/index', ['as' => 'admin.doctors.index', 'uses' => 'Admin\DoctorsController@index']);
        Route::get('admin/doctores/show/{id}', ['as' => 'admin.doctors.show', 'uses' => 'Admin\DoctorsController@show']);
        Route::get('admin/doctores/create', ['as' => 'admin.doctors.create', 'uses' => 'Admin\DoctorsController@create']);
        Route::post('admin/doctores/store', ['as' => 'admin.doctors.store', 'uses' => 'Admin\DoctorsController@store']);
        Route::get('admin/doctores/edit/{id}', ['as' => 'admin.doctors.edit', 'uses' => 'Admin\DoctorsController@edit']);
        Route::put('admin/doctores/update/{id}', ['as' => 'admin.doctors.update', 'uses' => 'Admin\DoctorsController@update']);
        Route::post('admin/doctores/delete', ['as' => 'admin.doctors.delete', 'uses' => 'Admin\DoctorsController@destroy']);
        /* end Doctors */


/** exams */
Route::get('admin/exames/index', ['as' => 'admin.exams.index', 'uses' => 'Admin\ExamController@index']);
Route::get('admin/exames/show/{id}', ['as' => 'admin.exams.show', 'uses' => 'Admin\ExamController@show']);
Route::get('admin/exames/create/{id}', ['as' => 'admin.exams.create', 'uses' => 'Admin\ExamController@create']);
Route::post('admin/exames/store', ['as' => 'admin.exams.store', 'uses' => 'Admin\ExamController@store']);
Route::get('admin/exames/edit/{id}', ['as' => 'admin.exams.edit', 'uses' => 'Admin\ExamController@edit']);
Route::put('admin/exames/update/{id}', ['as' => 'admin.exams.update', 'uses' => 'Admin\ExamController@update']);
Route::post('admin/exames/delete', ['as' => 'admin.exams.delete', 'uses' => 'Admin\ExamController@destroy']);
Route::get('admin/exames/pesquisa', ['as' => 'admin.exams.search', 'uses' => 'Admin\ExamController@search']);
Route::post('admin/exames/validar-pesquisa', ['as' => 'admin.exams.validadeSearch', 'uses' => 'Admin\ExamController@validadeSearch']);
/** end  exams */









/**departamento  */
Route::get('admin/departamneto/index', ['as' => 'admin.departments.index', 'uses' => 'Admin\DepartmentController@index']);
Route::get('admin/departamneto/show/{id}', ['as' => 'admin.departments.show', 'uses' => 'Admin\DepartmentController@show']);
Route::get('admin/departamneto/create', ['as' => 'admin.departments.create', 'uses' => 'Admin\DepartmentController@create']);
Route::post('admin/departamneto/store', ['as' => 'admin.departments.store', 'uses' => 'Admin\DepartmentController@store']);
Route::get('admin/departamneto/edit/{id}', ['as' => 'admin.departments.edit', 'uses' => 'Admin\DepartmentController@edit']);
Route::put('admin/departamneto/update/{id}', ['as' => 'admin.departments.update', 'uses' => 'Admin\DepartmentController@update']);
Route::post('admin/departamneto/delete', ['as' => 'admin.departments.delete', 'uses' => 'Admin\DepartmentController@destroy']);

/** end  departamento*/






/**cargo  */
Route::get('admin/cargo/index', ['as' => 'admin.positions.index', 'uses' => 'Admin\PositionController@index']);
Route::get('admin/cargo/show/{id}', ['as' => 'admin.positions.show', 'uses' => 'Admin\PositionController@show']);
Route::get('admin/cargo/create', ['as' => 'admin.positions.create', 'uses' => 'Admin\PositionController@create']);
Route::post('admin/cargo/store', ['as' => 'admin.positions.store', 'uses' => 'Admin\PositionController@store']);
Route::get('admin/cargo/edit/{id}', ['as' => 'admin.positions.edit', 'uses' => 'Admin\PositionController@edit']);
Route::put('admin/cargo/update/{id}', ['as' => 'admin.positions.update', 'uses' => 'Admin\PositionController@update']);
Route::post('admin/cargo/delete', ['as' => 'admin.positions.delete', 'uses' => 'Admin\PositionController@destroy']);

/** end  cargo*/






/**nivel academico  */
Route::get('admin/habilitacao-literario/index', ['as' => 'admin.literary_abilities.index', 'uses' => 'Admin\LiteraryAbilitieController@index']);
Route::get('admin/habilitacao-literario/show/{id}', ['as' => 'admin.literary_abilities.show', 'uses' => 'Admin\LiteraryAbilitieController@show']);
Route::get('admin/habilitacao-literario/create', ['as' => 'admin.literary_abilities.create', 'uses' => 'Admin\LiteraryAbilitieController@create']);
Route::post('admin/habilitacao-literario/store', ['as' => 'admin.literary_abilities.store', 'uses' => 'Admin\LiteraryAbilitieController@store']);
Route::get('admin/habilitacao-literario/edit/{id}', ['as' => 'admin.literary_abilities.edit', 'uses' => 'Admin\LiteraryAbilitieController@edit']);
Route::put('admin/habilitacao-literario/update/{id}', ['as' => 'admin.literary_abilities.update', 'uses' => 'Admin\LiteraryAbilitieController@update']);
Route::post('admin/habilitacao-literario/delete', ['as' => 'admin.literary_abilities.delete', 'uses' => 'Admin\LiteraryAbilitieController@destroy']);

/** end  nivel academico*/



/**Tipo de Contrato  */
Route::get('admin/tipo-contrato/index', ['as' => 'admin.contracts_types.index', 'uses' => 'Admin\ContractsTypesController@index']);
Route::get('admin/tipo-contrato/show/{id}', ['as' => 'admin.contracts_types.show', 'uses' => 'Admin\ContractsTypesController@show']);
Route::get('admin/tipo-contrato/create', ['as' => 'admin.contracts_types.create', 'uses' => 'Admin\ContractsTypesController@create']);
Route::post('admin/tipo-contrato/store', ['as' => 'admin.contracts_types.store', 'uses' => 'Admin\ContractsTypesController@store']);
Route::get('admin/tipo-contrato/edit/{id}', ['as' => 'admin.contracts_types.edit', 'uses' => 'Admin\ContractsTypesController@edit']);
Route::put('admin/tipo-contrato/update/{id}', ['as' => 'admin.contracts_types.update', 'uses' => 'Admin\ContractsTypesController@update']);
Route::post('admin/tipo-contrato/delete', ['as' => 'admin.contracts_types.delete', 'uses' => 'Admin\ContractsTypesController@destroy']);

/** end  Tipo de Contrato*/





/**employees_types  */
Route::get('admin/tipo-funcionario/index', ['as' => 'admin.employees_types.index', 'uses' => 'Admin\EmployeesTypeController@index']);
Route::get('admin/tipo-funcionario/show/{id}', ['as' => 'admin.employees_types.show', 'uses' => 'Admin\EmployeesTypeController@show']);
Route::get('admin/tipo-funcionario/create', ['as' => 'admin.employees_types.create', 'uses' => 'Admin\EmployeesTypeController@create']);
Route::post('admin/tipo-funcionario/store', ['as' => 'admin.employees_types.store', 'uses' => 'Admin\EmployeesTypeController@store']);
Route::get('admin/tipo-funcionario/edit/{id}', ['as' => 'admin.employees_types.edit', 'uses' => 'Admin\EmployeesTypeController@edit']);
Route::put('admin/tipo-funcionario/update/{id}', ['as' => 'admin.employees_types.update', 'uses' => 'Admin\EmployeesTypeController@update']);
Route::post('admin/tipo-funcionario/delete', ['as' => 'admin.employees_types.delete', 'uses' => 'Admin\EmployeesTypeController@destroy']);

/** end  employees_types*/






/** funcionario */
Route::get('admin/funcionario/index', ['as' => 'admin.employees.index', 'uses' => 'Admin\EmployeeController@index']);
Route::get('admin/funcionario/show/{id}', ['as' => 'admin.employees.show', 'uses' => 'Admin\EmployeeController@show']);
Route::get('admin/funcionario/create', ['as' => 'admin.employees.create', 'uses' => 'Admin\EmployeeController@create']);
Route::post('admin/funcionario/store', ['as' => 'admin.employees.store', 'uses' => 'Admin\EmployeeController@store']);
Route::get('admin/funcionario/edit/{id}', ['as' => 'admin.employees.edit', 'uses' => 'Admin\EmployeeController@edit']);
Route::put('admin/funcionario/update/{id}', ['as' => 'admin.employees.update', 'uses' => 'Admin\EmployeeController@update']);
Route::post('admin/funcionario/delete', ['as' => 'admin.employees.delete', 'uses' => 'Admin\EmployeeController@destroy']);
/** end  funcionario */




});


/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';
