<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //$middleware->register('auth', 'App\Http\Middleware\Authenticate');
        //$middleware->register('guest', 'App\Http\Middleware\RedirectIfAuthenticated');
        $middleware->alias([
            'auth' => Authenticate::class,
            'guest'=> RedirectIfAuthenticated::class,
        ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
