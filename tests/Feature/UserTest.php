<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCollection()
    {
        User::factory()->count(2)->create();

        $response = $this->getJson('/users');

        $response->assertSuccessful();
        $response->dump();
    }
}
