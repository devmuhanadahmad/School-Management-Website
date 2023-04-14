<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ExamQuestionController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MyparentController;
use App\Http\Controllers\Admin\OnlineClassController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SchoolgradeController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\Admin\StudantController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
/*
Route::group(
    [

        'middleware' => ['auth:teacher']
    ],
    function () {

        //==============================dashboard============================
        Route::get('/teacher/dashboard', function () {
            return view('admin.teacher.dashboard');
        });
    }
);

Route::group(
    [

        'middleware' => ['auth:student']
    ],
    function () {

        //==============================dashboard============================
        Route::get('/student/dashboard', function () {
            return view('admin.studant.dashboard');
        });
    }
);


*/


/*

Route::get('/', [DashboardController::class, 'index'])->name('selection');


//home route
Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}', [AuthenticatedSessionController::class, 'formLogin'])->middleware('guest')->name('login.show');
    Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
    Route::get('/logout/{type}', [AuthenticatedSessionController::class, 'logout'])->name('logout');
});

*/


/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
//require __DIR__.'/auth.php';



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
       // 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        //dashboard route
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard'); //->middleware('auth');
        //grade route
        Route::resource('/grade', SchoolgradeController::class)->names('schoolGrade');
        //classroom
        Route::resource('/classroom', ClassroomController::class)->names('classroom')->except('show');
        Route::get('/classroom/trash', [ClassroomController::class, 'trash'])->name('classroom.trash');
        Route::put('/classroom/{id}/restore', [ClassroomController::class, 'restore'])->name('classroom.restore');
        Route::delete('/classroom/{id}/force-delete', [ClassroomController::class, 'forceDelete'])->name('classroom.forcedelete');
        //teacher route
        Route::resource('/teacher', TeacherController::class)->names('teacher');
        //section route
        Route::resource('/section', SectionController::class)->names('section');
        //specialization route
        Route::resource('/specialization', SpecializationController::class)->names('specialization');
        //studant route
        Route::resource('/studant', StudantController::class)->names('studant');
        Route::post('/studant/store/attachment', [StudantController::class, 'store_attachment'])->name('studant.store_attachment');
        Route::get('/studant/download/{studantName}/{filename}', [StudantController::class, 'Download_attachment'])->name('studant.Download_attachment');
        Route::delete('/studant/{imageable_id}', [StudantController::class, 'delete_attachment'])->name('studant.delete_attachment');
        //parent route
        Route::resource('/parent', MyparentController::class)->names('parent');
        //promotion route
        Route::get('/promotion', [PromotionController::class, 'index'])->name('promotion.index');
        Route::post('/promotion/store', [PromotionController::class, 'store'])->name('promotion.store');
        //account route
        Route::resource('/accounts', AccountController::class)->names('account');
        Route::get('/show/account/studants/{schoolgrade_id}/{classroom_id}', [AccountController::class, 'showAccountsStudants'])->name('account.showAccountsStudants');
        //invoice route
        Route::resource('/invoice', InvoiceController::class)->names('invoice');
        //invoice route
        Route::resource('/subject', SubjectController::class)->names('subject');
        //invoice route
        Route::resource('/onlineClass', OnlineClassController::class)->names('onlineClass');
        //quizze route
        Route::resource('/exam', ExamController::class)->names('exam');
        //examQuestion route
        Route::resource('/examQuestion', ExamQuestionController::class)->names('examQuestion');
        //setting route
        Route::get('setting/edit', [SettingController::class, 'edit'])->name('setting.edit');
        Route::put('setting/{setting}/update', [SettingController::class, 'update'])->name('setting.update');
    }
);
