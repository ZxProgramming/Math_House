<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChaptersController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\CourseSettingController;
use App\Http\Controllers\Admin\MarketingController;

use App\Http\Controllers\Student\Stu_DashboardController;
use App\Http\Controllers\Student\Stu_ProfileController;
use App\Http\Controllers\Student\Stu_MyCourseController;

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
    $controller_path = 'App\Http\Controllers' ;
    
    Route::controller(LoginController::class)->group(function(){
        Route::get('/login','index')->name('login.index');
        Route::post('/login.store','store')->name('login.store');
        Route::get('/sign_up','sign_up')->name('sign_up');

        Route::get('/SignupConfirm','signup_confirm')->name('signup_confirm');
        Route::get('/ProfileConfirm','profile_confirm')->name('profile_confirm');

        Route::post('/sign_up/Add','sign_up_add')->name('sign_up_add');
        Route::get('/logout','destroy')->name('logout');
        
      });

//  Hello MR Ahmed 
Route::middleware(['auth','auth.Admin'])->group(function(){
            
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Marketing
Route::get('/Marketing/Commission', [MarketingController::class, 'commission'])->name('commission');
Route::post('/Marketing/Commission/Edit', [MarketingController::class, 'edit_commission'])->name('edit_commission');

Route::post('/Users/Admin/Edit', [UserController::class, 'admin_edit'])->name('admin_edit');
Route::get('/Users/Admin/Del/{id}', [UserController::class, 'del_admin'])->name('del_admin');
Route::get('/Users/Admin_Add', [UserController::class, 'admin_add'])->name('admin_add');
Route::post('/Users/Admin/Add', [UserController::class, 'add_admin'])->name('add_admin');

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [ DashboardController::class, 'index'])->name('dashboard');
Route::get('/Users/RoleAdmin', [UserController::class, 'role_admins'])->name('role_admins_list');
Route::post('/Users/RoleAdmin/Edit', [UserController::class, 'role_admin_edit'])->name('role_admin_edit');
Route::get('/Users/RoleAdmin/Del/{id}', [UserController::class, 'role_del_admin'])->name('role_del_admin');
Route::get('/Users/Admin', [UserController::class, 'admins'])->name('admins_list');
Route::post('/Users/Admin/Filter', [UserController::class, 'admin_filter'])->name('admin_filter');

// Admin
Route::post('/Users/Admin/Edit', [UserController::class, 'admin_edit'])->name('admin_edit');
Route::get('/Users/Admin/Del/{id}', [UserController::class, 'del_admin'])->name('del_admin');
Route::get('/Users/Admin_Add', [UserController::class, 'admin_add'])->name('admin_add');
Route::post('/Users/Admin/Add', [UserController::class, 'add_admin'])->name('add_admin');

// Teacher 
Route::post('/Users/Teacher_Filter', [UserController::class, 'teacher_filter'])->name('teacher_filter');
Route::get('/Users/Teacher', [UserController::class, 'teacher'])->name('teacher');
Route::post('/Users/Teacher_Edit', [UserController::class, 'teacher_edit'])->name('teacher_edit');
Route::post('/Users/Teacher/Add', [UserController::class, 'add_teacher'])->name('add_teacher');
Route::get('/Users/Teacher_Add', [UserController::class, 'teacher_add'])->name('teacher_add');
Route::get('/Users/Teacher/Del/{id}', [UserController::class, 'del_teacher'])->name('del_teacher');

// Students  
Route::get('/Users/Student', [UserController::class, 'student'])->name('student');
Route::post('/Users/Student_Filter', [UserController::class, 'student_filter'])->name('student_filter');
Route::get('/Users/Student/Info', [UserController::class, 'stu_info'])->name('stu_info');
Route::get('/Users/Add_Student', [UserController::class, 'add_student'])->name('add_student');
Route::get('/Users/Student/Del/{id}', [UserController::class, 'del_stu'])->name('del_stu');
Route::post('/Users/Student/Add', [UserController::class, 'student_add'])->name('student_add');
Route::post('/Users/Student/Edit', [UserController::class, 'stu_edit'])->name('stu_edit');

// Courses 
Route::controller(CoursesController::class)->group(function(){
    Route::get('/Courses','courses')->name('courses');
    Route::post('/Courses_Filter','course_filter')->name('course_filter');
    Route::post('/Courses/Edit','course_edit')->name('course_edit');
    Route::get('/Courses/Del/{id}','del_course')->name('del_course');
    Route::get('/Courses/Add_Courses','add_courses')->name('add_courses');
    Route::post('/Courses/Courses/Add','course_add')->name('course_add');
});

// Chapters 
Route::controller(ChaptersController::class)->group(function(){
    Route::get('/Chapter','chapter')->name('chapter');
    Route::post('/Chapter_Filter','ch_filter')->name('ch_filter');
    Route::post('/Chapter/Edit','chapter_edit')->name('chapter_edit');
    Route::post('/Chapter/Add','add_chapter')->name('add_chapter');
    Route::get('/Chapter/Del/{id}','del_chapter')->name('del_chapter');
});

// Questions 
Route::controller(QuestionController::class)->group(function(){
    Route::get('/Question','question')->name('question');
    Route::post('/Question/Edit','q_edit')->name('q_edit');
    Route::post('/Question/Add','add_q')->name('add_q');
    Route::post('/Question/Filter','filter_question')->name('filter_question');
    Route::get('/Question/Del/{id}','del_q')->name('del_q');
});

//Course Setting
Route::controller(CourseSettingController::class)->group(function(){
    Route::get('/Courses/CodeExam','course_setting')->name('course_setting');
    Route::post('/Courses/CodeExam/Add','code_exam_add')->name('code_exam_add');
});

// Exam 
Route::controller(ExamController::class)->group(function(){
    Route::get('/Exam','index')->name('exam');
});

// Category
Route::controller(CategoryController::class)->group(function(){
    Route::get('/category/Information','index')->name('category');
    Route::post('/category/categoryAdd','createCategory')->name('addCategories');
    Route::get('/category/categoryDelete/{id}','categoryDelete')->name('categoryDelete');
    Route::post('/category/categoryEdit','editCategory')->name('categoryEdit');
});

// Lesson 
Route::controller(LessonController::class)->group(function(){
        Route::get('Lesson/Lessons','index')->name('lesson');
        Route::post('Lesson/AddLesson','addLesson')->name('addLesson');
        Route::post('Lesson/Edit','lesson_edit')->name('lesson_edit');
        Route::get('Lesson/Del/{id}','del_lesson')->name('del_lesson');
});
   


  });

          
  

Route::middleware(['auth','auth.student'])->group(function(){
    Route::controller(Stu_DashboardController::class)->group(function(){
        Route::get('/Student','index')->name('stu_dashboard');
    });

    Route::controller(Stu_ProfileController::class)->group(function(){
        Route::get('/Student/Profile','index')->name('stu_profile');
        Route::post('/Student/Profile/Edit','stu_edit_profile')->name('stu_edit_profile');
    });

    Route::controller(Stu_MyCourseController::class)->group(function(){
        Route::get('/Student/MyCourses','index')->name('stu_my_courses');
        Route::get('/Student/MyCourses/Courses','courses')->name('stu_courses');
        Route::get('/Student/MyCourses/Chapters','chapters')->name('stu_chapters');
    });
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

});



