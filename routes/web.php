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
use App\Http\Controllers\Admin\DiagnosticExamController;
use App\Http\Controllers\Admin\CourseSettingController;
use App\Http\Controllers\Admin\MarketingController;
use App\Http\Controllers\Admin\QuizzeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\LiveController;
use App\Http\Controllers\Admin\PaymentRequestController;

use App\Http\Controllers\Student\Stu_DashboardController;
use App\Http\Controllers\Student\Stu_ProfileController;
use App\Http\Controllers\Student\Stu_MyCourseController;

use App\Http\Controllers\Visitor\HomeController;
use App\Http\Controllers\Visitor\ContactController;
use App\Http\Controllers\Visitor\AboutController;
use App\Http\Controllers\Visitor\CoursesController as V_CoursesController;

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
        Route::post('/Market','market_login')->name('market_ch');
        Route::get('/login','index')->name('login.index');
        Route::post('/login.store','store')->name('login.store');
        Route::get('/sign_up','sign_up')->name('sign_up');

        Route::get('/SignupConfirm','signup_confirm')->name('signup_confirm');
        Route::get('/ProfileConfirm','profile_confirm')->name('profile_confirm');

        Route::post('/sign_up/Add','sign_up_add')->name('sign_up_add');
        Route::get('/logout','destroy')->name('logout');
        
    });
    
    Route::get('/Home', [HomeController::class, 'index'])->name('home');

    Route::post('/Home/Use_Promocode', [V_CoursesController::class, 'use_promocode'])->name('use_promocode');
    Route::get('/Home/CheckOut', [V_CoursesController::class, 'check_out'])->name('check_out');
    Route::post('/Home/Payment_Money', [V_CoursesController::class, 'payment_money'])->name('payment_money');
    Route::get('/Home/BuyCourse', [V_CoursesController::class, 'new_payment'])->name('new_payment');
    Route::get('/Home/Courses', [V_CoursesController::class, 'categories'])->name('categories');
    Route::post('/Home/Buy_Course', [V_CoursesController::class, 'buy_course'])->name('buy_course');
    Route::get('/Home/Buy_Course', [V_CoursesController::class, 'buy_course'])->name('buy_course');
    Route::get('/Home/Course_Payment', [V_CoursesController::class, 'course_payment'])->name('course_payment');
    Route::get('/Home/Courses/{id}', [V_CoursesController::class, 'courses'])->name('v_courses');
    Route::get('/Home/Course/{id}', [V_CoursesController::class, 'course'])->name('v_course');
    Route::get('/Home/Course/Remove/{id}', [V_CoursesController::class, 'remove_course_package'])->name('remove_course_package');
    
    Route::get('/Home/About', [AboutController::class, 'index'])->name('about');
    Route::get('/Home/Contact', [ContactController::class, 'index'])->name('contact_us');
    Route::post('/Home/Contact/Msg', [ContactController::class, 'contact_msg'])->name('contact_msg');

