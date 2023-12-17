<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TransactionController;


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


Route::get('/attendence', function () {
    return view('index');
})->name('attendence.index');

//Add Beneficiary Show
Route::get('/addEmployee', [EmployeeController::class, 'AddEmployee'])->name('addEmployee');

//Add Post Beneficiary
Route::post('/addEmployee', [EmployeeController::class, 'PostAddEmployee'])->name('PostAddEmployee');

//Edit Post Beneficiary
Route::post('EditEmployee/{id}', [EmployeeController::class, 'PostEditEmployee'])->name('PostEditEmployee');

//Show Master Table
Route::get('/masterTable', [EmployeeController::class, 'masterTable'])->name('masterTable');

//Allowance
Route::get('/deposits', [MyController::class, 'deposits'])->name('deposits');

//Post Allowance
Route::post('/deposits/{id}', [MyController::class, 'post_deposits'])->name('Post_deposits');

//Attendence
Route::get('/attendence', [AttendanceController::class, 'attendence'])->name('attendence');

//Post Attendence
Route::post('/attendence/{id}', [AttendanceController::class, 'attendencePost'])->name('attendencePost');

//Attendence
Route::get('/transaction', [TransactionController::class, 'showtransaction'])->name('transaction.show');

//Report
Route::get('/report', [MyController::class, 'showreport'])->name('reports.show');

//Specific Report
Route::get('/report/{id}', [MyController::class, 'specificreport'])->name('report.specific');

//Final Report
Route::get('/myreport/{id}', [MyController::class, 'finalreport'])->name('report.final');
