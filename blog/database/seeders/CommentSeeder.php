<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comment;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Comment::factory()->count(3)->create([
            'user_id'=>null,
            'post_id'=>1
        ]);
        Comment::factory()->count(3)->create([
            'user_id'=>null,
            'post_id'=>2
        ]);
        Comment::factory()->count(3)->create([
            'user_id'=>null,
            'post_id'=>3
        ]);
    }
}
