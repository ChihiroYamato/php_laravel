<?php

$app = new Illuminate\Foundation\Application(dirname(__DIR__));

$app->singleton(
    abstract: Illuminate\Contracts\Http\Kernel::class,
    concrete: App\Http\Kernel::class
);

$app->singleton(
    abstract: Illuminate\Contracts\Console\Kernel::class,
    concrete: App\Console\Kernel::class
);

$app->singleton(
    abstract: Illuminate\Contracts\Debug\ExceptionHandler::class,
    concrete: App\Exceptions\Handler::class
);

return $app;
