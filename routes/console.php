<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Company;
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
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

//sirve para comandos mas sencillos que no requieren tanta interaccion
Artisan::command('contact:company-clean', function (){ //comando para borrar compañias sin clientes
    $this->info('Limpiando...');
    Company::whereDoesntHave('customers')->get() //busca las que no tiene customers mediante whereDoesntHave (pre hecho, como el HasMany)
    ->each(function ($company){ //por cada compañia que devuelve el get, la guarda como compañia y la mete en la funcion
        $company->delete(); //borra
        $this->warn($company->name .' Borrada');
    });
})->describe('Elimina companias no usadas');