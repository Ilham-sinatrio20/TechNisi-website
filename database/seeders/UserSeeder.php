<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
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
                'username' => 'admin',
                'phone' => '08113652797',
                'id_role' => 1,
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'Ilham S Gumelar',
                'email' => 'Ilham_sg@gmail.com',
                'username' => 'users',
                'phone' => '08113652797',
                'id_role' => 2,
                'password' => bcrypt('user123'),
            ],
            [
                'name' => 'Michael Schumacher',
                'email' => 'schumi@gmail.com',
                'username' => 'schumi90',
                'phone' => '08113652797',
                'id_role' => 3,
                'password' => bcrypt('user123'),
            ]
        ];
        DB::table('users')->insert($admin);
        User::factory(30)->create();
    }
}
