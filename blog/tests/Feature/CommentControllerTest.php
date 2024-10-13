<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;


class CommentControllerTest extends TestCase
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

    public function test_non_user_tries_deleting_non_users_comment(): void
    {
        User::factory()->hasPosts(1)->create();
        Comment::factory()->create([
            'user_id'=> null,
            'post_id'=> 1
        ]);
        $response = $this->delete('/posts/1/comments/1');

        $response->assertStatus(302);
    }

    public function test_not_owner_user_tries_deleting_other_users_comment(): void
    {
        User::factory()->hasPosts(1)->create();
        Comment::factory()->create([
            'user_id'=> 1,
            'post_id'=> 1
        ]);
        $user=User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/posts/1/comments/1');

        $response->assertStatus(403);
    }

    public function test_not_owner_user_tries_deleting_non_users_comment(): void
    {
        User::factory()->hasPosts(1)->create();
        Comment::factory()->create([
            'user_id'=> null,
            'post_id'=> 1
        ]);
        $user=User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete('/posts/1/comments/1');

        $response->assertStatus(403);
    }

    public function test_owner_user_tries_deleting_other_users_comment(): void
    {
        $user=User::factory()->hasPosts(1)->create();
        Comment::factory()->create([
            'user_id'=> 2,
            'post_id'=> 1
        ]);
        $this->actingAs($user);

        $response = $this->delete('/posts/1/comments/1');

        $response->assertStatus(200);
    }

    public function test_owner_user_tries_deleting_non_users_comment(): void
    {
        $user=User::factory()->hasPosts(1)->create();
        Comment::factory()->create([
            'user_id'=> null,
            'post_id'=> 1
        ]);
        $this->actingAs($user);

        $response = $this->delete('/posts/1/comments/1');

        $response->assertStatus(200);
    }

}
