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
                    echo "<a href='/home/create'><button class='btn btn-primary'>Create New Admin User</button></a>";
                @endphp
                <div class="card">
                    <div class="card-header">Manage Users</div>
                    <div class="card-body">
                        @php
                            use Illuminate\Support\Facades\DB;


                            $userIdsWithRoles = DB::table("role_user")->orderBy("user_id", "desc")->pluck("user_id");
                            $activeUsers = array();

                            foreach($userIdsWithRoles as $userId)
                            {
                                //if user is not soft deleted
                                if(DB::table("users")->where("id", "=", $userId)->whereNull("deleted_at")->first() !== null)
                                {

                                    $activeUser = DB::table("users")->where("id", "=", $userId)->first();
                                    array_push($activeUsers, $activeUser);
                                }
                            }


                            foreach($activeUsers as $user)
                            {
                                $showEdit = "";
                                $showDelete = "";

                                {
                                    $showEdit .= "<a href='/home/manage/" . $user->id . "/edit'><button class='btn btn-warning'>Edit</button></a>";
                                    $showDelete .= "<form action='/home/manage/" . $user->id . "/delete' method='post'>"
                                        . csrf_field() . "<button class='btn btn-danger'>Delete</button></form>";
                                }

                                echo "<div>
                                        <h6>" . $user->email . "</h6>
                                        <a href='/home/manage/" . $user->id . "'><button class='btn btn-primary'>Show</button></a>"
                                        . $showEdit . $showDelete
                                    . "</div><br><br>";
                            }
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
