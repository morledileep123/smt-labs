<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('/admin/login',[LoginController::class, 'login'])->name('login');
    Route::post('/admin/login', [LoginController::class, 'loginUser'])->name('login-user')->middleware('throttle:2,1');

});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/admin/dashboard',[LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/contacts', [App\Http\Controllers\Admin\ContactsController::class, 'contactList'])->name('contacts');
    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/admin/jobs',[App\Http\Controllers\Admin\JobsController::class, 'index'])->name('job');
    Route::get('/admin/create/job',[App\Http\Controllers\Admin\JobsController::class, 'create'])->name('create-job');
    Route::post('/admin/store/job',[App\Http\Controllers\Admin\JobsController::class, 'store'])->name('store-job');
    Route::get('/admin/job/edit/{id}',[App\Http\Controllers\Admin\JobsController::class, 'edit'])->name('job-edit');
    Route::post('/admin/job/update/{id}', [App\Http\Controllers\Admin\JobsController::class, 'update'])->name('job-update');
    Route::get('/admin/job/delete/{id}', [App\Http\Controllers\Admin\JobsController::class, 'destroy'])->name('job-destroy');

    Route::get('/admin/blogs',[App\Http\Controllers\Admin\BlogsController::class, 'index'])->name('blog');
    Route::get('/admin/create/blog',[App\Http\Controllers\Admin\BlogsController::class, 'create'])->name('create-blog');
    Route::post('/admin/store/blog',[App\Http\Controllers\Admin\BlogsController::class, 'store'])->name('store-blog');
    Route::get('/admin/blog/edit/{id}',[App\Http\Controllers\Admin\BlogsController::class, 'edit'])->name('blog-edit');
    Route::post('/admin/blog/update/{id}', [App\Http\Controllers\Admin\BlogsController::class, 'update'])->name('blog-update');
    Route::get('/admin/blog/delete/{id}', [App\Http\Controllers\Admin\BlogsController::class, 'destroy'])->name('blog-destroy');

});