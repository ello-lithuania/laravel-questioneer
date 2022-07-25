<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* */
Route::get('/sukurti-klausima', [App\Http\Controllers\QuestionsController::class, 'index'])->name('create-question');
Route::post('/issaugoti-klausima', [App\Http\Controllers\QuestionsController::class, 'save'])->name('save-question');

Route::get('/visi-klausimai', [App\Http\Controllers\QuestionsController::class, 'displayAll'])->name('all-questions');
Route::get('/redaguoti-klausima/{id}', [App\Http\Controllers\QuestionsController::class, 'edit'])->name('edit-question');
Route::post('/issaugoti-redaguota-klausima/{id}', [App\Http\Controllers\QuestionsController::class, 'saveEditQuestion'])->name('save-editQuestion');


Route::get('/sukurti-klausimyna', [App\Http\Controllers\QuestioneerController::class, 'save'])->name('create-questioneer');
Route::post('/issaugoti-klausimyna', [App\Http\Controllers\QuestioneerController::class, 'store'])->name('save-questioneer');
Route::get('/isjungti-klausimyna/{id}', [App\Http\Controllers\QuestioneerController::class, 'updateStatus'])->name('disable-questioneer');

Route::get('/visi-klausimynai', [App\Http\Controllers\QuestioneerController::class, 'displayAll'])->name('all-questioneers');
Route::get('/redaguoti-klausimyna/{id}', [App\Http\Controllers\QuestioneerController::class, 'edit'])->name('edit-questioneer');
Route::post('/issaugoti-redaguota-klausimyna/{id}', [App\Http\Controllers\QuestioneerController::class, 'update'])->name('save-edited-questioneer');

Route::get('/atsakyti/{id}', [App\Http\Controllers\QuestioneerController::class, 'index'])->name('answer-questioneer');
