<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MailController;

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

Route::get('/', [DashboardController::class, 'home']);

Route::get('/about-me', function () {
    return view('me');
});


Route::get('/dashboard', [DashboardController::class, 'show']);

Route::get('/manage-articles', [DashboardController::class, 'article_master_page'])->name('manage-articles');

Route::get('/manage-portfolio', [DashboardController::class, 'portfolio_master_page'])->name('manage-portfolio');

Route::get('/emails', [DashboardController::class, 'manage_mail']);

Route::get('/edit-login-key', [DashboardController::class, 'edit_login_key']);

Route::post('/check', [DashboardController::class, 'check'])->name('auth.check');

Route::post('/edit_login_key', [DashboardController::class, 'update'])->name('auth.edit');

Route::post('/dwnld_cv', [DashboardController::class, 'dwnld_cv']);

Route::get('/xxx-login', [DashboardController::class, 'login']);

Route::post('/emailajax', [DashboardController::class, 'news_subs'])->name('emailajax.post');;

Route::get('/logout', [DashboardController::class, 'logout']);

Route::post('/delete_mail', [DashboardController::class, 'destroy_mail'])->name('mail.destroy');

Route::resource('project', ProjectController::class);

Route::get('project/{project_slug}', [ProjectController::class, 'show_project'])->name('portfolio');

Route::resource('article', ArticleController::class);

Route::get('blog/{blog_slug}', [ArticleController::class, 'show_blog'])->name('blog');

Route::get('projects/{project_slug}', [ProjectController::class, 'show_project_write_up'])->name('projects');

Route::get('/create-email', [MailController::class, 'viewmail'])->name('email');

Route::post('/sent-it', [MailController::class, 'sendEmail'])->name('send_mail');