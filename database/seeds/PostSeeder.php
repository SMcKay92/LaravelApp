<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("posts")->insert([
            "title" => "Post from Jane",
            "content" => "I'm Jane and this is my post",
            "created_by" => "1",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "This is Bob",
            "content" => "My name is a palindrome",
            "created_by" => "2",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("posts")->insert([
            "title" => "Susan Here",
            "content" => "I'm person #3",
            "created_by" => "3",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
