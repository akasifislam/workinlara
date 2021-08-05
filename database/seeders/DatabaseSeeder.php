<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Test;
use App\Models\User;
use Database\Factories\TestFactory;
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
        // \App\Models\User::factory(10)->create();
        // Test::factory(4)->create();
        // Employee::factory(30)->create();

        User::factory(200)->create();
        // $this->call([
        //     UserSeeder::class
        // ]);
    }
}
