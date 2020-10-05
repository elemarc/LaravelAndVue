<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /** php artisan db:seed para seedear la DB
     * Seed the application's database.
     *
     * @return void
     */
    public function run() //make:seeder UYsersTableSeeder p.e.
    {
        $this->call(UsersTableSeeder::class); //llamo al seeder de users
        $this->call(CompaniesTableSeeder::class); //llamo al seeder de companies
        $this->call(CustomersTableSeeder::class); //llamo al seeder de customers
        
    }
}
