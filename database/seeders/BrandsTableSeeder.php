<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert(['name'=>'Star Wars','description'=>'description Star Wars','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('brands')->insert(['name'=>'Marvel','description'=>'description Marvel','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('brands')->insert(['name'=>'DC','description'=>'description DC','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('brands')->insert(['name'=>'IDW PUBLISHING','description'=>'description IDW PUBLISHING','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
    }
}





