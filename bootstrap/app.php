<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function() {
            //add custom file with routes
            Route::prefix('transactions')->group(base_path('routes/transactions.php'));
            Route::prefix('users')->group(base_path('routes/users.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->prepend(\App\Http\Middleware\AssignRequestId::class);
        $middleware->web(append: [], prepend: [], replace: []); //MW only for web requests
        $middleware->api(); //MW only for API requests
        //create alias for MW
        $middleware->alias(
            [
                "request" => \App\Http\Middleware\AssignRequestId::class
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
