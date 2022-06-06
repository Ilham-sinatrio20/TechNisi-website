<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $admin = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin_id_1354',
                'phone' => '081234567899',
                'id_role' => 1,
                'email_verified_at' => now(),
                'password' => bcrypt('admin123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ilham S Gumelar',
                'email' => 'Ilham_sg@gmail.com',
                'username' => 'ilham_sg20',
                'phone' => '081136527978',
                'id_role' => 2,
                'email_verified_at' => now(),
                'password' => bcrypt('user123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Schumacher',
                'email' => 'schumi@gmail.com',
                'username' => 'schumi90_44',
                'phone' => '081136527444',
                'id_role' => 3,
                'email_verified_at' => now(),
                'password' => bcrypt('user123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('users')->insert($admin);
        // User::factory(35)->create();
    }
}
