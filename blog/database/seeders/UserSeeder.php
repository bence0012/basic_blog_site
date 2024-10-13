<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'Test1',
            'email' => 'test1@example.com',
            'password' => 'qwertzui'
        ]);
        User::factory()->create([
            'name' => 'Test2',
            'email' => 'test2@example.com',
            'password' => 'qwertzui'
        ]);
        User::factory()->create([
            'name' => 'Test3',
            'email' => 'test3@example.com',
            'password' => 'qwertzui'
        ]);
    }
}
