<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gyms')->insert([
            [
                'name' => 'Macfit Main Campus',
                'longitude' => '36.8219',
                'latitude' => '-1.2921',
                'description' => 'Our flagship facility featuring premium strength equipment, a dedicated HIIT zone, and a recovery lounge.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Macfit Downtown',
                'longitude' => '36.8120',
                'latitude' => '-1.2850',
                'description' => 'Conveniently located for workers, this branch focuses on express HIIT classes and cardio endurance training.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Macfit Westlands',
                'longitude' => '36.8044',
                'latitude' => '-1.2641',
                'description' => 'A boutique-style gym specializing in Yoga, Mobility, and personalized Nutrition Coaching sessions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}