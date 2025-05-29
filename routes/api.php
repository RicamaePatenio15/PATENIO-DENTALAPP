<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\uStatusController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\UserStatusController; // Add this line

// Public routes
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// Protected routes: all require auth:sanctum middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

  Route::get('/user-status', [UserStatusController::class, 'getUserStatuses']);
  Route::post('/user-status', [UserStatusController::class, 'addUserStatus']);
  Route::put('/user-status/{id}', [UserStatusController::class, 'editUserStatus']);
  Route::delete('/user-status/{id}', [UserStatusController::class, 'deleteUserStatus']);

  Route::get('/roles', [RoleController::class, 'get']);
  Route::post('/roles', [RoleController::class, 'add']);
  Route::put('/roles/{id}', [RoleController::class, 'update']);
  Route::delete('/roles/{id}', [RoleController::class, 'delete']);


 Route::get('/services', [ServiceController::class, 'get']);
Route::post('/services', [ServiceController::class, 'add']);
Route::put('/services/{id}', [ServiceController::class, 'update']);
Route::delete('/services/{id}', [ServiceController::class, 'delete']);

Route::get('patients', [PatientController::class, 'index']);       // Get all patients
Route::post('patients', [PatientController::class, 'store']);      // Add new patient
Route::get('patients/{id}', [PatientController::class, 'show']);   // Get a patient by id
Route::put('patients/{id}', [PatientController::class, 'update']); // Update patient by id
Route::delete('patients/{id}', [PatientController::class, 'destroy']); // Delete patient by id

Route::get('/users', [UserController::class, 'getUser']);
Route::post('/users', [UserController::class, 'addUser']);
Route::put('/users/{id}', [UserController::class, 'editUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);


Route::get('/appointments', [AppointmentController::class, 'getAppointments']);
Route::post('/appointments', [AppointmentController::class, 'addAppointment']);
Route::put('/appointments/{id}', [AppointmentController::class, 'updateAppointment']);
Route::delete('/appointments/{id}', [AppointmentController::class, 'deleteAppointment']);

});