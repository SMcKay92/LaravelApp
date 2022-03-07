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
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form action="/home/posts/{{$post->id}}" method="post">
                            @csrf
                            <div class="form-group">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input name="title" type="text" class="form-control" value="{{$post->title}}" id="title">
                                        @error("title")
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <input name="content" type="text" class="form-control" value="{{$post->content}}" id="content">
                                        @error("content")
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </fieldset>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
