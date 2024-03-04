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
use App\Http\Controllers\Admin\PackagesController as Ad_PackagesController;

use App\Http\Controllers\Student\Stu_DashboardController;
use App\Http\Controllers\Student\Stu_ProfileController;
use App\Http\Controllers\Student\Stu_MyCourseController;
use App\Http\Controllers\Student\Stu_PackageController;

use App\Http\Controllers\Visitor\HomeController;
use App\Http\Controllers\Visitor\ContactController;
use App\Http\Controllers\Visitor\AboutController;
use App\Http\Controllers\Visitor\V_ExamController;
use App\Http\Controllers\Visitor\V_QuestionController;
use App\Http\Controllers\Visitor\V_LiveController;
use App\Http\Controllers\Visitor\V_DiaExamController;
use App\Http\Controllers\Visitor\CoursesController as V_CoursesController;

use App\Http\Controllers\login\LoginController;

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
    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::controller(V_DiaExamController::class)->group(function(){
        Route::get('/DiaExam', 'index')->name('v_dia_cate');
        Route::post('/DiaExam/Answer/{id}', 'dia_exam_ans')->name('dia_exam_ans');
        Route::get('/DiaExam/Course/{id}', 'v_dia_courses')->name('v_dia_courses');
        Route::get('/DiaExam/Exam/{id}', 'v_dia_exam')->name('v_dia_exam');
        Route::get('/DiaExam/History', 'dia_exam_history')->name('dia_exam_history');
    });
    Route::controller(V_QuestionController::class)->group(function(){
        Route::get('/Question', 'v_question')->name('v_question');
        Route::post('/Question', 'v_filter_question')->name('v_filter_question');
        Route::get('/Question/{id}', 'q_page')->name('q_page');
        Route::post('/Question/Solve', 'q_sol')->name('q_sol');
    });
    Route::controller(V_ExamController::class)->group(function(){
        Route::get('/Exams', 'v_exams')->name('v_exams');
        Route::post('/Exams', 'filter_exam')->name('filter_exam');
        Route::get('/Exam/{id}', 'exam_page')->name('exam_page');
    });
    Route::controller(V_CoursesController::class)->group(function(){
        Route::post('/Use_Promocode', 'use_promocode')->name('use_promocode');
        Route::post('/CheckOut/Course', 'check_out_course')->name('check_out_course');
        Route::get('/CheckOut', 'check_out')->name('check_out');
        Route::post('/Course_Payment_Money', 'course_payment_money')->name('course_payment_money');
        Route::post('/Payment_Money', 'payment_money')->name('payment_money');
        Route::get('/BuyCourse', 'new_payment')->name('new_payment');
        Route::get('/Courses', 'categories')->name('categories');
        Route::post('/Buy_Course', 'buy_course')->name('buy_course');
        Route::get('/Buy_Course', 'buy_course')->name('buy_course');
        Route::get('/Course_Payment', 'course_payment')->name('course_payment');
        Route::get('/Courses/{id}', 'courses')->name('v_courses');
        Route::get('/Course/{id}', 'course')->name('v_course');
        Route::get('/Course/Remove/{id}', 'remove_course_package')->name('remove_course_package');
    });

    Route::get('/About', [AboutController::class, 'index'])->name('about');
    Route::get('/Contact', [ContactController::class, 'index'])->name('contact_us');
    Route::post('/Contact/Msg', [ContactController::class, 'contact_msg'])->name('contact_msg');

