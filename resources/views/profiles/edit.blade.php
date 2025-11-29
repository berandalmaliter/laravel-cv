@extends('layouts.app')

@section('title', 'Edit CV')

@section('content')
    <div class="bg-white rounded-xl shadow p-6">
        <h1 class="text-xl font-bold text-slate-800 mb-4">Edit CV</h1>

        <form action="{{ route('profiles.update', $profile) }}" method="POST">
            @method('PUT')
            @include('profiles._form', ['profile' => $profile])
        </form>
    </div>
@endsection
