<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request; // Add this line

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // 1. Tell Laravel where the login page is for guests
        $middleware->redirectGuestsTo('/admin/login');

        // 2. Register your custom Prevent Back History middleware
        // Make sure you created the file app/Http/Middleware/PreventBackHistory.php
        $middleware->alias([
            'prevent-back' => \App\Http\Middleware\PreventBackHistory::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();