<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_non_user_creating_post(): void
    {
        $response = $this->post('/posts/create',[
            'title'=> 'aaaa',
            'content'=>'aaaaaaaaaa'
        ]);

        $response->assertStatus(302);
    }

    public function test_user_creating_post(): void
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/posts/create',[
            'title'=> 'aaaa',
            'content'=>'aaaaaaaaaa'
        ]);

        $response->assertStatus(201);
    }
}
