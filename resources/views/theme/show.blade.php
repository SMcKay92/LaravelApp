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
                    <div class="card-header">Showing Theme: {{$theme->id}}</div>
                    <div class="card-body">
                        ID: {{$theme->id}}<br>
                        Name: {{$theme->name}}<br>
                        CDN URL: {{$theme->cdn_url}}<br>
                        Created by user with ID: {{$theme->created_by}}<br>
                        Created at: {{$theme->created_at}}<br>
                        Updated at: {{$theme->updated_at}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
