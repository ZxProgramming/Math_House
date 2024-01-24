<?php

use App\Actions\SamplePermissionApi;
use App\Actions\SampleRoleApi;
use App\Actions\SampleUserApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizzeController;
use App\Http\Controllers\Admin\DiagnosticExamController;

use App\Http\Controllers\Visitor\CoursesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/question_type', [QuestionController::class, 'question_type'])->name('question_type')->middleware('auth:sanctum');
Route::get('/quize_data', [QuizzeController::class, 'quize_data'])->name('quize_data')->middleware('auth:sanctum');
Route::get('/dia_exam_data', [DiagnosticExamController::class, 'dia_exam_data'])->name('dia_exam_data')->middleware('auth:sanctum');
Route::get('/exam_del_q', [DiagnosticExamController::class, 'exam_del_q'])->name('exam_del_q')->middleware('auth:sanctum');
Route::get('/exam_add_q', [DiagnosticExamController::class, 'exam_add_q'])->name('exam_add_q')->middleware('auth:sanctum');
Route::get('/quize_del_q', [QuizzeController::class, 'quize_del_q'])->name('quize_del_q')->middleware('auth:sanctum');
Route::get('/quize_add_q', [QuizzeController::class, 'quize_add_q'])->name('quize_add_q')->middleware('auth:sanctum');
Route::get('/buy_chapters', [CoursesController::class, 'buy_chapters'])->name('buy_chapters')->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {

    Route::get('/users', function (Request $request) {
        return app(SampleUserApi::class)->datatableList($request);
    });

    Route::post('/users-list', function (Request $request) {
        return app(SampleUserApi::class)->datatableList($request);
    });

    Route::post('/users', function (Request $request) {
        return app(SampleUserApi::class)->create($request);
    });

    Route::get('/users/{id}', function ($id) {
        return app(SampleUserApi::class)->get($id);
    });

    Route::put('/users/{id}', function ($id, Request $request) {
        return app(SampleUserApi::class)->update($id, $request);
    });

    Route::delete('/users/{id}', function ($id) {
        return app(SampleUserApi::class)->delete($id);
    });


    Route::get('/roles', function (Request $request) {
        return app(SampleRoleApi::class)->datatableList($request);
    });

    Route::post('/roles-list', function (Request $request) {
        return app(SampleRoleApi::class)->datatableList($request);
    });

    Route::post('/roles', function (Request $request) {
        return app(SampleRoleApi::class)->create($request);
    });

    Route::get('/roles/{id}', function ($id) {
        return app(SampleRoleApi::class)->get($id);
    });

    Route::put('/roles/{id}', function ($id, Request $request) {
        return app(SampleRoleApi::class)->update($id, $request);
    });

    Route::delete('/roles/{id}', function ($id) {
        return app(SampleRoleApi::class)->delete($id);
    });

    Route::post('/roles/{id}/users', function (Request $request, $id) {
        $request->merge(['id' => $id]);
        return app(SampleRoleApi::class)->usersDatatableList($request);
    });

    Route::delete('/roles/{id}/users/{user_id}', function ($id, $user_id) {
        return app(SampleRoleApi::class)->deleteUser($id, $user_id);
    });



    Route::get('/permissions', function (Request $request) {
        return app(SamplePermissionApi::class)->datatableList($request);
    });

    Route::post('/permissions-list', function (Request $request) {
        return app(SamplePermissionApi::class)->datatableList($request);
    });

    Route::post('/permissions', function (Request $request) {
        return app(SamplePermissionApi::class)->create($request);
    });

    Route::get('/permissions/{id}', function ($id) {
        return app(SamplePermissionApi::class)->get($id);
    });

    Route::put('/permissions/{id}', function ($id, Request $request) {
        return app(SamplePermissionApi::class)->update($id, $request);
    });

    Route::delete('/permissions/{id}', function ($id) {
        return app(SamplePermissionApi::class)->delete($id);
    });
});
