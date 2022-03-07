<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view("post.postList");
    }

    public function create()
    {
        return view("post.create");
    }

    public function store()
    {
        $data = request()->validate([
            "title" => "required",
            "content" => "required"
        ]);

        $newPost = new Post();
        $newPost->title = $data["title"];
        $newPost->content = $data["content"];
        $newPost->created_by = Auth::id();
        $newPost->created_at = Carbon::now();
        $newPost->updated_at = Carbon::now();
        $newPost->save();

        return redirect("/home/posts/" . $newPost->id);
    }

    public function show(Post $post)
    {
        return view("post.show", compact("post"));
    }

    public function edit(Post $post)
    {
        return view("post.edit", compact("post"));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            "title" => "required",
            "content" => "required"
        ]);

        $post->updated_at = Carbon::now();
        $post->update($data);
        return redirect("/home/posts/" . $post->id);
    }

    public function delete(Post $post)
    {
        $post->deleted_by = Auth::id();
        $post->save();
        $post->delete();
        return redirect("/home/posts");
    }
}
