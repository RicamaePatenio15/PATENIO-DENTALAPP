<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentistController;


Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout', [AuthenticationController::class, 'logout']);


Route::get('/patients', [PatientController::class, 'getPatients']);
Route::post('/patients', [PatientController::class, 'addPatient']);
Route::get('/patients/{id}', [PatientController::class, 'getPatient']);
Route::put('/patients/{id}', [PatientController::class, 'editPatient']);
Route::delete('/patients/{id}', [PatientController::class, 'deletePatient']);

Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/users', [UserController::class, 'addUser']);
Route::get('/users/{id}', [UserController::class, 'getUser']);
Route::put('/users/{id}', [UserController::class, 'editUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);

Route::get('/services', [ServiceController::class, 'getServices']);
Route::post('/services', [ServiceController::class, 'addService']);
Route::get('/services/{id}', [ServiceController::class, 'getService']);
Route::put('/services/{id}', [ServiceController::class, 'editService']);
Route::delete('/services/{id}', [ServiceController::class, 'deleteService']);

Route::get('/roles', [RoleController::class, 'getRoles']);
Route::post('/roles', [RoleController::class, 'addRole']);
Route::get('/roles/{id}', [RoleController::class, 'getRole']);
Route::put('/roles/{id}', [RoleController::class, 'editRole']);
Route::delete('/roles/{id}', [RoleController::class, 'deleteRole']);

Route::get('/statuses', [StatusController::class, 'getStatuses']);
Route::post('/statuses', [StatusController::class, 'addStatus']);
Route::get('/statuses/{id}', [StatusController::class, 'getStatus']);
Route::put('/statuses/{id}', [StatusController::class, 'editStatus']);
Route::delete('/statuses/{id}', [StatusController::class, 'deleteStatus']);

Route::get('/appointments', [AppointmentController::class, 'getAppointments']);
Route::post('/appointments', [AppointmentController::class, 'addAppointment']);
Route::get('/appointments/{id}', [AppointmentController::class, 'getAppointment']);
Route::put('/appointments/{id}', [AppointmentController::class, 'editAppointment']);
Route::delete('/appointments/{id}', [AppointmentController::class, 'deleteAppointment']);

Route::get('/dentist', [DentistController::class, 'getDentist']);
Route::post('/dentist', [DentistController::class, 'addDentist']);
Route::get('/get-dentist/{id}', [DentistController::class, 'getDentist']);
Route::put('/dentist/{id}', [DentistController::class, 'editDentist']);
Route::delete('/dentist/{id}', [DentistController::class, 'deleteDentist']);