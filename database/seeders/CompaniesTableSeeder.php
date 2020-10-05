<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company; //importo los users

class CompaniesTableSeeder extends Seeder
{
    //\App\Models\Company::factory()->count(3)->create(); para crear desde tinker 3 usuarios de prueba con la factory
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(3)->create();
    }
}
