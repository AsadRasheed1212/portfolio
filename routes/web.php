<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

Route::get('/',            [PageController::class, 'home'])->name('home');
Route::get('/about',       [PageController::class, 'about'])->name('about');
Route::get('/service',     [PageController::class, 'service'])->name('service');
Route::get('/works',       [PageController::class, 'works'])->name('works');
Route::get('/works/{id}',  [PageController::class, 'workDetail'])->name('work.detail');
Route::get('/credentials', [PageController::class, 'credentials'])->name('credentials');
Route::get('/contact',     [PageController::class, 'contact'])->name('contact');
Route::post('/contact',    [ContactController::class, 'send'])->name('contact.send');