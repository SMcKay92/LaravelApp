<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function setCookie(Request $request)
    {
        $minutes = 15;
        Cookie::queue("themeId", $request->themeId, $minutes);
        return redirect()->back();
    }

    public function getCookie(Request $request)
    {
        echo $request->cookie("themeId");
    }
}
