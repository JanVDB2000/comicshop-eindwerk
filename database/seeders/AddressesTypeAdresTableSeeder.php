<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Role;
use App\Models\Typeaddress;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressesTypeAdresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $typeaddress =Typeaddress::all();
        Address::all()->each(function ($address) use ($typeaddress){
            $address->TypeAdres()->attach(
                    $typeaddress->random(rand(1,2))->pluck('id')->toArray()
            );
        });

    }
}
