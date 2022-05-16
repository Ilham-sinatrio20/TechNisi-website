<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $specialization = [
            ['category' => 'Mesin'],
            ['category' => 'Software'],
            ['category' => 'Elektronik'],
            ['category' => 'Repair'],
            ['category' => 'Furniture'],
        ];
        DB::table('specialization')->insert($specialization);
    }
}
