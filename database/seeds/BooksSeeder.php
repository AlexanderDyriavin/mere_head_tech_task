<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BooksSeeder extends Seeder
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
            DB::table('books')->insert([
                'title' => $faker->text(12),
                'pages_count' => $faker->numberBetween(20, 200),
                'annotation' => $faker->realText(25),
                'cover_image' => $faker->imageUrl(200,200),
                'authors_id' => $faker->numberBetween(1, 10),
                'user_id' => NULL,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
