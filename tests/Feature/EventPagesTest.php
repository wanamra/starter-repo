<?php

use App\Models\Event;

it('lists upcoming events with their registration count', function () {
    $event = Event::factory()->hasRegistrations(2)->create([
        'title' => 'Laravel Meetup UTM',
        'capacity' => 30,
    ]);

    $this->get(route('events.index'))
        ->assertOk()
        ->assertSee('Laravel Meetup UTM')
        ->assertSee('2 / 30 registered');
});

it('shows a single event', function () {
    $event = Event::factory()->create([
        'title' => 'Hackathon Briefing',
        'venue' => 'N28 Lecture Hall',
        'capacity' => 3,
    ]);

    $this->get(route('events.show', $event))
        ->assertOk()
        ->assertSee('Hackathon Briefing')
        ->assertSee('N28 Lecture Hall')
        ->assertSee('0 / 3 registered');
});

it('returns 404 for an event that does not exist', function () {
    $this->get('/events/999')->assertNotFound();
});
