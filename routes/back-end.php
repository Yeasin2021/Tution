<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Login\LoginController;



Route::group(['middleware' => 'authuser'],function () {


    Route::get('/',[AdminController::class,'dashBoard'])->name('dash-board');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get("/mail", [MailController::class, "email"])->name("email");
    Route::post("send-email", [MailController::class, "composeEmail"])->name("send-email");


    Route::get("/mail-host", [MailController::class, "mailTemplate"])->name("mail-host-form");
    Route::post("/mail-host-post", [MailController::class, "mailTemplatePost"])->name("mail-host-post");


    Route::get("/students-form", [StudentsController::class, "studentForm"])->name("student-form");
    Route::post("/students-post", [StudentsController::class, "saveStudent"])->name("student-create");
    Route::get("/students-datatable", [StudentsController::class, "studentShow"])->name("student-datatable");
    Route::get("/students-edit/{id}", [StudentsController::class, "studentEdit"])->name("student-edit");
    Route::post("/students-update/{id}", [StudentsController::class, "studentUpdate"])->name("student-update");
    Route::any("/students-delete/{id}", [StudentsController::class, "studentDelete"])->name("student-delete");

    Route::get('test',function(){

        return view('back-end.page.student.routinTable');
    });

    Route::get('Shedule-maker-form',[StudentsController::class, "classRoutinMakerForm"])->name('shedule-maker-form');
    Route::post('Shedule-maker-form-post',[StudentsController::class, "routin"])->name('shedule-maker-form-post');


    Route::get('student-payment-form/{id}',[StudentsController::class, "studentPaymentForm"])->name('payment-form');
    Route::post('student-payment-post',[StudentsController::class, "studentPaymentPost"])->name('payment-post');

    Route::get('json-form',[StudentsController::class, "jsonForm"])->name('json-form');
    Route::get('json-forms',function(){
        $data = \App\Models\StudentPayment::find(15);
        $new[] = $data->month;
        json_encode(array_push($new,'March',"April"));
        print_r($new);
    })->name('json-forms');
    Route::post('json-store',[StudentsController::class, "storeJsonData"])->name('json-store');


    // Route::fallback(function(){
    //     return view('errors.404');
    //     // return dd('Baler Code ');
    // });

    // Route::view('/{path?}','errors.404');




//     View::composer(['*'],function($view){
//                 $error404 = 0;
//                 $view->with('error404',$error404);
//             });

//    Route::any('/{any}', function(){
//     return view('errors.404');
//    })->where('any', '.*');




// Route::get('/routine',function(){
//     return view('back-end.page.student.tutionRoutine');
// });

Route::get('/routine',[StudentsController::class,'tutionRoutineView'])->name('routineView');
Route::get('/routine-form',[StudentsController::class,'tutionRoutineViewForm'])->name('routineForm');
Route::post('/routine-form-post',[StudentsController::class,'tutionRoutineMakeer'])->name('routineMaker');


});

