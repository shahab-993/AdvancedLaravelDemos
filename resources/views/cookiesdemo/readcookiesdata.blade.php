@extends('layouts.app')
@section('content')
<div class="container mt-5">
    @if (isset($employeeData['id']))
    <h1>Employee ID is {{ $employeeData['id'] }}</h1>
    <h1>Employee Name is {{ $employeeData['name'] }}</h1>
    <h1>Employee Age is {{ $employeeData['age'] }}</h1>
    <h1>Employee Desingaion is {{ $employeeData['designation'] }}</h1>

    <h1>Employee Skills are </h1>
    <ul>
        @foreach ($employeeData['skills'] as $skill )
        <li>{{ $skill }}</li>
            
        @endforeach
    </ul>
    <h1>User Name is {{ $username }}</h1>
    <h1>Country is {{ $country }}</h1>
    <h1>Age is {{ $age }}</h1>
    
    @endif
</div>    
@endsection