//  Hello MR Ahmed 
Route::middleware(['auth','auth.Admin'])->group(function(){
            
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Quizze 
Route::get('/Quizze', [QuizzeController::class, 'quizze'])->name('quizze');
Route::get('/Quizze/Del/{id}', [QuizzeController::class, 'del_quizze'])->name('del_quizze');
Route::post('/Quizze/Add', [QuizzeController::class, 'add_quizze'])->name('add_quizze');
Route::post('/Quizze/Edit/{id}', [QuizzeController::class, 'edit_quizze'])->name('edit_quizze');

// Payment 
Route::get('/Payment', [PaymentController::class, 'payment'])->name('payment');
Route::post('/Payment/Add', [PaymentController::class, 'payment_add'])->name('payment_add');
Route::post('/Payment/Edit', [PaymentController::class, 'payment_edit'])->name('payment_edit');
Route::get('/Payment/Del', [PaymentController::class, 'del_payment'])->name('del_payment');

// Payment Request
Route::controller(PaymentRequestController::class)->group(function(){
    Route::get('/PenddingPayment','pendding_payment')->name('pendding_payment');
    Route::get('/PaymentRequest','payment_request')->name('payment_request');
    Route::get('/ApprovePayment/{id}','approve_payment')->name('approve_payment');
    Route::get('/RejectedPayment/{id}','rejected_payment')->name('rejected_payment');
});

// Marketing

Route::get('/Marketing/PromoCode', [MarketingController::class, 'promo_code'])->name('promo_code');
Route::post('/Marketing/PromoCode/Add', [MarketingController::class, 'add_promo'])->name('add_promo');
Route::post('/Marketing/PromoCode/Edit/{id}', [MarketingController::class, 'edit_promo'])->name('edit_promo');
Route::get('/Marketing/PromoCode/Del/{id}', [MarketingController::class, 'del_promo'])->name('del_promo');
Route::get('/Marketing/Commission', [MarketingController::class, 'commission'])->name('commission');
Route::post('/Marketing/Commission/Edit', [MarketingController::class, 'edit_commission'])->name('edit_commission');
Route::get('/Marketing/Users', [MarketingController::class, 'users'])->name('m_users');
Route::get('/Marketing/Add_Users', [MarketingController::class, 'm_add_users'])->name('m_add_users');
Route::post('/Marketing/Users/Add', [MarketingController::class, 'affilate_add'])->name('affilate_add');
Route::get('/Marketing/Payouts', [MarketingController::class, 'payout_r'])->name('payout_r');
Route::post('/Marketing/Payouts_Reject/{id}', [MarketingController::class, 'reject_payout'])->name('reject_payout');
Route::get('/Marketing/Accept_Payouts/{id}', [MarketingController::class, 'accept_payout'])->name('accept_payout');
Route::post('/Marketing/Filter_Payouts', [MarketingController::class, 'filter_payment'])->name('filter_payment');
Route::get('/Marketing/Filter_Payouts', [MarketingController::class, 'filter_payment'])->name('filter_payment');

// Live 
Route::get('/Live', [LiveController::class, 'index'])->name('sessions');
Route::post('/Live/Edit/{id}', [LiveController::class, 'session_edit'])->name('session_edit');
Route::post('/Live/Add', [LiveController::class, 'add_session'])->name('add_session');
Route::get('/Live/Del/{id}', [LiveController::class, 'del_session'])->name('del_session');
Route::get('/Live/Groups', [LiveController::class, 'session_g'])->name('session_g');
Route::get('/Live/Session_G/Del/{id}', [LiveController::class, 'del_session_g'])->name('del_session_g');
Route::post('/Live/Session_G', [LiveController::class, 'g_session_edit'])->name('g_session_edit');
Route::post('/Live/Session_G/Add', [LiveController::class, 'g_session_add'])->name('g_session_add');
Route::get('/Live/Private_Request', [LiveController::class, 'private_request'])->name('private_request');
Route::get('/Live/Private_Request/Approve/{id}', [LiveController::class, 'private_session_approve'])->name('private_session_approve');
Route::post('/Live/Private_Request/Rejected', [LiveController::class, 'private_request_rejected'])->name('private_request_rejected');
Route::get('/Live/Cancelation', [LiveController::class, 'cancelation'])->name('cancelation');
Route::get('/Live/Cancelation/Approve/{id}', [LiveController::class, 'approve_cancelation'])->name('approve_cancelation');
Route::get('/Live/Cancelation/Rejected/{id}', [LiveController::class, 'reject_cancelation'])->name('reject_cancelation');

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
Route::get('/Users/Admin/Filter', [UserController::class, 'admin_filter'])->name('admin_filter');

// Admin
Route::post('/Users/Admin/Edit', [UserController::class, 'admin_edit'])->name('admin_edit');
Route::get('/Users/Admin/Del/{id}', [UserController::class, 'del_admin'])->name('del_admin');
Route::get('/Users/Admin_Add', [UserController::class, 'admin_add'])->name('admin_add');
Route::post('/Users/Admin/Add', [UserController::class, 'add_admin'])->name('add_admin');

// Teacher 
Route::post('/Users/Teacher_Filter', [UserController::class, 'teacher_filter'])->name('teacher_filter');
Route::get('/Users/Teacher_Filter', [UserController::class, 'teacher_filter'])->name('teacher_filter');
Route::get('/Users/Teacher', [UserController::class, 'teacher'])->name('teacher');
Route::post('/Users/Teacher_Edit', [UserController::class, 'teacher_edit'])->name('teacher_edit');
Route::post('/Users/Teacher/Add', [UserController::class, 'add_teacher'])->name('add_teacher');
Route::get('/Users/Teacher_Add', [UserController::class, 'teacher_add'])->name('teacher_add');
Route::get('/Users/Teacher/Del/{id}', [UserController::class, 'del_teacher'])->name('del_teacher');

// Students  
Route::post('/Users/Add_Wallet', [UserController::class, 'add_wallet'])->name('add_wallet');
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
    Route::get('/Courses_Filter','course_filter')->name('course_filter');
    Route::post('/Courses/Edit','course_edit')->name('course_edit');
    Route::get('/Courses/Del/{id}','del_course')->name('del_course');
    Route::get('/Courses/Add_Courses','add_courses')->name('add_courses');
    Route::post('/Courses/Courses/Add','course_add')->name('course_add');
});

// Chapters 
Route::controller(ChaptersController::class)->group(function(){
    Route::get('/Chapter','chapter')->name('chapter');
    Route::post('/Chapter_Filter','ch_filter')->name('ch_filter');
    Route::get('/Chapter_Filter','ch_filter')->name('ch_filter');
    Route::post('/Chapter/Edit','chapter_edit')->name('chapter_edit');
    Route::post('/Chapter/Add','add_chapter')->name('add_chapter');
    Route::get('/Chapter/Del/{id}','del_chapter')->name('del_chapter');
});

// Questions 
Route::controller(QuestionController::class)->group(function(){
    Route::get('/Question','question')->name('question');
    Route::post('/Question/Edit/{id}','q_edit')->name('q_edit');
    Route::post('/Question/Add','add_q')->name('add_q');
    Route::post('/Question/Filter','filter_question')->name('filter_question');
    Route::get('/Question/Filter','filter_question')->name('filter_question');
    Route::get('/Question/Del/{id}','del_q')->name('del_q');
});

//Course Setting
Route::controller(CourseSettingController::class)->group(function(){
    Route::get('/Courses/CodeExam','course_setting')->name('course_setting');
    Route::post('/Courses/CodeExam/Add','code_exam_add')->name('code_exam_add');
});

// Diagnostic Exam 
Route::controller(DiagnosticExamController::class)->group(function(){ 
    Route::get('/Diagnostic_Exam','index')->name('dia_exam');
    Route::post('/Diagnostic_Exam/Add','add_diaexam')->name('add_diaexam');
    Route::get('/Diagnostic_Exam/Del/{id}','del_dia_exam')->name('del_dia_exam');
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
        Route::post('Lesson/Filter','filter_lesson')->name('filter_lesson');
        Route::get('Lesson/Filter','filter_lesson')->name('filter_lesson');
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
        Route::get('/Student/MyCourses/Chapters/{id}','stu_chapters')->name('stu_chapters');
    });
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

});

Route::fallback(function () {
    return view('errors.404');
});

