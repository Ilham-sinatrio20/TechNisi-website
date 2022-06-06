<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $admin = [
            'address' => 'Gg. Bazuka Raya No. 642, Palangka Raya 49001, Kalbar',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('customer')->insert($admin);
        Customer::factory(20)->create();
    }
}
