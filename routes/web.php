<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Manager\CourseController;
use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\teacher\TeacherController;
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



Route::prefix('admin')->group(function(){
    Route::get('/', [ManagerController::class , 'index']);
    Route::get('/setting', [ManagerController::class , 'settings'])->name('show.setting');
    Route::post('/setting/lang',[LocalizationController::class,'localization'])->name('lang');
   
//-----------------------------Course-------------------------------------------
    Route::get('/courses', [CourseController::class , 'showCourse'])->name('show.course');
    Route::view('/create','manager.createCourse')->name('admin.create');
    Route::post('/create',[CourseController::class,'createCourse'])->name('createCourse');
    Route::delete('/course/delete/{course}',[CourseController::class,'deleteCourse'])->name('delete.course');
    Route::get('/course/{course}',[CourseController::class,'showUpdateCourse'])->name('show.update');
    Route::put('/course/{course}',[CourseController::class,'updateCourse'])->name('update.course');
    Route::get('/course/detaile/{id}',[CourseController::class,'detaileCourse'])->name('detaile.course');
    Route::delete('/course/delete/student/{student}/{course}',[CourseController::class,'deleteStudent']);

//------------------------------User---------------------------------------------
    Route::get('/users',[UserController::class,'showUser'])->name('show.user');
    Route::patch('/users/{id}',[UserController::class,'updateStatus']);
    Route::get('/user/update/{user}',[UserController::class,'showUpdate'])->name('show.update.user');
    Route::put('/user/update/{id}',[UserController::class,'updateUser'])->name('update.user');
    Route::delete('/users/delete/{user}',[UserController::class,'deleteUser'])->name('delete.user');
    Route::post('/users/search',[UserController::class,'search'])->name('search.user');
    Route::post('/users/filter',[UserController::class,'filter']);

});

//------------------------------Teacher---------------------------------------------
Route::prefix('teacher')->middleware(['auth','role:teacher'])->group(function(){

    Route::get('/home',[TeacherController::class,'home']);
    Route::get('/course/{id}',[TeacherController::class,'showCourse'])->name('course.teacher');
    Route::get('/exam/{id}',[TeacherController::class,'exam'])->name('show.exam');
    Route::get('/create/{id}',[TeacherController::class,'createExam'])->name('create.exam');
    Route::post('/create/{id}',[TeacherController::class,'store'])->name('store.exam');
    Route::get('/update/{exam}',[TeacherController::class,'edit'])->name('edit.exam');
    Route::post('/update/{exam}',[TeacherController::class,'updateExam'])->name('update.exam');
    Route::post('/addQuestion{exam}',[TeacherController::class,'addQuestion'])->name('add.question');
    Route::delete('/delete/{id}',[TeacherController::class,'deleteExam'])->name('delete.exam');
    Route::get('/createQuestion/{id}',[TeacherController::class,'createQuestion'])->name('create.question');
    Route::post('/createQuestion',[TeacherController::class,'storeQuestion'])->name('store.question');
    Route::get('/showBank',[TeacherController::class,'showBank'])->name('show.bank');
    Route::get('/detaileExam/{id}',[TeacherController::class,'detaileExam'])->name('detaile.Exam');
    Route::get('/score/{user}',[TeacherController::class,'showAnswer'])->name('show.answer');

});

//------------------------------Student--------------------------------------------
Route::prefix('student')->middleware(['auth','role:student'])->group(function(){

    Route::get('/home',[StudentController::class,'home']);
    Route::get('/course/{id}',[StudentController::class,'showCourse'])->name('course.student');
    Route::get('/exam/{id}',[StudentController::class,'exam'])->name('show.exam.student');
    Route::get('/questions/{exam}',[StudentController::class,'questions'])->name('question.student');
    Route::post('/questions/{exam}',[StudentController::class,'answers'])->name('answer.student');

});


//-----------Auth------------------
Route::get('/register',[AuthController::class ,'showRegister']);
Route::post('/register',[AuthController::class ,'register'])->name('register');
Route::get('/login',[AuthController::class ,'showlogin']);
Route::post('/login',[AuthController::class ,'login'])->name('login');
Route::view('/status','auth.status')->name('status');







