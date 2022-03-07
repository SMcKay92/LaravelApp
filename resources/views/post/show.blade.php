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
                    <div class="card-header">Showing Post: {{$post->id}}</div>
                    <div class="card-body">
                        ID: {{$post->id}}<br>
                        Title: {{$post->title}}<br>
                        Content: {{$post->content}}<br>
                        Created by user with ID: {{$post->created_by}}<br>
                        Created at: {{$post->created_at}}<br>
                        Updated at: {{$post->updated_at}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
