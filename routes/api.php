<?php

use LaraCore\App\Http\Controllers\QuizController;
use LaraCore\Framework\Routers\Router;

// insert quiz 
Router::post('/quiz/create', [QuizController::class, 'store']);