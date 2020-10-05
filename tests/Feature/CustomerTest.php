<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Customer;

class CustomersTest extends TestCase //para runear todos los tests, introducir comando 
                                        // vendor/bin/phpunit --filter CustomersTest
                                        //para hacer uno a uno, introducir el nombre de la funcion despues de filter
{
    use RefreshDatabase; //para que refresque la db de testeo
    
    /** @test */
    public function test_redirect_if_user_not_logged_while_trying_to_see_customers()
    {
        $response = $this->get('/customers')->assertRedirect('/login');//comprueba que redirije a login
    }

    /** @test */
    public function test_authenticated_users_can_see_the_customers_list()
    {
        $this->actingAs(\App\Models\User::factory()->create());//creo un user para testear con el

        $response = $this->get('/customers')->assertOk(); //comprueba que todo va ok y actuo como tal
    }

    /** @test */
    public function test_a_customer_can_be_added_through_the_form()
    {   
       
        $this->actingAs(\App\Models\User::factory()->create(
            ['email' => 'admin@admin.com']//con esto overwriteo el mail del correo creado de forma random por el factory, para que tenga mail admin y tenga permiso (como yo he configurado)
        ));//creo un user para testear con el y actuo como tal
        $response = $this->post('/customers', [
            'name' => ' Test user',
            'email' => 'test@test.com',
            'active' => 1,
            'company_id' => 1,
        ]);

        $this->assertCount(1, Customer::all()); //comprueba que haya un usuario (el que he creado y metido)
    }
}
