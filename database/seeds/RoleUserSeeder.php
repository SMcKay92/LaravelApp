<?php

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userJane = DB::table("users")->where("email", "=", "jane@example.com")->first();
        $roleJane = DB::table("roles")->where("name", "=", "User Administrator")->first();
        DB::table("role_user")->insert([
            "user_id" => $userJane->id,
            "role_id" => $roleJane->id,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        $userBob = DB::table("users")->where("email", "=", "bob@example.com")->first();
        $roleBob = DB::table("roles")->where("name", "=", "Moderator")->first();
        DB::table("role_user")->insert([
            "user_id" => $userBob->id,
            "role_id" => $roleBob->id,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        $userSusan = DB::table("users")->where("email", "=", "susan@example.com")->first();
        $roleSusan = DB::table("roles")->where("name", "=", "Theme Manager")->first();
        DB::table("role_user")->insert([
            "user_id" => $userSusan->id,
            "role_id" => $roleSusan->id,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
