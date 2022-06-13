<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert(['name'=>'Comics','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
