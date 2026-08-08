@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h1>Create Temprary Employee</h1>
    <form action="{{ temprary-employees.store }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    
    
    </form>
</div>

@endsection