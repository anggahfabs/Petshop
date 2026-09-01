<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
        $middleware->alias([
            'auth' => Authenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (\Throwable $e, Request $request) {
            if ($e instanceof ValidationException) {
                return null;
            }

            if (! $request->expectsJson() && in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
                $message = $e->getMessage();

                if ($e instanceof QueryException) {
                    $message = ($e->errorInfo[1] ?? null) === 1062
                        ? 'Data dengan nilai yang sama sudah ada. Gunakan nama atau kode yang berbeda.'
                        : 'Terjadi masalah database saat memproses data.';
                }

                return back()
                    ->withInput()
                    ->with('error', 'Aksi gagal: '.$message);
            }

            return null;
        });
    })
    ->create();
