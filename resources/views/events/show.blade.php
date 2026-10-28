@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <p><a href="{{ route('events.index') }}">&larr; All events</a></p>
    <article class="card">
        <h1 style="margin-top:0">{{ $event->title }}</h1>
        <p class="muted">{{ $event->starts_at->format('l, j F Y, g:i A') }} · {{ $event->venue }}</p>
        <p>{{ $event->description }}</p>
        <p><span class="pill">{{ $event->registrations_count }} / {{ $event->capacity }} registered</span></p>

        {{-- Session 1: students add the registration form here. --}}
    </article>
@endsection
