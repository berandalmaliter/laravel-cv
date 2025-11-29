@extends('layouts.app')

@section('title', 'Create CV')

@section('content')
    <div class="bg-white rounded-xl shadow p-6">
        <h1 class="text-xl font-bold text-slate-800 mb-4">Create New CV</h1>

        <form action="{{ route('profiles.store') }}" method="POST">
            @include('profiles._form')
        </form>
    </div>
@endsection
