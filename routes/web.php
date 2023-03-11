<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontendXontroller;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeacherController;
use App\Models\Category;
use App\Models\PhotoGallery;
use App\Models\Tag;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

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

 Route::get('/', [FrontendController::class, 'home'])->name('home');
 Route::get('/teacher', [FrontendController::class, 'teacher'])->name('teacher');
 Route::get('/about', [FrontendController::class, 'about'])->name('about');
 Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');
 Route::get('/message', [FrontendController::class, 'message'])->name('message');
 Route::get('/student', [FrontendController::class, 'student'])->name('student');
 Route::get('/office', [FrontendController::class, 'office'])->name('office');
 Route::get('/registar', [FrontendController::class, 'registar'])->name('registar');
 Route::get('/library', [FrontendController::class, 'library'])->name('library');
 Route::get('/store', [FrontendController::class, 'store'])->name('store');
 Route::get('/account', [FrontendController::class, 'account'])->name('account');
 Route::get('/security', [FrontendController::class, 'security'])->name('security');
 Route::get('/notice', [FrontendController::class, 'notice'])->name('notice');
 Route::get('/job', [FrontendController::class, 'job'])->name('job');
 Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
 Route::get('/department', [FrontendController::class, 'department'])->name('department');
 Route::get('/routine', [FrontendController::class, 'routine'])->name('routine');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/user/create', [CreateUserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [CreateUserController::class, 'store'])->name('user.store');
    Route::get('/user/distroy/{id}', [CreateUserController::class, 'distroy'])->name('user.distroy');
    Route::get('/profile/setting', [CreateUserController::class, 'edit'])->name('profile.setting');
    Route::post('/profile/setting/{id}', [CreateUserController::class, 'update'])->name('profile.setting.update');
    Route::post('/profile/password/{id}', [CreateUserController::class, 'password_update'])->name('profile.password.update');
    Route::resource('/photoupload', PhotoGalleryController::class);
    Route::get('/photo/restore/{id}', [PhotoGalleryController::class, 'photorestore'])->name('photo.restore');
    Route::get('/photo/delete/{id}', [PhotoGalleryController::class, 'photodelete'])->name('photo.delete');
    Route::resource('/notice', NoticeController::class);
    Route::get('/notice/restore/{id}', [NoticeController::class, 'noticerestore'])->name('notice.restore');
    Route::get('/notice/delete/{id}', [NoticeController::class, 'noticedelete'])->name('notice.delete');
    Route::resource('/department', DepartmentController::class);
    Route::get('/department/restore/{id}', [DepartmentController::class, 'departmentrestore'])->name('department.restore');
    Route::get('/department/delete/{id}', [DepartmentController::class, 'departmentdelete'])->name('department.delete');
    Route::resource('/teacher', TeacherController::class);
    Route::get('/teacher/restore/{id}', [TeacherController::class, 'teacherrestore'])->name('teacher.restore');
    Route::get('/teacher/delete/{id}', [TeacherController::class, 'teacherdelete'])->name('teacher.delete');
    Route::resource('/student', StudentController::class);
    Route::get('/student/restore/{id}', [StudentController::class, 'studentrestore'])->name('student.restore');
    Route::get('/student/delete/{id}', [StudentController::class, 'studentdelete'])->name('student.delete');
    Route::resource('/contract', ContractController::class);
    Route::get('/contract/restore/{id}', [ContractController::class, 'contractrestore'])->name('contract.restore');
    Route::get('/contract/delete/{id}', [ContractController::class, 'contractdelete'])->name('contract.delete');
    Route::resource('/result', ResultController::class);
    Route::get('/result/restore/{id}', [ResultController::class, 'resultrestore'])->name('result.restore');
    Route::get('/result/delete/{id}', [ResultController::class, 'resultdelete'])->name('result.delete');
    Route::get('/resultdownload/{result_image}', [ResultController::class, 'download']);
    Route::resource('/routine', RoutineController::class);
    Route::get('/routine/restore/{id}', [RoutineController::class, 'routinerestore'])->name('routine.restore');
    Route::get('/routine/delete/{id}', [RoutineController::class, 'routinedelete'])->name('routine.delete');
    Route::resource('/project', ProjectController::class);
    Route::get('/project/restore/{id}', [ProjectController::class, 'proectrestore'])->name('project.restore');
    Route::get('/project/delete/{id}', [ProjectController::class, 'proectdelete'])->name('project.delete');
    Route::resource('/principal', PrincipalController::class);
    Route::resource('/office', OfficeController::class);
    Route::get('/office/restore/{id}', [OfficeController::class, 'officerestore'])->name('office.restore');
    Route::get('/office/delete/{id}', [OfficeController::class, 'officedelete'])->name('office.delete');
    Route::resource('/registrar', RegistrarController::class);
    Route::get('/registrar/restore/{id}', [RegistrarController::class, 'registrarrestore'])->name('registrar.restore');
    Route::get('/registrar/delete/{id}', [RegistrarController::class, 'registrardelete'])->name('registrar.delete');
    Route::resource('/librarian', LibraryController::class);
    Route::get('/librarian/delete/{id}', [LibraryController::class, 'librariandelete'])->name('librarian.delete');
    Route::resource('/store', StoreController::class);
    Route::resource('/account', AccountController::class);
    Route::resource('/security', SecurityController::class);
    Route::resource('/job', JobController::class);
    Route::resource('/profile', PersonController::class);
});
require __DIR__.'/auth.php';