<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Branch::factory(3)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Client::factory(100)->create();
        \App\Models\Payment::factory(6)->create();
        \App\Models\Employee::factory(10)->create();
        \App\Models\Sale::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
