<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            ['name' => 'admin', 'display_name' => 'Quản trị viên'], //1
            ['name' => 'driver', 'display_name' => 'Tài xế'], //2
            ['name' => 'sender', 'display_name' => 'Người gửi'], //3
            ['name' => 'receiver', 'display_name' => 'Người nhận'], //4
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }
    }
}
