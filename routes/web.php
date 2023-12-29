<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\DocumentUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\UniqueController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CalculatorController;

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

//Welcome Routes (Root Page)

//Get Login Page
Route::get('/',[MyController::class,'getLogin'])->name('login');

//Post Login Page
Route::post('/login',[MyController::class,'PostLogin'])->name('Login');

//Dashboard Page
Route::get('/dashboard',[MyController::class,'dashboard'])->name('dashboard');



//All the routes of the Calculator Moduleattendence
Route::get('/calculator/index', function () {
    return view('calculator.index');
})->name('calculator.index');


Route::get('/calculator/cut_size', function () {
    return view('calculator.cut_size');
});

Route::get('/calculator/wood_log', function () {
    return view('calculator.wood_log');
});
Route::post('/submit-form',[CalculatorController::class,'SubmitForm'])->name('calculate');

Route::post('/submit-form2',[CalculatorController::class,'SubmitForm2'])->name('calculate2');



//All the routes of the Attendence Moduleattendence
Route::get('/attendence/index', function () {
    return view('Attendence.index');
})->name('attendence.index');

//Add Beneficiary Show
Route::get('/attendence/addEmployee', [EmployeeController::class, 'AddEmployee'])->name('addEmployee');

//Add Post Beneficiary
Route::post('/attendence/addEmployee', [EmployeeController::class, 'PostAddEmployee'])->name('PostAddEmployee');

//Edit Post Beneficiary
Route::post('/attendence/EditEmployee/{id}', [EmployeeController::class, 'PostEditEmployee'])->name('PostEditEmployee');

//Show Master Table
Route::get('/attendence/masterTable', [EmployeeController::class, 'masterTable'])->name('masterTable');

//Allowance
Route::get('attendence/deposits', [UniqueController::class, 'deposits'])->name('deposits');

//Post Allowance
Route::post('/attendence/deposits/{id}', [UniqueController::class, 'post_deposits'])->name('Post_deposits');

//Attendence
Route::get('/attendence/getattendence', [AttendanceController::class, 'attendence'])->name('attendence');

//Post Attendence
Route::post('/attendenceget/{id}', [AttendanceController::class, 'attendencePost'])->name('attendencePost');

//Attendence
Route::get('/attendence/transaction', [TransactionController::class, 'showtransaction'])->name('transaction.show');

//Report
Route::get('/attendece/report', [UniqueController::class, 'showreport'])->name('reports.show');

//Specific Report
Route::get('/attendece/report/{id}', [UniqueController::class, 'specificreport'])->name('report.specific');

//Final Report
Route::get('/attendece/myreport/{id}', [UniqueController::class, 'finalreport'])->name('report.final');








//All the routes of the Products Module
//Admin Index Page
Route::get('/Products/Admin/index',[productsController::class,'adminIndex'])->name('products.admin');

//Add the Items (two)
Route::post('/ProductsTwo/AddItems',[productsController::class,'addTwoItems'])->name('products.addTwoItems');

//Add the Items (four)
Route::post('/ProductsFour/AddItems',[productsController::class,'addFourItems'])->name('products.addFourItems');

//Admin Display two Table Page
Route::get('/Products/Admin/displaytwoitems/{id}',[productsController::class,'displaytwo'])->name('products.admin.displaytwo');

//Admin Display Two Items Edit Page
Route::post('/Products/Admin/deletetwoitems/{id}',[productsController::class,'deletetwoitems'])->name('products.admin.deletetwoitems');

//Admin Display Four Items Edit Page
Route::post('/Products/Admin/deletefouritems/{id}',[productsController::class,'deletefouritems'])->name('products.admin.deletefouritems');

//Admin Display Four Table Page
Route::get('/Products/Admin/displayfouritems/{id}',[productsController::class,'displayfour'])->name('products.admin.displayfour');

//Admin Add Row Two Table Page
Route::post('Products/Admin/addrowtwo/{id}',[productsController::class,'addrowtwo'])->name('products.admin.addrowtwo');

//Admin Add Row Four Table Page
Route::post('/Products/Admin/addrowfour/{id}',[productsController::class,'addrowfour'])->name('products.admin.addrowfour');

//Admin Edit two Table Page
Route::get('/Products/Admin/edittabletwo/{id}',[productsController::class,'edittwotable'])->name('products.admin.edittabletwo');

//Admin Update two Table Page
Route::post('Products/Admin/updatetabletwo/{id}',[productsController::class,'updatetwotable'])->name('products.admin.updatetabletwo');

//Admin Delete Two Table Page
Route::post('/Products/Admin/deletetabletwo/{id}', [ProductsController::class, 'deletetwotable'])
    ->name('products.admin.deletetabletwo');

//Admin Update Four Table Page
Route::post('/Products/Admin/updatetablefour/{id}',[productsController::class,'updatefourtable'])->name('products.admin.updatetablefour');


//Admin Edit four Table Page
Route::get('Products/Admin/edittablefour/{id}',[productsController::class,'editfourtable'])->name('products.admin.edittablefour');

//Admin Delete Four Table Page
Route::post('/Products/Admin/deletetablefour/{id}', [ProductsController::class, 'deletefourtable'])
    ->name('products.admin.deletetablefour');

//Users Index Page
Route::get('/Products/Users/index',[productsController::class,'userIndex'])->name('products.users');

//User Display two table Page
Route::get('/Products/Users/displaytwoitems/{id}',[productsController::class,'displaytwoUser'])->name('products.user.displaytwo');

//User Display four table Page
Route::get('/Products/Users/displayfouritems/{id}',[productsController::class,'displayfourUser'])->name('products.user.displayfour');





//All the routes of the Docouments Module
//Get the form to insert the records
Route::get('/documents/form/{id}',[MyController::class,'getForm'])->name('getForm');
//Form submit to insert the records
Route::post('/documents/upload/{id}',[DocumentUploadController::class,'upload'])->name('upload');
//Get all the records of registered Number plates
Route::get('/documents/showplates',[MyController::class,'showPlates'])->name('showplates');
//Get all the records of particular Plates
Route::get('documents/showrecords/{id}',[MyController::class,'showRecords'])->name('showRecords');
//Adding the number plates to the database
Route::post('documents/addPlates',[MyController::class,'addPlates'])->name('addPlates');
//View Button
Route::get('documents/Viewfitness/{id}',[MyController::class,'Viewfitness'])->name('Viewfitness');
Route::get('/documents/Viewinsurance/{id}',[MyController::class,'Viewinsurance'])->name('Viewinsurance');
Route::get('/documents/Viewlicense/{id}',[MyController::class,'Viewlicense'])->name('Viewlicense');
Route::get('/documents/Viewnational/{id}',[MyController::class,'Viewnational'])->name('Viewnational');
Route::get('/documents/Viewpuc/{id}',[MyController::class,'Viewpuc'])->name('Viewpuc');
Route::get('/documents/Viewrcbook/{id}',[MyController::class,'Viewrcbook'])->name('Viewrcbook');
Route::get('/documents/Viewroadtax/{id}',[MyController::class,'Viewroadtax'])->name('Viewroadtax');
//Download button
Route::get('/documents/download/{file}',[MyController::class,'download'])->name('download');





