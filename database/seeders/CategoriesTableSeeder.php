<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(['name'=>'Star Wars Comics','slug'=>'star-wars-comics','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('categories')->insert(['name'=>'Marvel Comics','slug'=>'marvel-comics','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('categories')->insert(['name'=>'DC Comics','slug'=>'dc-comics','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('categories')->insert(['name'=>'IDW PUBLISHING Comics','slug'=>'inw-publishing-comics','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);

        $categories = Category::all();
        Post::all()->each(function ($post) use ($categories){
            $post->categories()->attach(
              $categories->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
