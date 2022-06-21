<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PhotoTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            UsersRolesTableSeeder::class,
            PostsTableSeeder::class,
            CategoriesTableSeeder::class,
            BrandsTableSeeder::class,
            ProductCategorySeeder::class,
            ProductsTableSeeder::class,
            ReviewsTableSeeder::class,
            TypeAdresSeeder::class,
            /*AddressSeeder::class,
            AddressesTypeAdresTableSeeder::class,
            UsersAddressesTableSeeder::class,*/
        ]);
    }
}
