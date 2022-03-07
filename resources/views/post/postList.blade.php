@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('message'))
                    <div class="alert {{session('alert') ?? 'alert-info'}}">
                        {{ session('message') }}
                    </div>
                @endif
                @php
                    use Illuminate\Support\Facades\DB;
                    use Illuminate\Support\Facades\Auth;

                    if(!Auth::guest())
                    {
                        echo "<a href='/home/posts/create'><button class='btn btn-primary'>Create post</button></a>";
                    }

                    $postIds = DB::table("posts")->orderBy("created_at", "desc")->pluck("id");
                    $currentPosts = array();

                    foreach($postIds as $postId)
                    {
                        if(DB::table("posts")->where("id", "=", $postId)->whereNull("deleted_at")->first() !== null)
                        {
                            $activePost = DB::table("posts")->where("id", "=", $postId)->first();
                            array_push($currentPosts, $activePost);
                        }
                    }

                    $userRolesRows = DB::table("role_user")->where("user_id", "=", Auth::id())->get();
                    $checkMod = false;

                    if($userRolesRows !== null)
                    {
                        foreach($userRolesRows as $row)
                        {
                            if($row->role_id == 2)
                            {
                                $checkMod = true;
                                break;
                            }
                        }
                    }

                    foreach($currentPosts as $post)
                    {
                        $showEditButton = "";
                        $showDeleteButton = "";

                        if($post->created_by == Auth::id())
                        {
                            $showEditButton .= "<a href='/home/posts/" . $post->id . "/edit'><button class='btn btn-warning'>Edit</button></a>";
                        }


                        if($post->created_by == Auth::id() || $checkMod)
                        {
                            $showDeleteButton .= "<form action='/home/posts/" . $post->id . "/delete' method='post'>"
                                . csrf_field() . "<button class='btn btn-danger'>Delete</button></form>";
                        }

                        echo "<div class='card'>
                            <div class='card-header'><h5>" . $post->title . "</h5></div>
                            <div class='card-body'>
                                <h4>" . $post->content . "</h4>
                                <h6>" . $post->created_at . "</h6>
                                <a href='/home/posts/" . $post->id . "'><button class='btn btn-primary'>Show</button></a>

                                " . $showEditButton . $showDeleteButton . "
                            </div>
                        </div><br>";
                    }
                @endphp
            </div>
        </div>
    </div>
@endsection
