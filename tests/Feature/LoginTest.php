<?php

use App\Models\User;

it('logs a student in with valid details', function () {
    $user = User::factory()->create(['email' => 'student@example.com', 'password' => 'password']);

    $this->post(route('login'), ['email' => 'student@example.com', 'password' => 'password'])
        ->assertRedirect(route('events.index'));

    $this->assertAuthenticatedAs($user);
});

it('rejects wrong details', function () {
    User::factory()->create(['email' => 'student@example.com', 'password' => 'password']);

    $this->post(route('login'), ['email' => 'student@example.com', 'password' => 'wrong'])
        ->assertSessionHasErrors('email');

    $this->assertGuest();
});

it('logs a student out', function () {
    $this->actingAs(User::factory()->create())
        ->post(route('logout'))
        ->assertRedirect(route('events.index'));

    $this->assertGuest();
});
