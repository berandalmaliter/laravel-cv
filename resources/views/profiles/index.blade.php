@extends('layouts.app')

@section('title', 'My CVs')

@section('content')
    <h1 class="text-2xl font-bold text-slate-800 mb-4">My CV Profiles</h1>

    @if($profiles->isEmpty())
        <div class="bg-white rounded-xl shadow p-6 text-center text-slate-500">
            Belum ada CV. Klik tombol "New CV" di atas untuk membuat.
        </div>
    @else
        <div class="grid gap-4">
            @foreach($profiles as $profile)
                <div class="bg-white shadow rounded-xl p-4 flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-lg text-slate-800">
                            {{ $profile->full_name }}
                        </h2>
                        <p class="text-sm text-slate-500">
                            {{ $profile->job_title }} &middot; {{ $profile->email }}
                        </p>
                        <p class="text-xs text-slate-400">
                            Updated {{ $profile->updated_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('profiles.show', $profile) }}"
                           class="px-3 py-1 text-xs rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200">
                            View
                        </a>
                        <a href="{{ route('profiles.edit', $profile) }}"
                           class="px-3 py-1 text-xs rounded-lg bg-indigo-100 text-indigo-700 hover:bg-indigo-200">
                            Edit
                        </a>
                        <a href="{{ route('profiles.export.pdf', $profile) }}"
                           class="px-3 py-1 text-xs rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200">
                            PDF
                        </a>
                        <a href="{{ route('profiles.export.word', $profile) }}"
                           class="px-3 py-1 text-xs rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200">
                            Word
                        </a>
                        <form action="{{ route('profiles.destroy', $profile) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus CV ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 text-xs rounded-lg bg-rose-100 text-rose-700 hover:bg-rose-200">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $profiles->links() }}
        </div>
    @endif
@endsection
