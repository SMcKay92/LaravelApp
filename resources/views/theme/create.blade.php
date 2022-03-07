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
                    <div class="card-header">Create New Post</div>
                    <div class="card-body">
                        <form action="/home/themes" method="post">
                            @csrf
                            <div class="form-group">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" class="form-control" value="{{old("name")}}" id="name">
                                        @error("name")
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cdn_url">CDN URL</label>
                                        <input name="cdn_url" type="text" class="form-control" value="{{old("cdn_url")}}" id="cdn_url">
                                        @error("cdn_url")
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </fieldset>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
