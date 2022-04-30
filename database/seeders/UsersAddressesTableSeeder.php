<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Typeaddress;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = Address::all();
        User::all()->each(function ($user) use ($address){
            $user->addresses()->attach(
                $address->random(rand(1,2))->pluck('id')->toArray()
            );
        });
    }
}
