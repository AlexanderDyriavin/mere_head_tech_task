<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        foreach (range(1,10) as $index){
            DB::table('authors')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
            ]);
        }
    }
}
