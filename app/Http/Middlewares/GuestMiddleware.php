<?php

namespace LaraCore\App\Http\Middlewares;

use LaraCore\Framework\Request;
use LaraCore\Framework\Session;

class GuestMiddleware
{
  public function handle(Request $request, $next)
  {
    if (Session::get('user')) {
      return redirect()->route('quiz.show');
    }
    return $next($request);
  }
}