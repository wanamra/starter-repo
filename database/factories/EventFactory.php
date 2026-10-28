<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Laravel Meetup', 'Hackathon Briefing', 'Career Talk', 'Cloud Workshop', 'Final Year Project Clinic']).' '.fake()->numberBetween(1, 99),
            'description' => fake()->sentence(12),
            'venue' => fake()->randomElement(['Dewan Sultan Iskandar', 'N28 Lecture Hall', 'Online (Google Meet)', 'Faculty of Computing, Room 3']),
            'starts_at' => fake()->dateTimeBetween('+1 week', '+2 months'),
            'capacity' => fake()->numberBetween(10, 50),
        ];
    }

    public function full(): static
    {
        return $this->state(fn () => ['capacity' => 2])->hasRegistrations(2);
    }
}
