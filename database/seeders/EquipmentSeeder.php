<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipment::create([
            'model_no'=>'45-kmjhyyh-0988',
            'name'=>'rope',
            'usage'=>'jumping',
            'value'=>'145.23',
            'status'=>'available'
           
        ]);
    }
}
