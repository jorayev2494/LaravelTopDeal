<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();
        Artisan::call("cache:clear");
        Artisan::call("config:clear");
        Artisan::call("migrate:fresh --seed");
        // Artisan::call("migrate:fresh");

        // dd("Strt test");

        return $app;
    }
}
