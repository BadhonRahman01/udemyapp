<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Modles\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->truncate();

        $contacts = [];
        $faker = Faker::create();

        foreach (range(1,10) as $index){
            $contacts[] =[ 
                'first_name' =>$faker->firstName,
                'last_name' => $faker->lasttName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('contacts')->insert($contacts);
    }
}
