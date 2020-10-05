<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; //importo los users

class UsersTableSeeder extends Seeder
{
    //\App\Models\User::factory()->count(3)->create(); para crear desde tinker 3 usuarios de prueba con la factory
     /* Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
    }
}
