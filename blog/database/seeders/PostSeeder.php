<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::factory()->hasComments(5)->create([
            'user_id'=>'1'
        ]);
        Post::factory()->hasComments(5)->create([
            'user_id'=>'2'
        ]);
        Post::factory()->hasComments(5)->create([
            'user_id'=>'3'
        ]);
    }
}
