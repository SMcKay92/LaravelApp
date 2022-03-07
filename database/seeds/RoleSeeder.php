<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            "name" => "User Administrator",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("roles")->insert([
            "name" => "Moderator",
            "created_at" => now(),
            "updated_at" => now()
        ]);
        DB::table("roles")->insert([
            "name" => "Theme Manager",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
