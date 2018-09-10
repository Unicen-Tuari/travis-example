<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
class UserTest extends TestCase
{

    public function testfullName()
    {
        $user = factory(User::class)->create(['name'=>'Esteban', 'lastname' => 'Quito']);
        $fullName = $user->fullName();
        $this->assertEquals($fullName, 'Quito, Esteban');
    }
}
