<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAdresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeaddresses')->insert(['name' => 'Shipping Address']);
        DB::table('typeaddresses')->insert(['name' => 'Billing Address']);
    }
}
