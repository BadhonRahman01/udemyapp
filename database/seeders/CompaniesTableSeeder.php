<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Modles\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();

        $companies = [];
        $faker = Faker::create();

        foreach (range(1,10) as $index){
            $companies[] =[ 
                'name' => $name = $faker->company,
                'address' => $faker->address,
                'website' => $faker->domainName,
                'email' => $faker->email,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('companies')->insert($companies);
        //Factory(Company::class, 50)->create();
       // Company::factory()->count(50)->create();
       //factory(Company::class, 10)->create();
       //Company::factory()->count(10)->create();
    }
}
