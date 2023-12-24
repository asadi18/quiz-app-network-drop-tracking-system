<?php

use LaraCore\App\Http\Controllers\QuizController;
use LaraCore\App\Http\Controllers\UserController;

use LaraCore\Framework\Routers\Router;

// for User 
Router::get('/', [UserController::class, 'loginForm'])->middleware('guest')->name('login.form');
Router::post('/login', [UserController::class, 'login']);
Router::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

// for quiz
Router::get('/quiz', [QuizController::class, 'show'])->middleware('auth')->name('quiz.show');

// for result
Router::get('/result', [QuizController::class, 'result'])->middleware('auth')->name('quiz.result');
Router::post('/result-store', [QuizController::class, 'store'])->middleware('auth')->name('result.store');


// Router::get('/home/{id}', [HomeController::class, 'index'])->middleware('auth')->name('home.index');
//Router::get('/home/{id}', [HomeController::class, 'index'])->name('home.index');
// $routes->get('users/{id}/{user}/show', [UserController::class, 'show']);
// $routes->get('users/{id:\d+}/{profile}', 'app/Http/Controllers/edit-user.php');