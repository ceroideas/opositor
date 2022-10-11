<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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


Route::get('/', function () {

    return redirect('login');
//    return view('welcome');
});

Route::get('login', ['uses' => function () {
    return view('login');
}, 'as' => 'login']);

Route::get('/waitroom', [MainController::class, 'waitroom'])->middleware('auth');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'filter.user']], function() {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/temas', [UserController::class, 'temas']);
    Route::get('/mis-temas', [UserController::class, 'mis_temas']);
    Route::get('/tema/{id}', [UserController::class, 'tema_single'])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'filter.admin']], function() {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/temas-show', [AdminController::class, 'temas_show']);
    Route::get('/temas-add', [AdminController::class, 'temas_add']);
    Route::post('/temas-store', [AdminController::class, 'temas_store']);
    Route::get('/temas/{id}', [AdminController::class, 'temas_single'])->where('id', '[0-9]+');
    Route::get('/temas/{id}/add-subtema', [AdminController::class, 'temas_add_subtema'])->where('id', '[0-9]+');
    Route::get('/temas/{id}/edit-subtema/{subtema_id}', [AdminController::class, 'temas_edit_subtema'])->where(['id' => '[0-9]+', 'subtema_id' => '[0-9]+']);
    Route::post('/temas/{id}/edit-subtema/{subtema_id}', [AdminController::class, 'temas_update_subtema'])->where(['id' => '[0-9]+', 'subtema_id' => '[0-9]+']);

    Route::post('/temas/{id}/add-subtema', [AdminController::class, 'subtema_store'])->where('id', '[0-9]+');

    Route::get('/temas/{tema_id}/subtema/{subtema_id}', [AdminController::class, 'subtema_view'])->where(['tema_id' => '[0-9]+', 'subtema_id' => '[0-9]+']);
    Route::post('/temas/{tema_id}/subtema/{subtema_id}/destroy', [AdminController::class, 'temas_destroy_subtema'])->where(['tema_id' => '[0-9]+', 'subtema_id' => '[0-9]+']);

    Route::get('/temas/{tema_id}/subtema/{subtema_id}/add-question', [AdminController::class, 'question_add'])->where(['tema_id' => '[0-9]+', 'subtema_id' => '[0-9]+']);
    Route::post('/temas/{tema_id}/subtema/{subtema_id}/add-question', [AdminController::class, 'question_store'])->where(['tema_id' => '[0-9]+', 'subtema_id' => '[0-9]+']);

    Route::get('/temas/{tema_id}/subtema/{subtema_id}/edit-question', [AdminController::class, 'question_edit'])->where(['tema_id' => '[0-9]+', 'subtema_id' => '[0-9]+']);
    Route::post('/temas/{tema_id}/subtema/{subtema_id}/edit-question', [AdminController::class, 'question_update'])->where(['tema_id' => '[0-9]+', 'subtema_id' => '[0-9]+']);

    Route::post('/temas/{tema_id}/subtema/{subtema_id}/delete-question', [AdminController::class, 'question_delete'])->where(['tema_id' => '[0-9]+', 'subtema_id' => '[0-9]+']);

    Route::get('/manage-users', [AdminController::class, 'manage_users']);
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
