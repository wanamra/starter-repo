<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::query()
            ->withCount('registrations')
            ->orderBy('starts_at')
            ->get();

        return view('events.index', ['events' => $events]);
    }

    public function show(Event $event): View
    {
        $event->loadCount('registrations');

        return view('events.show', ['event' => $event]);
    }
}
