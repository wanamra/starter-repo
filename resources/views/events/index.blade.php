@extends('layouts.app')

@section('title', 'Upcoming events')

@section('content')
    <h1>Upcoming events</h1>
    <div class="grid">
        @forelse ($events as $event)
            <article class="card">
                <h2 style="margin:0"><a href="{{ route('events.show', $event) }}">{{ $event->title }}</a></h2>
                <p class="muted" style="margin:4px 0">{{ $event->starts_at->format('D, j M Y, g:i A') }} · {{ $event->venue }}</p>
                <span class="pill">{{ $event->registrations_count }} / {{ $event->capacity }} registered</span>
            </article>
        @empty
            <p class="muted">No events yet. Run <code>php artisan migrate:fresh --seed</code>.</p>
        @endforelse
    </div>
@endsection
