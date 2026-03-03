<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $subscriptions = [
            // Ellah (User ID 2) subscribes to Powerlifting (Bundle ID 1)
            ['user_id' => 2, 'bundle_id' => 1], 
            
            // Ellah also subscribes to HIIT (Bundle ID 2)
            ['user_id' => 2, 'bundle_id' => 2], 
            
            // Mugure (User ID 1) subscribes to Nutrition (Bundle ID 5)
            ['user_id' => 1, 'bundle_id' => 5], 
            ['user_id' => 1, 'bundle_id' => 3], 
            ['user_id' => 1, 'bundle_id' => 2], 

        ];

        foreach ($subscriptions as $data) {
            Subscription::create([
                'user_id' => $data['user_id'],
                'bundle_id' => $data['bundle_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
