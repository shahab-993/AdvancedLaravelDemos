@extends('layouts.front.app')
@section('content')
    <div class="container mt-5">
        <h1>User's Details</h1>

        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Age:</strong> {{ $user->age }}</p>
        <p><strong>Role:</strong> {{ $user->role_id ? $user->role->name : 'N/A' }}</p>
        <p><strong>Country:</strong> {{ $user->country ? $user->country->name : 'N/A' }}</p>


    </div>
@endsection
