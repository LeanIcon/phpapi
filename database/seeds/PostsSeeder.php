<?php

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        $posts = [];
        $faker = Factory::create();
        $date =  Carbon::create('2019-06-01 14:00:00') ;

        for ($i=0; $i < 10; $i++)
        {
            $image = "Post_Image_".rand(1,5). ".jpg";
            // $date = date("Y-m-d H:i:s", strtotime("2019-06-01 14:00:00 +{$i} days"));
            $date->addDays(1);
            $publishedDate = clone($date);
            $createdAtDate = clone($date);


            $posts[] = [
                    "author_id" => rand(1,3),
                    "title" => $faker->sentence(rand(8,12)),
                    "excerpt" => $faker->text(rand(250, 300)),
                    "body" => $faker->paragraph(rand(10, 15), true),
                    "slug" => $faker->slug(),
                    "image" => rand(0, 1) == 1 ? $image : NULL,
                    "created_at" => $createdAtDate,
                    "updated_at" => $createdAtDate,
                    "published_at" => $i < 5  ? $publishedDate : (rand(0,1) == 0 ? NULL :  $publishedDate->addDays($i + 4)),
                    "view_count" => rand(1, 10) * 10,

            ];
        }

        DB::table('posts')->insert($posts);
    }
}
