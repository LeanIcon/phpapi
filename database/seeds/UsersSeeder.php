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
                    'firstname' => "Admin",
                    'lastname' => "Jack",
                    "slug" =>"admin-doe",
                    "type" =>"admin",
                    'email' => "admin@nnuro.com",
                        'password' => bcrypt('secret'),
                        "bio" => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "John Doe",
                    "slug" =>"john-doe",
                    'firstname' => "Admin",
                    'lastname' => "Doe",
                    "type" =>"retailer",
                    'email' => "johndoe@nnuro.com",
                        'password' => bcrypt('secret'),
                        "bio" => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Jane Doe",
                    "slug" =>"jane-doe",
                    'firstname' => "Jane",
                    'lastname' => "Doe",
                    "type" =>"wholesaler",
                    'email' => "janedoe@nnuro.com",
                    'password' => bcrypt('secret'),
                    "bio" => $faker->text(rand(250, 300))
                ],
                [
                'name' => "Mark Otoo",
                "slug" =>"mark-otoo",
                'firstname' => "Mark",
                'lastname' => "Otoo",
                "type" =>"customer",
                'email' => "markotoo@nnuro.com",
                'password' => bcrypt('secret'),
                "bio" => $faker->text(rand(250, 300))
                ]

            ]
            );
    }
}