//  Hello MR Ahmed 
Route::middleware(['auth','auth.Admin'])->prefix('Admin')->group(function(){
            
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Quizze 
    Route::controller(QuizzeController::class)->prefix('Quizze')->group(function(){
        Route::get('/', 'quizze')->name('quizze');
        Route::get('/Del/{id}', 'del_quizze')->name('del_quizze');
        Route::post('/Add', 'add_quizze')->name('add_quizze');
        Route::post('/Edit/{id}', 'edit_quizze')->name('edit_quizze');
    });

// Payment 
    Route::controller(PaymentController::class)->prefix('Payment')->group(function(){
        Route::get('/', 'payment')->name('payment');
        Route::post('/Add', 'payment_add')->name('payment_add');
        Route::post('/Edit', 'payment_edit')->name('payment_edit');
        Route::get('/Del', 'del_payment')->name('del_payment');
    });

    // Payment Request
    Route::controller(PaymentRequestController::class)->group(function(){
        Route::get('/PenddingPayment','pendding_payment')->name('pendding_payment');
        Route::post('/PenddingPayment','filter_pendding_payment')->name('filter_pendding_payment');
        Route::get('/PaymentRequest','payment_request')->name('payment_request');
        Route::post('/PaymentRequest','filter_payment_req')->name('filter_payment_req');
        Route::get('/ApprovePayment/{id}','approve_payment')->name('approve_payment');
        Route::get('/RejectedPayment/{id}','rejected_payment')->name('rejected_payment');
    });

// Marketing
    Route::controller(MarketingController::class)->prefix('Marketing')->group(function(){
        Route::get('/PromoCode', 'promo_code')->name('promo_code');
        Route::post('/PromoCode/Add', 'add_promo')->name('add_promo');
        Route::post('/PromoCode/Edit/{id}', 'edit_promo')->name('edit_promo');
        Route::get('/PromoCode/Del/{id}', 'del_promo')->name('del_promo');
        Route::get('/Commission', 'commission')->name('commission');
        Route::post('/Commission/Edit', 'edit_commission')->name('edit_commission');
        Route::get('/Users', 'users')->name('m_users');
        Route::get('/Add_Users', 'm_add_users')->name('m_add_users');
        Route::post('/Users/Add', 'affilate_add')->name('affilate_add');
        Route::get('/Payouts', 'payout_r')->name('payout_r');
        Route::post('/Payouts_Reject/{id}', 'reject_payout')->name('reject_payout');
        Route::get('/Accept_Payouts/{id}', 'accept_payout')->name('accept_payout');
        Route::post('/Filter_Payouts', 'filter_payment')->name('filter_payment');
        Route::get('/Filter_Payouts', 'filter_payment')->name('filter_payment');
    });

// Live 
    Route::controller(LiveController::class)->prefix('Live')->group(function(){
        Route::get('/', 'index')->name('sessions');
        Route::post('/Edit/{id}', 'session_edit')->name('session_edit');
        Route::post('/Add', 'add_session')->name('add_session');
        Route::get('/Del/{id}', 'del_session')->name('del_session');
        Route::get('/Groups', 'session_g')->name('session_g');
        Route::get('/Session_G/Del/{id}', 'del_session_g')->name('del_session_g');
        Route::post('/Session_G', 'g_session_edit')->name('g_session_edit');
        Route::post('/Session_G/Add', 'g_session_add')->name('g_session_add');
        Route::get('/Private_Request', 'private_request')->name('private_request');
        Route::get('/Private_Request/Approve/{id}', 'private_session_approve')->name('private_session_approve');
        Route::post('/Private_Request/Rejected', 'private_request_rejected')->name('private_request_rejected');
        Route::get('/Cancelation', 'cancelation')->name('cancelation');
        Route::get('/Cancelation/Approve/{id}', 'approve_cancelation')->name('approve_cancelation');
        Route::get('/Cancelation/Rejected/{id}', 'reject_cancelation')->name('reject_cancelation');
    });

    Route::controller(UserController::class)->prefix('Users')->group(function(){
        Route::post('/Admin/Edit', 'admin_edit')->name('admin_edit');
        Route::get('/Admin/Del/{id}', 'del_admin')->name('del_admin');
        Route::get('/Admin_Add', 'admin_add')->name('admin_add');
        Route::post('/Admin/Add', 'add_admin')->name('add_admin');
        
        Route::get('/RoleAdmin', 'role_admins')->name('role_admins_list');
        Route::post('/RoleAdmin/Edit', 'role_admin_edit')->name('role_admin_edit');
        Route::get('/RoleAdmin/Del/{id}', 'role_del_admin')->name('role_del_admin');
        Route::get('/Admin', 'admins')->name('admins_list');
        Route::post('/Admin/Filter', 'admin_filter')->name('admin_filter');
        Route::get('/Admin/Filter', 'admin_filter')->name('admin_filter');
        // Admin
        Route::post('/Admin/Edit', 'admin_edit')->name('admin_edit');
        Route::get('/Admin/Del/{id}', 'del_admin')->name('del_admin');
        Route::get('/Admin_Add', 'admin_add')->name('admin_add');
        Route::post('/Admin/Add', 'add_admin')->name('add_admin');
        
        // Teacher 
        Route::post('/Teacher_Filter', 'teacher_filter')->name('teacher_filter');
        Route::get('/Teacher_Filter', 'teacher_filter')->name('teacher_filter');
        Route::get('/Teacher', 'teacher')->name('teacher');
        Route::post('/Teacher_Edit', 'teacher_edit')->name('teacher_edit');
        Route::post('/Teacher/Add', 'add_teacher')->name('add_teacher');
        Route::get('/Teacher_Add', 'teacher_add')->name('teacher_add');
        Route::get('/Teacher/Del/{id}', 'del_teacher')->name('del_teacher');
        
        // Students  
        Route::post('/Add_Wallet', 'add_wallet')->name('add_wallet');
        Route::get('/Student', 'student')->name('student');
        Route::post('/Student_Filter', 'student_filter')->name('student_filter');
        Route::get('/Student/Info', 'stu_info')->name('stu_info');
        Route::get('/Add_Student', 'add_student')->name('add_student');
        Route::get('/Student/Del/{id}', 'del_stu')->name('del_stu');
        Route::post('/Student/Add', 'student_add')->name('student_add');
        Route::post('/Student/Edit', 'stu_edit')->name('stu_edit');
    });

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [ DashboardController::class, 'index'])->name('dashboard');


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
    Route::post('/Courses/CodeExam/Edit/{id}','examCodeEdit')->name('examCodeEdit');
    Route::get('/Courses/CodeExam/Del/{id}','examCodeDelete')->name('examCodeDelete');
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
    Route::get('/ScoreSheet','score_sheet')->name('score_sheet'); 
    Route::post('/ScoreSheet/Add','addScore')->name('addScore'); 
    Route::get('/ScoreSheet/Del/{id}','scoreDelete')->name('scoreDelete'); 
    Route::post('/ScoreSheet/Edit/{id}','scoreEdit')->name('scoreEdit'); 
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

// Packages 
Route::controller(Ad_PackagesController::class)->group(function(){
    Route::get('Packages','index')->name('admin_packages');
    Route::get('Packages/Del/{id}','del_package')->name('del_package');
    Route::post('Packages/Edit/{id}','edit_package')->name('edit_package');
    Route::post('Packages/Add','add_package')->name('add_package');
});

 
   

});

          
    // Student

