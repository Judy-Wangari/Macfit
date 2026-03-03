<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Mugure',
            'email' => 'mugurejudyd@gmail.com',
            'password' => Hash::make('Mug123'),
            'user_image' => 'C:\xampp\htdocs\Macfit\public\storage\users\ow6n4LNJn09KTvqO7lf5YgsvAMIr9TLzxLUglN4r.jpg',
            'role_id' => 1, // Admin
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Regular User
        User::create([
            'name' => 'Ellah',
            'email' => 'ellahblessingg@gmail.com',
            'password' => Hash::make('Ell123'),
            'user_image' => 'C:\xampp\htdocs\Macfit\public\storage\users\ow6n4LNJn09KTvqO7lf5YgsvAMIr9TLzxLUglN4r.jpg',
            'role_id' => 4, // User
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }
}