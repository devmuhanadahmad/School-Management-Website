<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classroom;
use App\Models\Myparent;
use App\Models\Schoolgrade;
use App\Models\Section;
use App\Models\Specialization;
use App\Models\Teacher;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Schoolgrade::factory(5)->create();
        Classroom::factory(5)->create();
        Specialization::factory(5)->create();
        Myparent::factory(5)->create();
        Teacher::factory(5)->create();
        Section::factory(5)->create();
    }
}
