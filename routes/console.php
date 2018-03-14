<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->error(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('hello {name}', function ($name) {
    $this->info('Hello ' . $name);
})->describe('print hello world');
