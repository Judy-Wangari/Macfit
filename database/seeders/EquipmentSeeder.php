<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipment')->insert([
            [
                'model_no' => 'TM-X100-2026',
                'name' => 'Pro-Run Treadmill',
                'usage' => 'Used for cardiovascular endurance and interval running. Max speed 20km/h.',
                'value' => 120000.00,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model_no' => 'SR-HD-05',
                'name' => 'Heavy Duty Squat Rack',
                'usage' => 'Used for squats, overhead presses, and pull-ups. Max load 400kg.',
                'value' => 45000.50,
                'status' => 'in_use',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model_no' => 'DB-SET-25',
                'name' => 'Rubber Hex Dumbbell Set (2.5kg - 25kg)',
                'usage' => 'Versatile free weights for strength and hypertrophy training.',
                'value' => 35000.00,
                'status' => 'maintenance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model_no' => 'BC-LE-01',
                'name' => 'Commercial Bench Press',
                'usage' => 'Chest and tricep development. Includes adjustable safety bars.',
                'value' => 28000.00,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}