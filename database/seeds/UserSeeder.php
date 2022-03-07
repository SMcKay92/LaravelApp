<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "name" => "Jane",
            "email" => "jane@example.com",
            "password" => '$2a$12$droQsSe2RvOfiQ4k0OYrOOLQmlLiV603etkYa5o7o9zy7lywzi.tC',
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("users")->insert([
            "name" => "Bob",
            "email" => "bob@example.com",
            "password" => '$2a$12$D6NiokcWZe1azwba/xtqv.S3UFUg0QOziL43vkOljwMCvPgTBp1/K',
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("users")->insert([
            "name" => "Susan",
            "email" => "susan@example.com",
            "password" => '$2a$12$XxUZ8km9u0d4IgrcP.Xif.elq2IHmZ4RfhWvFxiKhs8J406Jc/3Hi',
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