Route::middleware(['auth','auth.student'])->prefix('student')->group(function(){
    Route::controller(Stu_DashboardController::class)->group(function(){
        Route::get('Student','index')->name('stu_dashboard');
    });

    Route::controller(Stu_PackageController::class)->group(function(){
        Route::get('Package/Checkout/{id}', 'package_checkout')->name('package_checkout');
        Route::post('Package/Payment/{id}', 'payment_package')->name('payment_package');
    });
    

    Route::controller(Stu_ProfileController::class)->group(function(){

        Route::get('/Profile','index')->name('stu_profile');
        Route::post('/Profile/Edit','stu_edit_profile')->name('stu_edit_profile');
    });

    Route::controller(Stu_MyCourseController::class)->prefix('MyCourses')->group(function(){
        Route::get('/','index')->name('stu_my_courses');
        Route::get('/Courses','courses')->name('stu_courses');
        Route::get('/Chapters/{id}','stu_chapters')->name('stu_chapters');
        Route::get('/Lesson/{id}/{L_id}/{idea}','stu_lessons')->name('stu_lessons');
        Route::get('/Quizze/{id}','stu_quizze')->name('stu_quizze');
        Route::post('/Quizze/Answer','quizze_ans')->name('quizze_ans');
        Route::get('/Quizze/Parallel/{id}','question_parallel')->name('question_parallel');
        Route::post('/Quizze/Solve_Parallel/{id}','solve_parallel')->name('solve_parallel');
        Route::get('/HistoryQuizze','quizze_history')->name('quizze_history');
    });
    
});

Route::get('/logout',  [LoginController::class, 'destroy'])->name('logout');

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

