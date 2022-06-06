<?php

namespace Database\Seeders;

use App\Models\Technician;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TecnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $admin = [
            'specialist_id' => 1,
            'user_id' => 3,
            'desc' => 'Teknisi yang berkualitas',
            'address' => 'Jr. Yap Tjwan Bing No. 837, Metro 38096, Babel',
            'certification' => 'Certificate of Profession',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('technician')->insert($admin);
        Technician::factory(15)->create();
    }
}
