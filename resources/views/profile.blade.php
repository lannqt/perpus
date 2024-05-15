@extends('layouts.sidebar')
@section('content')

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            User Profile
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <label for="username" class="fw-bold">Username:</label>
                    <span id="username">{{ Auth::user()->username }}</span>
                </li>
                <li class="list-group-item">
                    <label for="password" class="fw-bold">Password:</label>
                    <span id="password">{{ Auth::user()->password }}</span>
                </li>
                <li class="list-group-item">
                    <label for="phone" class="fw-bold">Phone:</label>
                    <span id="phone">{{ Auth::user()->phone }}</span>
                </li>
            </ul>
        </div>
    </div>


@endsection