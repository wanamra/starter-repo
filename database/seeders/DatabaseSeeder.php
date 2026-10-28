<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $student = User::factory()->create([
            'name' => 'Demo Student',
            'email' => 'student@example.com',
            'password' => 'password',
        ]);

        $others = User::factory()->count(2)->sequence(
            ['name' => 'Aisyah Rahman', 'email' => 'aisyah@example.com', 'password' => 'password'],
            ['name' => 'Daniel Lee', 'email' => 'daniel@example.com', 'password' => 'password'],
        )->create();

        Event::factory()->create([
            'title' => 'Laravel Meetup UTM',
            'description' => 'Short talks on Laravel 12, Pest and AI-assisted development.',
            'venue' => 'N28 Lecture Hall',
            'starts_at' => now()->addWeeks(2)->setTime(19, 0),
            'capacity' => 30,
        ]);

        // A nearly full event: one seat left. Useful for demoing the "full" case.
        $nearlyFull = Event::factory()->create([
            'title' => 'Hackathon Briefing',
            'description' => 'Rules, team formation and judging criteria.',
            'venue' => 'Faculty of Computing, Room 3',
            'starts_at' => now()->addWeeks(3)->setTime(9, 0),
            'capacity' => 3,
        ]);
        foreach ($others as $user) {
            $nearlyFull->registrations()->create(['user_id' => $user->id]);
        }

        // An event with no seats at all.
        Event::factory()->create([
            'title' => 'Speaker Dinner (invite only)',
            'description' => 'Closed event. Capacity is zero on purpose.',
            'venue' => 'Dewan Sultan Iskandar',
            'starts_at' => now()->addMonth()->setTime(20, 0),
            'capacity' => 0,
        ]);
    }
}
