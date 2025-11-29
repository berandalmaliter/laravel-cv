@extends('layouts.app')

@section('title', 'Preview CV')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold text-slate-800">Preview CV</h1>
        <div class="flex gap-2">
            <a href="{{ route('profiles.export.pdf', $profile) }}"
               class="px-3 py-1 text-xs rounded-lg bg-emerald-600 text-white">
                Download PDF
            </a>
            <a href="{{ route('profiles.export.word', $profile) }}"
               class="px-3 py-1 text-xs rounded-lg bg-blue-600 text-white">
                Download Word
            </a>
        </div>
    </div>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden flex">
        <div class="w-1/3 bg-slate-900 text-slate-50 p-6">
            <h2 class="text-2xl font-bold">{{ $profile->full_name }}</h2>
            <p class="text-sm text-slate-300">{{ $profile->job_title }}</p>

            <div class="mt-6 text-xs space-y-2">
                @if($profile->email)
                    <p><span class="font-semibold">Email:</span> {{ $profile->email }}</p>
                @endif
                @if($profile->phone)
                    <p><span class="font-semibold">Phone:</span> {{ $profile->phone }}</p>
                @endif
                @if($profile->address)
                    <p><span class="font-semibold">Address:</span> {{ $profile->address }}</p>
                @endif
                @if($profile->linkedin)
                    <p><span class="font-semibold">LinkedIn:</span> {{ $profile->linkedin }}</p>
                @endif
                @if($profile->github)
                    <p><span class="font-semibold">GitHub:</span> {{ $profile->github }}</p>
                @endif
            </div>

            @if($profile->skills)
                <div class="mt-6">
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-300 mb-2">Skills</h3>
                    <p class="text-xs leading-relaxed">{{ nl2br(e($profile->skills)) }}</p>
                </div>
            @endif
        </div>

        <div class="w-2/3 p-6">
            @if($profile->summary)
                <section class="mb-4">
                    <h3 class="text-sm font-semibold text-slate-700 uppercase mb-1">Summary</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">{{ nl2br(e($profile->summary)) }}</p>
                </section>
            @endif

            @if($profile->experience)
                <section class="mb-4">
                    <h3 class="text-sm font-semibold text-slate-700 uppercase mb-1">Experience</h3>
                    <p class="text-xs text-slate-600 leading-relaxed whitespace-pre-line">{{ $profile->experience }}</p>
                </section>
            @endif

            @if($profile->education)
                <section class="mb-4">
                    <h3 class="text-sm font-semibold text-slate-700 uppercase mb-1">Education</h3>
                    <p class="text-xs text-slate-600 leading-relaxed whitespace-pre-line">{{ $profile->education }}</p>
                </section>
            @endif
        </div>
    </div>
@endsection
