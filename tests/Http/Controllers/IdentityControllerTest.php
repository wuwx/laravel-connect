<?php

namespace Wuwx\LaravelConnect\Tests\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IdentityControllerTest extends TestCase
{
    public function testGuestShouldNotGetIndex()
    {
        $response = $this->get("/connect/identities");
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testUserShouldGetIndex()
    {
        $user = factory('App\User')->create();
        $response = $this->actingAs($user)->get("/connect/identities");
        $response->assertStatus(200);
    }

    public function testUserShouldDeleteIdentity()
    {
        $identity = factory('Wuwx\LaravelConnect\Identity')->create();
        $user = $identity->user;
        $response = $this->actingAs($user)->delete("/connect/identities/{$identity->id}");
        $response->assertStatus(302);
        $response->assertRedirect('/connect/identities');
    }
}
