<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('shipment_status')->insert([
            ['status' => 'pending'],
            ['status' => 'picked_up'],
            ['status' => 'stocked'],
            ['status' => 'out_for_delivery'],
            ['status' => 'in_transit'],
            ['status' => 'delivered'],
            ['status' => 'returned'],
            ['status' => 'canceled'],
        ]);
    }
}
