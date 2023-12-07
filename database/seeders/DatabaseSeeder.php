<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //TeamSeeder::class,
            //NflMatchSeeder::class,
            QuestionTypeSeeder::class,
            WeekSeeder::class,
            FormSeeder::class,
        ]);
        
        User::create([
            'name' => 'admin',
            'email' => 'asd@asd.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'team_id' => 14
        ]);
    }
}
