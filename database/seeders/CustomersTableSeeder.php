<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersTableSeeder extends Seeder
{ 
    //\App\Models\Customer::factory()->count(3)->create(); para crear desde tinker 3 usuarios de prueba con la factory
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(3)->create();
    }
}
