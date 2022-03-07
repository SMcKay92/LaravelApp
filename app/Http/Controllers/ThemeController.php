<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("CheckThemeManager");
    }

    public function index()
    {
        return view("theme.themeList");
    }

    public function create()
    {
        return view("theme.create");
    }

    public function store()
    {
        $data = request()->validate([
            "name" => "required",
            "cdn_url" => "required"
        ]);

        $newTheme = new Theme();
        $newTheme->name = $data["name"];
        $newTheme->cdn_url = $data["cdn_url"];
        $newTheme->created_by = Auth::id();
        $newTheme->created_at = Carbon::now();
        $newTheme->updated_at = Carbon::now();
        $newTheme->save();

        return redirect("/home/themes/" . $newTheme->id);
    }

    public function show(Theme $theme)
    {
        return view("theme.show", compact("theme"));
    }

    public function edit(Theme $theme)
    {
        return view("theme.edit", compact("theme"));
    }

    public function update(Theme $theme)
    {
        $data = request()->validate([
            "name" => "required",
            "cdn_url" => "required"
        ]);

        $theme->updated_at = Carbon::now();
        $theme->update($data);
        return redirect("/home/themes/" . $theme->id);
    }

    public function delete(Theme $theme)
    {
        $theme->deleted_by = Auth::id();
        $theme->save();
        $theme->delete();
        return redirect("/home/themes");
    }
}
