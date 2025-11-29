<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CV - {{ $profile->full_name }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; margin: 0; padding: 0; }
        .wrapper { display: flex; }
        .sidebar {
            width: 30%;
            background: #0f172a;
            color: #e5e7eb;
            padding: 20px;
            height: 100%;
        }
        .main {
            width: 70%;
            padding: 20px;
        }
        h1 { font-size: 22px; margin: 0 0 5px 0; }
        h2 { font-size: 13px; margin: 15px 0 5px 0; text-transform: uppercase; }
        p { margin: 0 0 5px 0; }
        .label { font-weight: bold; }
        .section-title {
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 3px;
            border-bottom: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h1>{{ $profile->full_name }}</h1>
        <p style="font-size: 12px; color:#9ca3af">{{ $profile->job_title }}</p>

        <h2>Contact</h2>
        @if($profile->email)
            <p><span class="label">Email:</span> {{ $profile->email }}</p>
        @endif
        @if($profile->phone)
            <p><span class="label">Phone:</span> {{ $profile->phone }}</p>
        @endif
        @if($profile->address)
            <p><span class="label">Address:</span> {{ $profile->address }}</p>
        @endif
        @if($profile->linkedin)
            <p><span class="label">LinkedIn:</span> {{ $profile->linkedin }}</p>
        @endif
        @if($profile->github)
            <p><span class="label">GitHub:</span> {{ $profile->github }}</p>
        @endif

        @if($profile->skills)
            <h2>Skills</h2>
            <p>{!! nl2br(e($profile->skills)) !!}</p>
        @endif
    </div>

    <div class="main">
        @if($profile->summary)
            <div style="margin-bottom: 15px;">
                <div class="section-title">Summary</div>
                <p>{!! nl2br(e($profile->summary)) !!}</p>
            </div>
        @endif

        @if($profile->experience)
            <div style="margin-bottom: 15px;">
                <div class="section-title">Experience</div>
                <p>{!! nl2br(e($profile->experience)) !!}</p>
            </div>
        @endif

        @if($profile->education)
            <div style="margin-bottom: 15px;">
                <div class="section-title">Education</div>
                <p>{!! nl2br(e($profile->education)) !!}</p>
            </div>
        @endif
    </div>
</div>
</body>
</html>
