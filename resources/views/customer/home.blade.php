@extends('layouts.front.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="py-12 mt-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
                <div class="w-full p-6 text-gray-900">
                    <h3 class="text-2xl font-semibold mb-6"> Welcome To {{ $user->name }}!!!</h3>
                    <p>Here you can manage your application settings and data!</p>
                </div>
            </div>
        </div>
    </div>
@endsection
