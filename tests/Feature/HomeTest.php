<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        //Setup
        $user = factory(User::class)->create(['name'=>'Esteban', 'lastname' => 'Quito']);
        //llamada
        $response = $this->actingAs($user)->get('/home');
        //asserts
        $response->assertSee($user->fullName());
        $response->assertStatus(200);
    }
}
