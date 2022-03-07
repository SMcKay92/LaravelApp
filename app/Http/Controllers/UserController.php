<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("CheckAdmin");
    }

    public function index()
    {
        return view("user.userList");
    }

    public function show(\App\User $user)
    {
        return view("user.show", compact("user"));
    }

    public function create()
    {
        return view("user.create");
    }

    public function store()
    {
        $data = request()->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:8",
            "roles" => ""
        ]);

        $newUser = new User();
        $newUser->name = $data["name"];
        $newUser->email = $data["email"];
        $newUser->password = Hash::make($data["password"]);
        $newUser->created_at = Carbon::now();
        $newUser->updated_at = Carbon::now();
        $newUser->save();

        foreach(request()->input("roles") as $role)
        {
            $newUser->roles()->attach($role);
        }

        return redirect("/home/manage/" . $newUser->id);
    }

    public function edit(\App\User $user)
    {
        return view("user.edit", compact("user"));
    }

    public function update(\App\User $user)
    {
        $data = request()->validate([
            "name" => "required",
            "email" => "required|email",
            "roles" => ""
        ]);

        foreach(request()->input("roles") as $role)
        {
            $user->roles()->sync($role);
        }

        $user->update($data);
        return redirect("/home/manage");
    }

    public function delete(\App\User $user)
    {
        $user->deleted_by = Auth::id();
        $user->save();
        $user->delete();
        return redirect("/home/manage");
    }
}
