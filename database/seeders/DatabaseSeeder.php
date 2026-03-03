<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
       $this->call([
        RoleSeeder::class,
        GymSeeder::class,
        EquipmentSeeder::class,
        UserSeeder::class,
        CategorySeeder::class,
        BundleSeeder::class,
        SubscriptionSeeder::class,
       ]);
    }
}
