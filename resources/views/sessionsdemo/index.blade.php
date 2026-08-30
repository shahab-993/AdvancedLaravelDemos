@extends('layouts.app')
@section('content')


<div class="container mt-5">
    <h1>Your Session ID is {{ Session::getId() }}</h1>
    <h1>Default session timeout is {{ config('session.lifetime') }} minutes</h1>

    @if (Session::has('employee'))
    <h1>Employee ID is {{ Session::get('employee')['id'] }}</h1>
    <h1>Employee Name is {{ Session::get('employee')['name'] }}</h1>
    <h1>Employee Age is {{ Session::get('employee')['age'] }}</h1>
    <h1>Employee Designation is {{ Session::get('employee')['designation'] }}</h1>

    <h1>Employee Skills are</h1>
    <ul>
        @foreach (Session::get('employee')['skills'] as $skill )
        <li>{{ $skill }}</li>
            
        @endforeach
    </ul>
    @endif
    <h1>User Name is {{ Session::get('username') }}</h1>
    <h1>User Country is {{ Session::get('Country') }}</h1>
    <h1>User Age is {{ Session::get('Age') }}</h1>
    
     <a href="{{ route('sessionsdemo.readsessiondata') }}" class="btn btn-danger">Read Session Data</a>


</div>
    
@endsection