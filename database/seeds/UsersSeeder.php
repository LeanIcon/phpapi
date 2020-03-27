<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        //reset the table
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('users')->truncate();

        DB::table('users')->insert([
                [
                    'name' => "Admin Jack",
                    "slug" =>"admin-doe",
                    'email' => "admin@blog.com",
                        'password' => bcrypt('secret'),
                        "bio" => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "John Doe",
                    "slug" =>"john-doe",
                    'email' => "johndoe@test.com",
                        'password' => bcrypt('secret'),
                        "bio" => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Jane Doe",
                    "slug" =>"jane-doe",
                    'email' => "janedoe@test.com",
                    'password' => bcrypt('secret'),
                    "bio" => $faker->text(rand(250, 300))
                ],
                [
                'name' => "Mark Otoo",
                "slug" =>"mark-otoo",
                'email' => "markotoo@test.com",
                'password' => bcrypt('secret'),
                "bio" => $faker->text(rand(250, 300))
                ]

            ]
            );
    }
}
