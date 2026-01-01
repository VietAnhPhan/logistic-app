<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('drivers_status')->insert([
            ['status' => 'available'],
            ['status' => 'on_delivery'],
            ['status' => 'off_duty'],
            ['status' => 'inactive'],
        ]);
    }
}
