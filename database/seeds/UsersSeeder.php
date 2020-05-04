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
        $connection = config('database.default');
        $driver = config("database.connections.{$connection}.driver");

        $faker = Factory::create();
        //reset the table
        if($driver == 'mysql') {
            DB::statement("SET FOREIGN_KEY_CHECKS=0");
            DB::table('users')->truncate();
        }

        DB::table('users')->insert([
                [
                    'name' => "Admin Nnuro",
                    'firstname' => "Admin",
                    'lastname' => "Nnuro",
                    "slug" =>"admin-nnuro",
                    "type" =>"admin",
                    'email' => "admin@nnuro.com",
                        'password' => bcrypt('secret'),
                        "bio" => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Wholesaler Jane",
                    "slug" =>"wholesaler-jane",
                    'firstname' => "Jane",
                    'lastname' => "Doe",
                    "type" =>"wholesaler",
                    'email' => "wholesaler@nnuro.com",
                    'password' => bcrypt('secret'),
                    "bio" => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Retailer John",
                    "slug" =>"retailer-john",
                    'firstname' => "Retailer",
                    'lastname' => "John",
                    "type" =>"retailer",
                    'email' => "retailer@nnuro.com",
                        'password' => bcrypt('secret'),
                        "bio" => $faker->text(rand(250, 300))
                ],
                [
                'name' => "Consumer Mark",
                "slug" =>"consumer-mark",
                'firstname' => "Mark",
                'lastname' => "Consumer",
                "type" =>"customer",
                'email' => "consumer@nnuro.com",
                'password' => bcrypt('secret'),
                "bio" => $faker->text(rand(250, 300))
                ]

            ]
            );
    }
}
