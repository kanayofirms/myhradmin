<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;
use App\Http\Controllers\Backend\JobsController;
use App\Http\Controllers\Backend\JobHistoryController;
use App\Http\Controllers\Backend\JobGradesController;
use App\Http\Controllers\Backend\RegionsController;
use App\Http\Controllers\Backend\CountriesController;
use App\Http\Controllers\Backend\LocationsController;
use App\Http\Controllers\Backend\DepartmentsController;
use App\Http\Controllers\Backend\ManagerController;
use App\Http\Controllers\Backend\MyAccountController;
use App\Http\Controllers\Backend\PayrollController;
use App\Http\Controllers\Backend\PositionController;



















/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'CheckEmail']);

Route::post('login_post', [AuthController::class, 'login_post']);

// Admin || HR

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/employees', [EmployeesController::class, 'index']);
    Route::get('admin/employees/add', [EmployeesController::class, 'add']);
    Route::post('admin/employees/add', [EmployeesController::class, 'add_post']);
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view']);
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeesController::class, 'edit_update']);
    Route::get('admin/employees/delete/{id}', [EmployeesController::class, 'delete']);

    //Image Delete
    Route::get('admin/employees/image_delete/{id}', [EmployeesController::class, 'image_delete']);

    //Job Side

    Route::get('admin/jobs', [JobsController::class, 'index']);
    Route::get('admin/jobs/add', [JobsController::class, 'add']);
    Route::post('admin/jobs/add', [JobsController::class, 'add_post']);
    Route::get('admin/jobs/view/{id}', [JobsController::class, 'view']);
    Route::get('admin/jobs/edit/{id}', [JobsController::class, 'edit']);
    Route::post('admin/jobs/edit/{id}', [JobsController::class, 'edit_update']);
    Route::get('admin/jobs/delete/{id}', [JobsController::class, 'delete']);
    Route::get('admin/jobs_export', [JobsController::class, 'jobs_export']);

    //Job History

    Route::get('admin/job_history', [JobHistoryController::class, 'index']);
    Route::get('admin/job_history/add', [JobHistoryController::class, 'add']);
    Route::post('admin/job_history/add', [JobHistoryController::class, 'add_post']);
    Route::get('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit']);
    Route::post('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit_update']);
    Route::get('admin/job_history/delete/{id}', [JobHistoryController::class, 'delete']);

    Route::get('admin/job_history_export', [JobHistoryController::class, 'job_history_export']);

    //Job Grades

    Route::get('admin/job_grades', [JobGradesController::class, 'index']);
    Route::get('admin/job_grades/add', [JobGradesController::class, 'add']);
    Route::post('admin/job_grades/add', [JobGradesController::class, 'add_post']);
    Route::get('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit']);
    Route::post('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit_update']);
    Route::get('admin/job_grades/delete/{id}', [JobGradesController::class, 'delete']);

    //Regions

    Route::get('admin/regions', [RegionsController::class, 'index']);
    Route::get('admin/regions/add', [RegionsController::class, 'add']);
    Route::post('admin/regions/add', [RegionsController::class, 'add_post']);
    Route::get('admin/regions/edit/{id}', [RegionsController::class, 'edit']);
    Route::post('admin/regions/edit/{id}', [RegionsController::class, 'edit_update']);
    Route::get('admin/regions/delete/{id}', [RegionsController::class, 'delete']);

    //Countries

    Route::get('admin/countries', [CountriesController::class, 'index']);
    Route::get('admin/countries/add', [CountriesController::class, 'add']);
    Route::post('admin/countries/add', [CountriesController::class, 'add_post']);
    Route::get('admin/countries/edit/{id}', [CountriesController::class, 'edit']);
    Route::post('admin/countries/edit/{id}', [CountriesController::class, 'edit_update']);
    Route::get('admin/countries/delete/{id}', [CountriesController::class, 'delete']);
    //Excel Export
    Route::get('admin/countries_export', [CountriesController::class, 'countries_export']);

    //Locations

    Route::get('admin/locations', [LocationsController::class, 'index']);
    Route::get('admin/locations/add', [LocationsController::class, 'add']);
    Route::post('admin/locations/add', [LocationsController::class, 'add_post']);
    Route::get('admin/locations/edit/{id}', [LocationsController::class, 'edit']);
    Route::post('admin/locations/edit/{id}', [LocationsController::class, 'edit_update']);
    Route::get('admin/locations/delete/{id}', [LocationsController::class, 'delete']);
    //Excel Export
    Route::get('admin/locations_export', [LocationsController::class, 'locations_export']);

    //Departments

    Route::get('admin/departments', [DepartmentsController::class, 'index']);
    Route::get('admin/departments/add', [DepartmentsController::class, 'add']);
    Route::post('admin/departments/add', [DepartmentsController::class, 'add_post']);
    Route::get('admin/departments/edit/{id}', [DepartmentsController::class, 'edit']);
    Route::post('admin/departments/edit/{id}', [DepartmentsController::class, 'edit_update']);
    Route::get('admin/departments/delete/{id}', [DepartmentsController::class, 'delete']);
    //Excel Export
    Route::get('admin/departments_export', [DepartmentsController::class, 'departments_export']);

    // Manager

    Route::get('admin/manager', [ManagerController::class, 'index']);
    Route::get('admin/manager/add', [ManagerController::class, 'add']);
    Route::post('admin/manager/add', [ManagerController::class, 'add_post']);
    Route::get('admin/manager/edit/{id}', [ManagerController::class, 'edit']);
    Route::post('admin/manager/edit/{id}', [ManagerController::class, 'edit_update']);
    Route::get('admin/manager/delete/{id}', [ManagerController::class, 'delete']);
    //Excel Export
    Route::get('admin/manager_export', [ManagerController::class, 'manager_export']);

    //My Account
    Route::get('admin/my_account', [MyAccountController::class, 'my_account']);
    Route::post('admin/my_account/update', [MyAccountController::class, 'edit_update']);

    //Pay Roll
    Route::get('admin/payroll', [PayrollController::class, 'index']);
    Route::get('admin/payroll/add', [PayrollController::class, 'add']);
    Route::post('admin/payroll/add', [PayrollController::class, 'add_post']);
    Route::get('admin/payroll/view/{id}', [PayrollController::class, 'view']);
    Route::get('/admin/payroll/edit/{id}', [PayrollController::class, 'edit']);
    Route::post('/admin/payroll/edit/{id}', [PayrollController::class, 'edit_update']);
    Route::get('admin/payroll/delete/{id}', [PayrollController::class, 'delete']);
    //Excel Export
    Route::get('admin/payroll_export', [PayrollController::class, 'payroll_export']);

    //Position
    Route::get('admin/position', [PositionController::class, 'index']);
    Route::get('admin/position/add', [PositionController::class, 'add']);
    Route::post('admin/position/add', [PositionController::class, 'add_post']);
    Route::get('admin/position/edit/{id}', [PositionController::class, 'edit']);
    Route::post('admin/position/edit/{id}', [PositionController::class, 'edit_update']);
    Route::get('admin/position/delete/{id}', [PositionController::class, 'delete']);
    //Excel Export
    Route::get('admin/position_export', [PositionController::class, 'position_export']);
});

Route::group(['middleware' => 'employee'], function () {
    Route::get('employee/dashboard', [DashboardController::class, 'dashboard']);
});

Route::get('logout', [AuthController::class, 'logout']);
