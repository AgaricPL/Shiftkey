<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Car;
use App\User;

class CarTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);


    }

    public function testGetAllCars()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->get('/');

        $this->seed('CarSeeder');
        $this->artisan('db:seed');

        // $cars = factory(Car::class, 2)->make([
        //     'user_id' => $user->id
        // ]);

        $response = $this->json('GET', 'api/car');
        $response->assertJsonStructure(
            [
                '*' => [
                    'make',
                    'model',
                    'year'
                ]
            ]
        );
        $response->assertStatus(200);

    }
}
