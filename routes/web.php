<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get("/departments", [DepartmentController::class, "index"])->name("departments");
Route::get("/departments/create", [DepartmentController::class, "create"])->name("departments.create");
Route::post("/departments", [DepartmentController::class, "store"])->name("departments.store");
Route::get("/departments/{id}", [DepartmentController::class, "show"])->name("departments.show");
Route::get("/departments/{id}/edit", [DepartmentController::class, "edit"])->name("departments.edit");
Route::put("/departments/{id}/update", [DepartmentController::class, "update"])->name("departments.update");
Route::delete("/departments/{id}", [DepartmentController::class, "destroy"])->name("departments.destroy");

Route::get("/employees", [EmployeeController::class, "index"])->name("employees");
Route::get("/employees/create", [EmployeeController::class, "create"])->name("employees.create");
Route::post("/employees", [EmployeeController::class, "store"])->name("employees.store");
Route::get("/employees/{id}", [EmployeeController::class, "show"])->name("employees.show");
Route::get("/employees/{id}/edit", [EmployeeController::class, "edit"])->name("employees.edit");
Route::put("/employees/{id}/update", [EmployeeController::class, "update"])->name("employees.update");
Route::delete("/employees/{id}", [EmployeeController::class, "destroy"])->name("employees.destroy");
